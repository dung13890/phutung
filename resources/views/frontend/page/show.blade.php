@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/intro.css") }}
{{ HTML::style('template/css/responsive/intro.css') }}
<style>
	#header {
		background-image: url("{!! ( $item->image ) ? route('image',$item->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ");
        background-repeat: no-repeat;
        background-size: 100% 100%;
	}
</style>
@endpush

<?php
    $pageFirst = $pages->shift();
?>

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $item->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categoryFirst' => $pageFirst, 'item' => $item, 'categories' => $pages])
</div><!-- /#header -->

<div id="intro">
    <div class="main">
    	<h3 class="title">{{ $item->name }}</h3>
    	<br>
    	{!! $item->description !!}
    </div>
</div>


@endsection
