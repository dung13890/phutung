@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/news.css") }}
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
    #news .big-news .caption a{
        color:#fff;
    }
    #news .list-news .news:last-of-type {
        border:0;
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

<div id="news">
	<div class="main">
		<h4 class="text-uppercase">{{ $item->name }}</h4>
		@if (count($posts))
		<?php
			$postFirst = $posts->shift();
		?>
        <div class="big-news">
            <div class="image">
                <a href="{{ route('post.show', $postFirst->slug) }}" title="{{ $postFirst->name }}"><img src="{{ ( $postFirst->image ) ? route('image',$postFirst->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{$postFirst->name }}" /></a>
                <div class="caption"><a href="{{ route('post.show', $postFirst->slug) }}" > {{ $postFirst->name }}</a></div>
            </div>
            <div class="text">
                <p>{{ $postFirst->intro }}</p>
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
                    <a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết">Công ty cổ phần thiết bị Tân Phát tổ chức tham quan du lịch tại Đà Nẵng</a>
                    <div class="detail">
                        <span>{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                        <a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết" class="pull-right">Xem chi tiết &raquo;</a>
                    </div>
                </div>
            </div>
            @endforeach
            <nav>{!! $posts->render() !!}</nav>
        </div>

		@endif
	</div>
</div>
@endsection