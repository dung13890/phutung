@extends('layouts.frontend')

@push('prestyles')
    {{ HTML::style("template/css/intro.css") }}
    {{ HTML::style('template/css/responsive/intro.css') }}
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
        <h1 class="page-title">{{ trans('repositories.news') }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categoryFirst' => $categoryFirst, 'categories' => $categories])
</div><!-- /#header -->

<ol class="breadcrumb">
    <li>
        <a href="/" title="{{ trans('respositories.home') }}">
            {{ trans('repositories.home') }}
        </a>
    </li>
    <li>
        <a href="{{ route('category.show', ['slug' => $category->slug]) }}" title="{{ $category->name }}">
            {{ $category->name }}
        </a>
    </li>
    <li class="active">
        {{ $item->name }}
    </li>
</ol>

<div id="intro">
    <div class="main">
    	<h3 class="title">{{ $category->name }}</h3>
    	<h3 >{{ $item->name }}</h3>
    	<br>
    	{!! $item->description !!}

        <br>
    </div>
</div>

@endsection
