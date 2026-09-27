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

        $rules = [
            'code' => 'required|string|max:255|unique:vouchers,code',
            'name' => 'required|string|max:255',

            'voucher_type' => 'required|in:normal,flash_sale,mid_autumn',

            'discount_type' => 'required|in:percent,fixed,free_shipping',

            'max_discount' => 'nullable|numeric|min:0',

            'min_order' => 'nullable|numeric|min:0',

            'quantity' => 'required|integer|min:1',

            'start_date' => 'required|date',

            'end_date' => 'required|date|after_or_equal:start_date',

            'status' => 'required|boolean',
        ];

        // Kiểm tra giá trị giảm
        if ($discountType === 'percent') {

            $rules['discount_value'] =
                'required|numeric|min:1|max:100';
        } elseif ($discountType === 'fixed') {

            $rules['discount_value'] =
                'required|numeric|min:1';
        } else {

            $rules['discount_value'] =
                'nullable|numeric|min:0';
        }

        $request->validate($rules);

        Voucher::create([
            'code' => strtoupper(trim($request->code)),

            'name' => trim($request->name),

            'voucher_type' => $request->voucher_type,

            'discount_type' => $discountType,

            'discount_value' =>
            $discountType === 'free_shipping'
                ? 0
                : $request->discount_value,

            'max_discount' =>
            $discountType === 'percent'
                ? $request->max_discount
                : null,

            'min_order' =>
            $request->input('min_order', 0) ?: 0,

            'quantity' => $request->quantity,

            'used_quantity' => 0,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'status' => $request->status,
        ]);

        \App\Services\SeederSyncService::syncVouchers();

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Thêm Voucher thành công!');
    }


    /*
    |--------------------------------------------------------------------------
    | Hiển thị form sửa Voucher
    |--------------------------------------------------------------------------
    */
    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }


    /*
    |--------------------------------------------------------------------------
    | Cập nhật Voucher
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Voucher $voucher)
    {
        $discountType = $request->input('discount_type', 'percent');

        $rules = [
            // Quan trọng:
            // Không được báo trùng với chính voucher đang sửa
            'code' => 'required|string|max:255|unique:vouchers,code,' . $voucher->id,

            'name' => 'required|string|max:255',

            'voucher_type' => 'required|in:normal,flash_sale,mid_autumn',

            'discount_type' => 'required|in:percent,fixed,free_shipping',

            'max_discount' => 'nullable|numeric|min:0',

            'min_order' => 'nullable|numeric|min:0',

            'quantity' => 'required|integer|min:1',

            'start_date' => 'required|date',

            'end_date' => 'required|date|after_or_equal:start_date',

            'status' => 'required|boolean',
        ];

        // Kiểm tra giá trị giảm
        if ($discountType === 'percent') {

            $rules['discount_value'] =
                'required|numeric|min:1|max:100';
        } elseif ($discountType === 'fixed') {

            $rules['discount_value'] =
                'required|numeric|min:1';
        } else {

            $rules['discount_value'] =
                'nullable|numeric|min:0';
        }

        $request->validate($rules);

        $voucher->update([
            'code' => strtoupper(trim($request->code)),

            'name' => trim($request->name),

            'voucher_type' => $request->voucher_type,

            'discount_type' => $discountType,

            'discount_value' =>
            $discountType === 'free_shipping'
                ? 0
                : $request->discount_value,

            'max_discount' =>
            $discountType === 'percent'
                ? $request->max_discount
                : null,

            'min_order' =>
            $request->input('min_order', 0) ?: 0,

            'quantity' => $request->quantity,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'status' => $request->status,
        ]);

        \App\Services\SeederSyncService::syncVouchers();

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Cập nhật Voucher thành công!');
    }


    /*
    |--------------------------------------------------------------------------
    | Xóa Voucher
    |--------------------------------------------------------------------------
    */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        \App\Services\SeederSyncService::syncVouchers();

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Xóa Voucher thành công!');
    }
}
