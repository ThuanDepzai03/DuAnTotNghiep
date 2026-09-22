<?php

namespace App\Http\Controllers;

use App\Models\ProductImei;
use App\Models\WarrantyClaim;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function lookup(Request $request)
    {
        $imei = null;
        if ($request->filled('imei')) {
            $imei = ProductImei::with('variant.product')->where('imei', trim($request->imei))->first();
        }
        return view('warranty.lookup', compact('imei'));
    }

    public function store(Request $request)
    {
        abort_unless(session('customer'), 403);
        $data = $request->validate([
            'imei' => ['required', 'string', 'max:30'],
            'issue_description' => ['required', 'string', 'max:3000'],
        ]);
        $customer = session('customer');
        $email = strtolower(trim((string) ($customer['email'] ?? '')));
        $phone = trim((string) ($customer['tel'] ?? ''));
        $imei = ProductImei::with('orderItems.order')
            ->where('imei', trim($data['imei']))
            ->whereHas('orderItems.order', function ($query) use ($email, $phone) {
                $query->where('status', 'completed')->where(function ($owner) use ($email, $phone) {
                    if ($phone !== '') {
                        $owner->where('phone', $phone);
                    }
                    if ($email !== '') {
                        $phone === '' ? $owner->where('email', $email) : $owner->orWhere('email', $email);
                    }
                    if ($phone === '' && $email === '') {
                        $owner->whereRaw('1 = 0');
                    }
                });
            })
            ->firstOrFail();
        abort_unless(in_array($imei->status, ['sold', 'returned', 'warranty'], true), 422, 'IMEI chưa có lịch sử bán hợp lệ.');
        abort_if($imei->warranty_expired_at && $imei->warranty_expired_at->isPast(), 422, 'IMEI đã hết hạn bảo hành.');
        abort_if($imei->warrantyClaims()->whereIn('status', ['submitted', 'received', 'checking', 'repairing', 'ready'])->exists(), 422, 'IMEI đang có yêu cầu bảo hành chưa hoàn tất.');
        $order = $imei->orderItems->map->order->filter(fn ($order) => $order?->status === 'completed')->first();
        $claim = WarrantyClaim::create([
            'product_imei_id' => $imei->id,
            'order_id' => $order?->id,
            'user_id' => session('customer.id'),
            'issue_description' => $data['issue_description'],
        ]);
        $imei->update(['status' => 'warranty']);
        return redirect()->route('warranty.lookup', ['imei' => $imei->imei])->with('success', 'Đã tiếp nhận yêu cầu bảo hành #' . $claim->id . '.');
    }
}
