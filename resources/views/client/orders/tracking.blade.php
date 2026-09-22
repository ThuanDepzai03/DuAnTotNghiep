@extends('layouts.master')

@section('content')
<div class="section" style="padding: 40px 0; background: #f8f9fb;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <div>
                        <h3 class="title" style="margin: 0; font-weight: 700; color: #1f2937;">Đơn hàng của bạn</h3>
                        <p style="margin: 6px 0 0; color: #6b7280;">Theo dõi trạng thái, xem sản phẩm và chi tiết từng đơn hàng.</p>
                    </div>
                    <a href="{{ route('home') }}" class="primary-btn" style="padding: 10px 18px;">Tiếp tục mua sắm</a>
                </div>

                @if($orders->isEmpty())
                    <div class="alert alert-info" style="border-radius: 12px; padding: 18px 20px;">Bạn chưa có đơn hàng nào.</div>
                @else
                    @foreach($orders as $order)
                        <div class="order-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 18px; box-shadow: 0 10px 30px rgba(15,23,42,0.06); margin-bottom: 22px; overflow: hidden;">
                            <div class="order-card__header" style="display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 18px 22px; border-bottom: 1px solid #f1f5f9; flex-wrap: wrap; background: #f9fafb;">
                                <div>
                                    <strong style="font-size: 18px; color: #111827;">Đơn #{{ $order->id }}</strong>
                                    <div style="color: #6b7280; font-size: 13px; margin-top: 4px;">
                                        {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : '-' }}
                                    </div>
                                </div>
                                <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                                    <span class="label" style="padding: 6px 12px; border-radius: 999px; color: #fff; background: #d10024; font-size: 12px; font-weight: 600; text-transform: capitalize;">
                                        {{ $order->status }}
                                    </span>
                                    <span style="font-size: 14px; color: #374151; font-weight: 700;">Tổng: {{ number_format($order->total_price, 0, ',', '.') }}₫</span>
                                </div>
                            </div>

                            <div class="order-card__body" style="padding: 18px 22px;">
                                @php
                                    $totalItems = $order->items ?? collect();
                                @endphp

                                @if($totalItems->isEmpty())
                                    <div style="color: #6b7280;">Đơn hàng này chưa có sản phẩm.</div>
                                @else
                                    <div class="row" style="margin: 0 -10px;">
                                        @foreach($totalItems as $item)
                                            @php
                                                $variant = $item->variant;
                                                $product = $variant?->product;
                                                $productName = $product?->name ?? 'Sản phẩm';
                                                $productImage = $variant?->image ?? $product?->thumbnail ?? 'img/logo.png';
                                                $productImage = ltrim(str_replace('\\', '/', $productImage), '/');
                                                if (str_starts_with($productImage, 'public/')) {
                                                    $productImage = substr($productImage, 7);
                                                }
                                                $productImage = preg_match('#^https?://#', $productImage)
                                                    ? $productImage
                                                    : asset($productImage);
                                            @endphp
                                            <div class="col-md-6 col-sm-12" style="padding: 10px;">
                                                <div style="display: flex; gap: 14px; padding: 12px; border: 1px solid #edf2f7; border-radius: 14px; background: #fff; align-items: center;">
                                                    <img src="{{ $productImage }}" alt="{{ $productName }}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 10px; background: #f3f4f6; border: 1px solid #e5e7eb;" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                                                    <div style="flex: 1; min-width: 0;">
                                                        <div style="font-weight: 700; color: #111827; margin-bottom: 6px; line-height: 1.4;">{{ $productName }}</div>
                                                        <div style="font-size: 13px; color: #6b7280; margin-bottom: 6px;">
                                                            @if($variant && $variant->sku)
                                                                SKU: {{ $variant->sku }}
                                                            @endif
                                                        </div>
                                                        <div style="display: flex; justify-content: space-between; gap: 12px; align-items: center; flex-wrap: wrap;">
                                                            <span style="font-size: 13px; color: #374151;">Số lượng: <strong>{{ $item->quantity }}</strong></span>
                                                            <span style="font-size: 14px; color: #d10024; font-weight: 700;">{{ number_format($item->price, 0, ',', '.') }}₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="order-card__footer" style="padding: 0 22px 20px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
                                <div style="color: #6b7280; font-size: 13px;">
                                    Phương thức thanh toán: <strong>{{ strtoupper($order->payment_method ?? 'COD') }}</strong>
                                </div>
                                <a href="{{ route('orders.tracking.show', $order->id) }}" class="primary-btn" style="padding: 9px 16px; border-radius: 10px;">Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
