@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/accessary.css") }}
{{ HTML::style('template/css/responsive/accessary.css') }}
<style>
	#header {
		background-image: url("{!! ( $banner ) ? route('image',$banner->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ");
        background-repeat: no-repeat;
        background-size: 100% 100%;
	}
    #news .big-news {
        width: 100%;
    }
</style>
@endpush

@section('page-content')
<?php
    $categoryFirst = $categories->shift();
?>
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $item->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categoryFirst' => $categoryFirst , 'item' => $item, 'categories' => $categories])
</div><!-- /#header -->

<ol class="breadcrumb">
    <li>
        <a href="/" title="{{ trans('respositories.home') }}">
            {{ trans('repositories.home') }}
        </a>
    </li>
    <li class="active">
        {{ $item->name }}
    </li>
</ol>

<div id="accessary">
    <div class="main">
        <p>{!! $item->description !!}</p>
        @if ($item->slug != 'phu-tung' || $item->slug != 'accessary')
        <div class="item">
            <div class="bigimg">
                <img src="{{ ( $item->banner ) ? route('image',$item->banner->image_banner) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}"/>
            </div>
            <ul class="list list-inline">
                <?php //dd($products); ?>
                @foreach($products as $product)
                    <li>
                        <a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ ( $product->image_accessary ) ? route('image',$product->image_accessary) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $product->name }}" />
                            <p class="text-center">{{ str_limit($product->name, 10) }}<span >{{ $product->code }}</span></p>
                        </a>
                    </li>
                @endforeach
            </ul>
            <nav class="text-center">{!! $products->render() !!}</nav>
        </div>
        @else
        @foreach ($categories->take(5) as $category)
        <div class="item">
            <div class="bigimg">
                <img src="{{ ($category->banner ) ? route('image', $category->banner->image_banner) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $category->name }}"/>
            </div>
            <ul class="list list-inline">
                @foreach($category->randomProducts->take(3) as $random)
                <li>
                    <a title="{{ $random->name }}" href="{{ route('product.show', $random->slug) }}">
                        <img src="{{ ( $random->image ) ? route('image',$random->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $random->name }}" />
                        <p class="text-center">{{ str_limit($random->name, 15) }}<span >{{ $random->code }}</span></p>
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
