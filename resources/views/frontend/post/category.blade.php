@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/news.css") }}
{{ HTML::style('template/css/responsive/news.css') }}
<style>
	#header {
		background-image: url("{!! ( $banner ) ? route('image',$banner->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ");
        background-repeat: no-repeat;
        background-size: 100% 100%;
	}
    #news .big-news {
        width: 100%;
    }
    #news .big-news .caption a{
        color:#fff;
    }
    #news .big-news .caption a:hover {
        color:#F1ED08;
    }
    #news .list-news .news:last-of-type {
        border:0;
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

<div id="news">
	<div class="main">
        @if (count($posts))
        <?php
            $postFirst = $posts->shift();
        ?>
		<h4 class="text-uppercase"><a href="{{ route('post.show', $postFirst->slug) }}">{{ $postFirst->name }}</a></h4>
        <div class="big-news">
            <div class="image">
                <a href="{{ route('post.show', $postFirst->slug) }}" title="{{ $postFirst->name }}"><img src="{{ ( $postFirst->image ) ? route('image',$postFirst->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{$postFirst->name }}" /></a>
            </div>
            <div class="text">
                <p>{{ $postFirst->intro }}</p>
                <br>
                <p>{{ str_limit(strip_tags($postFirst->description), 350) }}</p>
            </div>
        </div>
        <div class="list-news">
        	@foreach ($posts as $post)
            <div class="news">
                <div class="image">
                    <a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết">
                        <img src="{{ ( $post->image ) ? route('image',$post->image_tiny) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $post->name }}" />
                    </a>
                </div>
                <div class="info">
                    <a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết">{{ $post->name }}</a>
                    <div class="intro">
                        <p>{{ str_limit($post->intro, 150) }}</p>
                    </div>
                    <div class="detail">
                        <span>{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                        <a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết" class="pull-right">Xem chi tiết &raquo;</a>
                    </div>
                </div>
            </div>
            @endforeach
            <nav class="text-center">{!! $posts->render() !!}</nav>
            <br>
        </div>

		@endif
	</div>
</div>
@endsection
