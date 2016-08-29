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
</style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $category->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categoryName' => $category->name, 'categories' => $categories])
</div><!-- /#header -->

<div id="intro">
    <div class="main">
    	<h3 class="title">{{ $category->name }}</h3>
    </div>
</div>

@endsection