<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpay(Order $order)
    {
        $customer = session('customer');
        abort_unless($customer, 403);
        abort_unless($order->status === 'pending_payment' && $order->payment_method === 'vnpay', 404);

        $ownsOrder = ($customer['email'] ?? null) === $order->email
            || ($customer['tel'] ?? null) === $order->phone;
        abort_unless($ownsOrder, 403);

        $vnpUrl = config('vnpay.url');
        $vnpReturnUrl = config('vnpay.return_url');
        $vnpTmnCode = config('vnpay.tmn_code');
        $vnpHashSecret = config('vnpay.hash_secret');

        $vnpTxnRef = $order->id . '_' . time();
        $vnpAmount = (int) round(($order->final_price ?: $order->total_price) * 100);

        $inputData = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnpTmnCode,
        "vnp_Amount" => $vnpAmount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => request()->ip(),
        "vnp_Locale" => "vn",
        "vnp_OrderInfo" => "Thanh toan don hang #" . $order->id,
        "vnp_OrderType" => "billpayment",
        "vnp_ReturnUrl" => $vnpReturnUrl,
        "vnp_TxnRef" => $vnpTxnRef,
        ];

        ksort($inputData);

        $hashData = '';
        $query = '';

        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $hashData = rtrim($hashData, '&');
        $query = rtrim($query, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnpHashSecret);

        $paymentUrl = $vnpUrl . '?' . $query . '&vnp_SecureHash=' . $secureHash;

        return redirect($paymentUrl);
    }

    public function vnpayReturn(Request $request)
    {
        $inputData = $request->all();
        $secureHash = $inputData['vnp_SecureHash'] ?? null;

        if (! is_string($secureHash) || $secureHash === '') {
            return redirect()->route('checkout.show')->with('error', 'Phản hồi thanh toán không hợp lệ.');
        }

    unset($inputData['vnp_SecureHash']);
    unset($inputData['vnp_SecureHashType']);

    ksort($inputData);

    $hashData = '';
    foreach ($inputData as $key => $value) {
        $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
    }

    $hashData = rtrim($hashData, '&');

    $checkHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));

        if (hash_equals($checkHash, $secureHash)) {
            $txnRef = (string) $request->vnp_TxnRef;
            $orderId = explode('_', $txnRef)[0] ?? null;

            $order = ctype_digit($orderId) ? Order::find((int) $orderId) : null;
            $expectedAmount = $order
                ? (int) round(($order->final_price ?: $order->total_price) * 100)
                : null;
            $validReference = $order && preg_match('/^' . preg_quote((string) $order->id, '/') . '_\d+$/', $txnRef);
            $validAmount = $order && (int) $request->vnp_Amount === $expectedAmount;

            if ($order && $validReference && $validAmount
                && $request->vnp_ResponseCode === '00'
                && $request->vnp_TransactionStatus === '00') {

            // If already confirmed, just redirect to success
                if ($order->status === 'confirmed') {
                    return redirect()->route('checkout.success');
                }

            // Only process if status is still 'pending_payment'
                if ($order->status === 'pending_payment') {
                    $order->update([
                        'status' => 'confirmed',
                        'transaction_no' => $request->vnp_TransactionNo,
                        'bank_code' => $request->vnp_BankCode,
                        'paid_at' => now(),
                    ]);

                    // Deduct stock when VNPay payment is confirmed
                    foreach ($order->items as $item) {
                        $item->variant()->decrement('stock', $item->quantity);
                    }

                    $voucherCodes = array_filter(array_map('trim', explode(',', (string) $order->voucher_code)));
                    if ($voucherCodes !== []) {
                        Voucher::whereIn('code', $voucherCodes)->increment('used_quantity');
                    }
                }

                $this->clearCartItems();

                return redirect()->route('checkout.success');
            }

        // Preserve the order for audit and allow the customer to see the failure.
        if ($order && $order->status === 'pending_payment') {
            $order->update(['status' => 'cancelled']);
        }

        return redirect()->route('checkout.show')->with('error', 'Thanh toán thất bại.');
        }

        return redirect()->route('checkout.show')->with('error', 'Chữ ký không hợp lệ.');
    }
}