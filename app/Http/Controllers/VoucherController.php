<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::latest()->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'name' => 'required',
            'voucher_type' => 'required|in:normal,flash_sale,mid_autumn',
            'discount_value' => 'required|numeric|min:1|max:100',
            'max_discount' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required',
        ]);

        Voucher::create([
            'code' => $request->code,
            'name' => $request->name,
            'voucher_type' => $request->voucher_type,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'max_discount' => $request->max_discount,
            'min_order' => $request->min_order,
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
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);

        return view(
            'admin.vouchers.edit',
            compact('voucher')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $id,
            'name' => 'required',
            'discount_value' => 'required|numeric|min:1|max:100',
            'max_discount' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required',
        ]);

        $voucher->update([
            'code' => $request->code,
            'name' => $request->name,

            // Database của bạn dùng "percent"
            'discount_type' => 'percent',

            'discount_value' => $request->discount_value,
            'max_discount' => $request->max_discount,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Cập nhật Voucher thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Voucher::findOrFail($id)->delete();

        return back()
            ->with('success', 'Đã xóa');
    }
}
