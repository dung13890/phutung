@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/device.css") }}
{{ HTML::style('template/css/responsive/device.css') }}
<style>
	#header {
		background-image: url("{!! ( $banner ) ? route('image',$banner->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ");
        background-repeat: no-repeat;
        background-size: 100% 100%;
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
    @include('frontend._partials.sidebar', ['categoryFirst' => $categoryFirst, 'item' => $item, 'categories' => $categories])
</div>

<ol class="breadcrumb">
    <li>
        <a href="/" title="{{ trans('repositories.home') }}">
            {{ trans('repositories.home') }}
        </a>
    </li>
    <li>
        {{ $item->name}}
    </li>
</ol>

<div id="device">
    <div class="main">
        <p>{!! $item->description !!}</p>
        <div class="item">
            <ul class="list list-inline">
                @foreach($products as $product)
                    <li>
                        <a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ ( $product->image_small ) ? route('image',$product->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $product->name }}" />
                        </a>
                        <p>
                            <strong>{{ trans('repositories.product_code') }}:</strong>
                            {{ $product->code }}
                        </p>
                        <p>
                            <span class="text-uppercase">{{ trans('repositories.provider') }}</span>:
                            {{ isset($product->provider) ? $product->provider->name : '' }}
                        </p>
                        <p>
                            <span class="text-uppercase">{{ trans('repositories.guarantee') }}</span>:
                            {{ config("developer.guarantee.{$product->guarantee}") }}
                        </p>
                        <div class="name">
                            <a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <nav class="text-center">{!! $products->render() !!}</nav>
        </div>
    </div>
</div>
@endsection
