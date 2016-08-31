@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/device.css") }}
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
    #news .big-news {
        width: 100%;
    }
</style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $item->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['item' => $item, 'categories' => $categories])
</div><!-- /#header -->
<div id="device">
    <div class="main">
        <h4 class="text-uppercase">{{ $banner->name or '' }}</h4>
        <p>{!! $item->description !!}</p>
        <div class="item">
            <ul class="list list-inline">
                @foreach($products as $product)
                <li>
                    <a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}"><img src="{{ ( $product->image ) ? route('image',$product->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $product->name }}" /></a>
                    <p><strong>Mã Sản phẩm:</strong> {{ $product->code }}</p>
                    <p>Nhà cung cấp: {{ $product->provider }}</p>
                    <p>Bảo hành: {{ config("developer.guarantee.{$product->guarantee}") }}</p>
                    <div class="name"><a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}"> {{ str_limit($product->name, 25) }}</a></div>
                </li>
                @endforeach
            </ul>
            <nav>{!! $products->render() !!}</nav>
        </div>
    </div>
</div>
@endsection