@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/accessary.css") }}
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
<div id="accessary">
    <div class="main">
        <h4 class="text-uppercase">{{ $banner->name or '' }}</h4>
        <p>{!! $item->description !!}</p>
        @if ($item->slug != 'phu-tung')
        <div class="item">
            <div class="bigimg">
                <img src="{{ ( $item->banner ) ? route('image',$item->banner->image_banner) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}"/>
            </div>
            <ul class="list list-inline">
                @foreach($products as $product)
                <li>
                    <a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}">
                        <img src="{{ ( $product->image ) ? route('image',$product->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $product->name }}" />
                        <p>{{ str_limit($product->name, 15) }}<span >{{ $product->code }}</span></p>
                    </a>
                </li>
                @endforeach
            </ul>
            <nav>{!! $products->render() !!}</nav>
        </div>
        @elseif (count($categories) > 1)
        @foreach ($categories->random(3) as $category)
        <div class="item">
            <div class="bigimg">
                <img src="{{ ($category->banner ) ? route('image', $category->banner->image_banner) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $category->name }}"/>
            </div>
            <ul class="list list-inline">
                @foreach($category->randomProducts->take(3) as $random)
                <li>
                    <a title="{{ $random->name }}" href="{{ route('product.show', $random->slug) }}">
                        <img src="{{ ( $random->image ) ? route('image',$random->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $random->name }}" />
                        <p>{{ str_limit($random->name, 15) }}<span >{{ $random->code }}</span></p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection