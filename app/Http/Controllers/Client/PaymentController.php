<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Voucher;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function vnpay(Order $order)
    {
        $customer = session('customer');
        abort_unless($customer, 403);
        abort_unless($order->status === 'pending_payment' && $order->payment_method === 'vnpay', 404);

        $ownsOrder = (filled($customer['email'] ?? null) && filled($order->email) && strtolower($customer['email']) === strtolower($order->email))
            || (filled($customer['tel'] ?? null) && filled($order->phone) && (string) $customer['tel'] === (string) $order->phone);
        abort_unless($ownsOrder, 403);

        $vnpUrl = config('vnpay.url');
        $vnpReturnUrl = config('vnpay.return_url');
        $vnpTmnCode = config('vnpay.tmn_code');
        $vnpHashSecret = config('vnpay.hash_secret');

        $vnpTxnRef = $order->id . '_' . time();
        $vnpAmount = (int) round(($order->final_price ?? $order->total_price) * 100);

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

        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);

        ksort($inputData);

        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $hashData = rtrim($hashData, '&');

        $checkHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));

        if ($checkHash === $secureHash) {
            $txnRef = $request->vnp_TxnRef;
            $orderId = explode('_', $txnRef)[0];

            $order = ctype_digit($orderId) ? Order::find((int) $orderId) : null;
            $expectedAmount = $order
                ? (int) round(($order->final_price ?? $order->total_price) * 100)
                : null;
            $validReference = $order && preg_match('/^' . preg_quote((string) $order->id, '/') . '_\d+$/', $txnRef);
            $validAmount = $order && (int) $request->vnp_Amount === $expectedAmount;

            if (!$validReference || !$validAmount) {
                return redirect()->route('checkout.show')->with('error', 'Thông tin giao dịch không khớp với đơn hàng.');
            }

            $paymentSucceeded = $request->vnp_ResponseCode === '00'
                && $request->vnp_TransactionStatus === '00';
            $result = DB::transaction(function () use ($order, $request, $paymentSucceeded) {
                $lockedOrder = Order::query()->lockForUpdate()->find($order->id);
                if (!$lockedOrder) {
                    return false;
                }

                if ($paymentSucceeded && $lockedOrder->status === 'confirmed') {
                    return true;
                }

                if ($lockedOrder->status !== 'pending_payment') {
                    return false;
                }

                if ($paymentSucceeded) {
                    app(InventoryService::class)->markOrderSold($lockedOrder);
                    $lockedOrder->update([
                        'status' => 'confirmed',
                        'transaction_no' => $request->vnp_TransactionNo,
                        'bank_code' => $request->vnp_BankCode,
                        'paid_at' => now(),
                    ]);

                    $voucherCodes = array_filter(array_map('trim', explode(',', (string) $lockedOrder->voucher_code)));
                    if ($voucherCodes !== []) {
                        Voucher::whereIn('code', $voucherCodes)->increment('used_quantity');
                    }

                    return true;
                }

                app(InventoryService::class)->releaseOrder($lockedOrder);
                $lockedOrder->update(['status' => 'cancelled']);

                return false;
            }, 3);

            if ($paymentSucceeded && $result) {
                $this->clearCartItems();
                return redirect()->route('checkout.success');
            }

            return redirect()->route('checkout.show')->with('error', 'Thanh toán thất bại hoặc đơn hàng đã được xử lý.');
        }

        return redirect()->route('checkout.show')->with('error', 'Chữ ký không hợp lệ.');
    }
}