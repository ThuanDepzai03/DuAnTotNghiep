@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title" style="margin-bottom: 20px;">Hành trình đơn hàng #{{ $order->id }}</h3>

                <div class="alert alert-info">
                    Trạng thái hiện tại: <strong>{{ $order->status }}</strong>
                </div>

                <div class="row" style="margin-bottom: 25px;">
                    @foreach($order->tracking_timeline as $step)
                        <div class="col-md-3" style="margin-bottom: 15px;">
                            <div style="border: 1px solid #ddd; border-radius: 8px; padding: 12px; background: {{ $step['active'] ? '#f7f7f7' : '#fff' }};">
                                <strong>{{ $step['label'] }}</strong>
                                <div style="margin-top: 6px; color: {{ $step['done'] ? '#1e7e34' : '#777' }}; font-size: 13px;">
                                    {{ $step['done'] ? 'Hoàn tất' : ($step['active'] ? 'Đang thực hiện' : 'Chờ tới') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Thông tin đơn hàng</strong></div>
                    <div class="panel-body">
                        <p><strong>Người nhận:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Điện thoại:</strong> {{ $order->phone }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                        <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }}₫</p>
                        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                    </div>
                </div>

                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading"><strong>Sản phẩm</strong></div>
                    <div class="panel-body">
                        @foreach($order->items as $item)
                            <div style="border-bottom:1px solid #eee; padding:8px 0;">
                                <div><strong>{{ $item->variant->product->name ?? 'Sản phẩm' }}</strong></div>
                                <div>SL: {{ $item->quantity }} - Giá: {{ number_format($item->price, 0, ',', '.') }}₫</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading"><strong>Đánh giá sản phẩm</strong></div>
                    <div class="panel-body">
                        <p class="text-muted">Chia sẻ cảm nhận của bạn về sản phẩm trong đơn hàng.</p>
                        @foreach($order->items as $item)
                            @php
                                $product = $item->variant?->product;
                                $review = $reviews[$product?->id] ?? null;
                            @endphp
                            @if($product)
                                <div class="order-review" style="padding:15px 0; border-top:1px solid #eee;">
                                    <strong>{{ $product->name }}</strong>
                                    @if($review)
                                        <div style="color:#f0ad00; margin:6px 0;">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</div>
                                        <p style="margin-bottom:10px;">{{ $review->comment }}</p>
                                        <small class="text-muted">Bạn đã đánh giá sản phẩm này. Có thể cập nhật bên dưới.</small>
                                    @endif
                                    <form method="POST" action="{{ route('orders.tracking.review', $order->id) }}" style="margin-top:10px;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div style="margin-bottom:8px;">
                                            @for($rating = 1; $rating <= 5; $rating++)
                                                <label style="margin-right:10px; cursor:pointer;">
                                                    <input type="radio" name="rating" value="{{ $rating }}" {{ (int) old('rating', $review?->rating ?? 5) === $rating ? 'checked' : '' }} required>
                                                    {{ $rating }} sao
                                                </label>
                                            @endfor
                                        </div>
                                        <textarea name="comment" rows="3" maxlength="2000" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;" placeholder="Nhập bình luận của bạn...">{{ old('comment', $review?->comment) }}</textarea>
                                        <button type="submit" class="btn btn-primary" style="margin-top:8px;">{{ $review ? 'Cập nhật đánh giá' : 'Gửi đánh giá' }}</button>
                                    </form>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
