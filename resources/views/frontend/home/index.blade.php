@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/home.css") }}
<style>
    #home .section-half .title a {
        color:#fff;
    }

    #home .section-half .title a:hover {
        color:#F1ED08;
    }

    #home .section-half .image ul {
        margin-top: 20px;
    }

    #home .section-half .image ul li {
        width: 32.8%;
        padding: 7px;
        background: #ffffff;
        display: inline-block;
    }

    #home .section-half .image ul li a span {
        width: 100%;
        height: 30px;
        line-height: 30px;
        display: block;
        color: #000000;
    }

    #home .section-half .image ul li a span.msp {
        padding: 3px;
        line-height: 24px;
        background: url('/template/img/bg-home-msp.png') no-repeat;
        background-size: 140% 100%;
        text-indent: 47%;
        font-weight: bold;
    }
</style>
@endpush



@section('page-content')
<div id="home">
    <!-- Section-half -->
    <div class="section-half">
        <div class="title">
            <a href="{{ $configs['box_left_link'] }}" title="{{ $configs['box_left_name'] }}">
                {{ $configs['box_left_name'] }}
            </a>
        </div>
        <div class="image">
            <a href="{{ $configs['box_left_link'] }}" title="{{ $configs['box_left_name'] }}">
                <img src="{{ route('image', $configs['box_left_image']) }}" alt="{{ $configs['box_left_name'] }}">
            </a>

            @if(!$accessaries->isEmpty())
                <ul class="list-unstyled">
                    @foreach($accessaries as $accessary)
                        <li>
                            <a href="{{ route('product.show', ['slug' => $accessary->slug]) }}" title="{{ $accessary->name }}">
                                <img src="{{ route('image', $accessary->image) }}" alt=""/>
                                <span class="msp">{{ $accessary->code }}</span>
                                <span>Model: {{ $accessary->model }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="section-half">
        <div class="title">
            <a href="{{ $configs['box_right_link'] }}" title="{{ $configs['box_right_name'] }}">
                {{ $configs['box_right_name'] }}
            </a>
        </div>
        <div class="image">
            <a href="{{ $configs['box_right_link'] }}" title="{{ $configs['box_right_name'] }}">
                <img src="{{ route('image', $configs['box_right_image']) }}" alt="{{ $configs['box_right_name'] }}">
            </a>

            @if(!$devices->isEmpty())
                <ul class="list-unstyled">
                    @foreach($devices as $device)
                        <li>
                            <a href="{{ route('product.show', ['slug' => $device->slug]) }}" title="{{ $device->name }}">
                                <img src="{{ route('image', $device->image) }}" alt=""/>
                                <span class="msp">{{ $accessary->code }}</span>
                                <span>Model: {{ $accessary->model }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="clear"></div>

    @if ($postCategory)
    <div class="title news-title"><a style="color:#fff;" href="{{ route('category.show', $postCategory->slug) }}" title="{{ trans('repositories.post_event') }}" >{{ trans('repositories.post_event') }}</a></div>
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
                        <span class="pull-right"><a href="{{ route('post.show',$post->slug) }}" title="{{ trans('repositories.view_detail') }}">{{ trans('repositories.view_detail') }} &raquo;</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div><!-- /#home -->
@endsection
