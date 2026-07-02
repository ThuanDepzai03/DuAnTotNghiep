<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function vnpay(Order $order)
{
    $vnpUrl = config('vnpay.url');
    $vnpReturnUrl = config('vnpay.return_url');
    $vnpTmnCode = config('vnpay.tmn_code');
    $vnpHashSecret = config('vnpay.hash_secret');

    $vnpTxnRef = $order->id . '_' . time();
    $vnpAmount = $order->total_price * 100;

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
    $secureHash = $inputData['vnp_SecureHash'];

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

        $order = Order::find($orderId);

        if ($order && $request->vnp_ResponseCode === '00' && $request->vnp_TransactionStatus === '00') {

    if ($order->status === 'confirmed') {
        return redirect()->route('checkout.success');
    }

    $order->update([
        'status' => 'confirmed',
        'transaction_no' => $request->vnp_TransactionNo,
        'bank_code' => $request->vnp_BankCode,
        'paid_at' => now(),
    ]);

    foreach ($order->items as $item) {
        $item->variant()->decrement('stock', $item->quantity);
    }

    session()->forget('cart');

    return redirect()->route('checkout.success');
}

        return redirect()->route('checkout.show')->with('error', 'Thanh toán thất bại.');
    }

    return redirect()->route('checkout.show')->with('error', 'Chữ ký không hợp lệ.');
}
}