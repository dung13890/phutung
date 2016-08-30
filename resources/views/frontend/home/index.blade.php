@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/home.css") }}
@endpush

@section('page-content')
<div id="home">
    <!-- Section-half -->
    <div class="section-half">
        <div class="title"><a style="color:#fff;" href="{{ $configs['box_left_link'] }}" title="{{ $configs['box_left_name'] }}">{{ $configs['box_left_name'] }}</a></div>
    </div>
    <div class="section-half">
        <div class="title"><a style="color:#fff;" href="{{ $configs['box_right_link'] }}" title="{{ $configs['box_right_name'] }}">{{ $configs['box_right_name'] }}</a></div>
    </div>
    <div class="clear"></div>

    <!-- Section -->
    <div class="section">
        <ul class="items">
            <li><a href="{{ $configs['box_left_link'] }}" title="{{ $configs['box_left_name'] }}"><img src="{{ route('image', $configs['box_left_image']) }}" alt="{{ $configs['box_left_name'] }}"></a></li>
            <li><a href="{{ $configs['box_right_link'] }}" title="{{ $configs['box_right_name'] }}"><img src="{{ route('image', $configs['box_right_image']) }}" alt="{{ $configs['box_right_name'] }}"></a></li>
        </ul>
    </div>
    <div class="clear"></div>
    @if ($postCategory)
    <div class="title news-title"><a style="color:#fff;" href="{{ route('category.show', $postCategory->slug) }}" title="Tin tức & Sự kiện" >Tin tức & Sự kiện</a></div>
    @endif
    @if (count($posts))
    <!-- Section -->
    <?php
        $postFirst = $posts->shift();
    ?>
    <div class="section">
        <div class="info">
            <a href="{{ route('post.show',$postFirst->slug) }}" title="{{ $postFirst->name }}"><img src="{{ ( $postFirst->image ) ? route('image',$postFirst->image_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $postFirst->name }}" ></a>
            <div class="text">
                <a href="{{ route('post.show',$postFirst->slug) }}" title="{{ $postFirst->name }}">{{ $postFirst->name }}</a>
                <p>{{ str_limit($postFirst->intro, 100) }}</p>
            </div>
        </div>
        <div class="list">
            @foreach ($posts as $post)
            <div class="news">
                <div class="image">
                    <a href="{{ route('post.show',$post->slug) }}" title="{{ $post->name }}"><img src="{{ ( $post->image ) ? route('image',$post->image_tiny) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $post->name }}"></a>
                </div>
                <div class="detail">
                    <a href="{{ route('post.show',$post->slug) }}" title="{{ $post->name }}">{{ $post->name }}</a>
                    <div>
                        <span>{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                        <span class="pull-right"><a href="{{ route('post.show',$post->slug) }}" title="Xem chi tiết">Xem chi tiết &raquo;</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div><!-- /#home -->
@endsection