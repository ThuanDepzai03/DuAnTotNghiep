<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryTransaction;
use App\Models\ProductImei;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImeiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', '10');
        $perPage = in_array($perPage, ['10', '50', '100', 'all'], true) ? $perPage : '10';
        $imeiQuery = ProductImei::with('variant.product')
            ->when($request->filled('variant_id'), fn ($query) => $query->where('product_variant_id', $request->integer('variant_id')))
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = '%' . $request->q . '%';
                $query->where(function ($search) use ($term) {
                    $search->where('imei', 'like', $term)
                        ->orWhere('imei2', 'like', $term)
                        ->orWhereHas('variant', fn ($variant) => $variant->where('sku', 'like', $term));
                });
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->status))
            ->latest();
        $imeis = $perPage === 'all'
            ? $imeiQuery->get()
            : $imeiQuery->paginate((int) $perPage)->withQueryString();
        $variants = ProductVariant::with('product')->where('status', 1)->orderBy('sku')->get();
        $selectedVariantId = (int) $request->query('variant_id', 0);
        return view('admin.inventory.imeis', compact('imeis', 'variants', 'selectedVariantId', 'perPage'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'variant_id' => ['nullable', 'integer', 'exists:product_variants,id'],
            'imei' => ['nullable', 'string', 'max:30'],
        ]);

        $variant = ProductVariant::with('product')
            ->when($request->filled('variant_id'), fn ($query) => $query->whereKey($request->integer('variant_id')))
            ->when($request->filled('imei'), function ($query) use ($request) {
                $query->whereHas('imeis', function ($imeiQuery) use ($request) {
                    $imeiQuery->where('imei', trim($request->imei))
                        ->orWhere('imei2', trim($request->imei));
                });
            })
            ->first();

        if (!$variant) {
            return response()->json(['variant' => null, 'imeis' => []]);
        }

        return response()->json([
            'variant' => [
                'id' => $variant->id,
                'name' => $variant->product->name . ' - ' . $variant->sku,
            ],
            'imeis' => $variant->imeis()
                ->orderBy('id')
                ->get(['id', 'imei', 'imei2', 'status', 'warehouse_location', 'warranty_expired_at'])
                ->map(fn ($imei) => [
                    'imei' => $imei->imei,
                    'imei2' => $imei->imei2,
                    'status' => $imei->status,
                    'location' => $imei->warehouse_location,
                    'warranty' => $imei->warranty_expired_at?->format('d/m/Y'),
                ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_variant_id' => ['required', 'exists:product_variants,id'],
            'imei' => ['required', 'string', 'max:30', 'unique:product_imeis,imei'],
            'imei2' => ['nullable', 'string', 'max:30', 'unique:product_imeis,imei2'],
            'warehouse_location' => ['nullable', 'string', 'max:100'],
            'warranty_expired_at' => ['nullable', 'date'],
        ]);
        $data['received_at'] = now();
        $imei = ProductImei::create($data);
        $imei->variant()->increment('stock');
        InventoryTransaction::create([
            'product_variant_id' => $imei->product_variant_id,
            'product_imei_id' => $imei->id,
            'type' => 'receipt',
            'quantity' => 1,
            'note' => 'Nhập IMEI vào kho',
        ]);
        return back()->with('success', 'Đã nhập IMEI vào kho.');
    }

    public function update(Request $request, ProductImei $imei)
    {
        $data = $request->validate([
            'status' => ['required', 'in:in_stock,reserved,sold,returned,warranty,retired'],
            'warehouse_location' => ['nullable', 'string', 'max:100'],
            'warranty_expired_at' => ['nullable', 'date'],
        ]);
        $imei->update($data);
        return back()->with('success', 'Đã cập nhật trạng thái IMEI.');
    }
}
