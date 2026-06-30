@extends('layouts.master')

@section('content')
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản Phẩm</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li><a href="{{ route('home', ['iddm' => 'all']) }}">News</a></li>
							@foreach ($danhmuc as $dm)
								<li><a href="{{ route('home', ['iddm' => $dm['id']]) }}">{{ $dm['name'] }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				@if (!empty($newProducts))
					@foreach ($newProducts as $sp)
						<div class="col-md-3 col-sm-6 mb-4">
							<div class="product">
								<div class="product-img">
									<a href="{{ route('product.detail', $sp['id']) }}">
										<img src="{{ asset('admin/' . ($sp['img'] ?? 'default.png')) }}" alt="{{ $sp['name'] }}">
									</a>
									<div class="product-label"><span class="new">News</span></div>
								</div>
								<div class="product-body">
									<p class="product-category">{{ $sp['category_name'] ?? '' }}</p>
									<h3 class="product-name">
										<a href="{{ route('product.detail', $sp['id']) }}">{{ $sp['name'] }}</a>
									</h3>
									<h4 class="product-price">{{ number_format($sp['price']) }} ₫</h4>
									<div class="product-rating">
										<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									</div>
									<div class="product-btns">
										<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
										<button class="add-to-compare"><i class="fa fa-exchange"></i></button>
										<button class="quick-view"><i class="fa fa-eye"></i></button>
									</div>
								</div>
								<div class="add-to-cart">
                                    <button class="add-to-cart-btn" onclick="location.href='{{ route('cart.add', ['idsp' => $sp['id']]) }}'">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<p>Hiện chưa có sản phẩm nào.</p>
				@endif
			</div>
		</div>
	</div>

	<div id="hot-deal" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li><div><h3>02</h3><span>Days</span></div></li>
							<li><div><h3>10</h3><span>Hours</span></div></li>
							<li><div><h3>34</h3><span>Mins</span></div></li>
							<li><div><h3>60</h3><span>Secs</span></div></li>
						</ul>
						<h2 class="text-uppercase">hot deal this week</h2>
						<p>New Collection Up to 50% OFF</p>
						<a class="primary-btn cta-btn" href="{{ route('shop') }}">Shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection