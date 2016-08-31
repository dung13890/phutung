@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/product.css") }}
<style>
	#header {
		background: url("{!! ( $banner ) ? route('image',$banner->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ") no-repeat; background-size: 100% 100%;
	}
	.main { 
		min-height: 350px;
	}
	#header .links .submenu {
		z-index: 1000;
	}
</style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $category->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categories' => $categories])
</div><!-- /#header -->

<div id="product">
    <div class="main">
    	<div>
            Trang chủ >> {{ $category->name }} >> {{ $item->name }}
        </div>
        <h3 class="product-title">
            <span class="text-uppercase">{{ str_limit($item->name, 40) }}</span>
        </h3>
        <div class="product-detail">
        	@if (count($item->images))
        	<div class="product-images">
        		<ul class="list-unstyled">
        			@foreach ($item->images->take(3) as $image)
        			<li>
                        <img src="{{ ( $image->image ) ? route('image',$image->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $image->name }}" class="img-responsive"/>
                    </li>
                    @endforeach
        		</ul>
        	</div>
        	@endif
        	<div class="product-bigimage">
                <img src="{{ ( $item->image ) ? route('image',$item->image_medium) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/>
            </div>
            <div class="product-info">
                <h3 class="code"><span class="text-uppercase">{{ $item->code }}</span></h3>

                <div class="provider">
                    Nhà cung cấp {{ $item->provider }}
                </div>

                <div class="desc">
                    <p>
                        <strong>Model: </strong> G-SCAN 2 ASEAN KIT
                    </p>
                    <p>
                        <strong>Xuất xứ: </strong> GIT Korea
                    </p>
                    <p>
                        <strong>Bảo hành: </strong> {{ config("developer.guarantee.{$item->guarantee}") }}
                    </p>
                </div>

                <div class="price">
                    Giá: {{ number_format($item->price) }} vnđ
                </div>

                <div class="like-share">
                    <div class="item">
                        <a href="#">
                            <img src="/assets/img/i-fb-like.png" alt="icon fb like"/> Thích
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            Chia sẻ
                            <img src="/assets/img/i-fb-share.png" alt="icon fb share"/>
                            <img src="/assets/img/i-google-share.png" alt="icon google share"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-tabs">
            <ul class="tabs">
                <li class="active">
                    <a href="#">Chi tiết</a>
                </li>
                <li>
                    <a href="#">Videos</a>
                </li>
                <li>
                    <a href="#">Hướng dẫn</a>
                </li>
            </ul>
            <div class="content">
                <p>Từ xưa đến nay, Jose Mourinho vốn có tiếng là dị ứng với các ngôi sao và bởi thế ông chẳng mấy khi chiêu mộ những ngôi sao lớn. Vậy mà ở Man United, Mourinho đã đốc thúc CLB ký với Ibra và Pogba, những ngôi sao lớn với tầm ảnh hưởng bao trùm, qua đó có thể thấy những đổi thay mạnh mẽ đang xảy ra trong trái tim và trong khối óc “Người đặc biệt”.</p>
                <p>Từ xưa đến nay, Jose Mourinho vốn có tiếng là dị ứng với các ngôi sao và bởi thế ông chẳng mấy khi chiêu mộ những ngôi sao lớn. Vậy mà ở Man United, Mourinho đã đốc thúc CLB ký với Ibra và Pogba, những ngôi sao lớn với tầm ảnh hưởng bao trùm, qua đó có thể thấy những đổi thay mạnh mẽ đang xảy ra trong trái tim và trong khối óc “Người đặc biệt”.</p>
            </div>
        </div>

        <div class="product-tabs">
            <ul class="tabs">
                <li class="active">
                    <a href="{{ route('category.show', $category->slug) }}">Sản phẩm cùng danh mục</a>
                </li>
            </ul>
            <div class="content">
                <div class="slider">
                    <ul>
                    	@foreach ($randomProducts as $same)
                        <li>
                            <a href="{{ route('product.show', $same->slug) }}" title="$same->name">
                                <img src="{{ ( $same->image ) ? route('image',$same->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $same->name }}"/>
                            </a>
                            <p style="color:#e06b6b;">{{ str_limit($same->name, 20) }}</p>
                            <p>Bộ VXL Core i3 6100U</p>
                            <a class="btn-detail" href="{{ route('product.show', $same->slug) }}" title="Xem chi tiết">Xem chi tiết</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="change">
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection