<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $discountType = $request->input('discount_type', 'percent');

        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers,code',
            'name' => 'required|string|max:255',
            'voucher_type' => 'required|in:normal,flash_sale,mid_autumn',
            'discount_type' => 'required|in:percent,fixed,free_shipping',

            'discount_value' => $discountType === 'free_shipping'
                ? 'nullable|numeric|min:0'
                : ($discountType === 'percent'
                    ? 'required|numeric|min:1|max:100'
                    : 'required|numeric|min:1'),

            'max_discount' => 'nullable|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required',
        ]);

        Voucher::create([
            'code' => strtoupper(trim($request->code)),
            'name' => $request->name,
            'voucher_type' => $request->voucher_type,
            'discount_type' => $discountType,

            'discount_value' => $discountType === 'free_shipping'
                ? 0
                : $request->discount_value,

            'max_discount' => $discountType === 'free_shipping'
                ? null
                : $request->max_discount,

            'min_order' => $request->input('min_order', 0) ?: 0,
            'quantity' => $request->quantity,
            'used_quantity' => 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Thêm Voucher thành công!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);

        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $discountType = $request->input('discount_type', 'percent');

        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers,code,' . $id,
            'name' => 'required|string|max:255',
            'voucher_type' => 'required|in:normal,flash_sale,mid_autumn',
            'discount_type' => 'required|in:percent,fixed,free_shipping',

            'discount_value' => $discountType === 'free_shipping'
                ? 'nullable|numeric|min:0'
                : ($discountType === 'percent'
                    ? 'required|numeric|min:1|max:100'
                    : 'required|numeric|min:1'),

            'max_discount' => 'nullable|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required',
        ]);

        $voucher->update([
            'code' => strtoupper(trim($request->code)),
            'name' => $request->name,
            'voucher_type' => $request->voucher_type,
            'discount_type' => $discountType,

            'discount_value' => $discountType === 'free_shipping'
                ? 0
                : $request->discount_value,

            'max_discount' => $discountType === 'free_shipping'
                ? null
                : $request->max_discount,

            'min_order' => $request->input('min_order', 0) ?: 0,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Cập nhật Voucher thành công!');
    }

    public function destroy($id)
    {
        Voucher::findOrFail($id)->delete();

        return back()->with('success', 'Đã xóa');
    }
}
