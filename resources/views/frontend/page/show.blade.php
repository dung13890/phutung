@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/intro.css") }}
<style>
	#header {
		background: url("{!! ( $item->image ) ? route('image',$item->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ") no-repeat; background-size: 100% 100%;
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
        <h1 class="page-title">{{ $item->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['item' => $item, 'categories' => $pages])
</div><!-- /#header -->

<div id="intro">
    <div class="main">
    	<h3 class="title">{{ $item->name }}</h3>
    	<br>
    	{!! $item->description !!}
    </div>
</div>

@endsection