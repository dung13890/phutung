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

        <div class="like-share">
           <table>
               <tr>
                   <td><div class="fb-like" data-href="{{ Request::url() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></td>
                   <td style="padding-top: 9px;"><div class="g-plusone" data-annotation="none" data-height="14" data-href="{{ Request::url() }}"></div></td>
               </tr>
           </table>
        </div>
    </div>
</div>

@endsection

@push('prescripts')

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@endpush
