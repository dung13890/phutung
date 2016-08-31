@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/product.css") }}
{{ HTML::style("vendor/magnific-popup/magnific-popup.css") }}
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
    @include('frontend._partials.sidebar', ['categories' => $categories])
</div><!-- /#header -->

<div id="product">
    <div class="main">
    	<div>
            {{ trans('repositories.home') }} >> {{ $category->name }} >> {{ $item->name }}
        </div>
        <h3 class="product-title">
            <span class="text-uppercase">{{ str_limit($item->name, 40) }}</span>
        </h3>
        <div class="product-detail">
        	@if (count($item->images))
        	<div class="product-images">
        		<ul class="list-unstyled">
        			@foreach ($item->images->take(3) as $image)
        			<li>
                        <a class="image-thumb" href="javascript:;" 
                            data-default="{{ ( $image->image ) ? route('image',$image->image_default) :  asset('assets/img/backend/no_image.jpg') }}"
                            data-medium="{{ ( $image->image ) ? route('image',$image->image_medium) :  asset('assets/img/backend/no_image.jpg') }}"><img src="{{ ( $image->image ) ? route('image',$image->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $image->name }}" class="img-responsive"/></a>
                    </li>
                    @endforeach
        		</ul>
        	</div>
        	@endif
        	<div class="product-bigimage">
                <a class="popup-link" href="{{ ( $item->image ) ? route('image', $item->image_default) :  asset('assets/img/backend/no_image.jpg') }}" title="{{ $item->name }}">
                    <img src="{{ ( $item->image ) ? route('image',$item->image_medium) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/>
                </a>
            </div>
            <div class="product-info">
                <h3 class="code"><span class="text-uppercase">{{ $item->code }}</span></h3>

                <div class="provider">
                    {{ isset($item->provider) ? $item->provider->name : trans('repositories.provider') }} <img src="{{ (isset($item->provider)) ? route('image', $item->provider->image_tiny) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ isset($item->provider) ? $item->provider->name : trans('repositories.provider') }}"/>
                </div>

                <div class="desc">
                    <p>
                        <strong>Model: </strong> {{ $item->model }}
                    </p>
                    <p>
                        <strong>{{ trans('repositories.origin') }}: </strong> {{ $item->origin }}
                    </p>
                    <p>
                        <strong>{{ trans('repositories.guarantee') }}: </strong> {{ config("developer.guarantee.{$item->guarantee}") }}
                    </p>
                </div>

                <div class="price">
                    Giá: {{ number_format($item->price) }}
                </div>

                <div class="like-share">
                    <div class="fb-like" data-href="{{ Request::url() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                </div>
            </div>
        </div>

        <div class="product-tabs">
            <ul class="tabs">
                <li class="active">
                    <a href="#">{{ trans('repositories.details') }}</a>
                    <span class="right"></span>
                </li>
            </ul>
            <div class="content">
            {!! $item->description !!}
            </div>
        </div>

        <div class="product-tabs">
            <ul class="tabs">
                <li class="active">
                    <a href="{{ route('category.show', $category->slug) }}">{{ trans('repositories.product_same') }}</a>
                    <span class="right"></span>
                </li>
            </ul>
            <div class="content">
                <div class="slider">
                    <ul>
                    	@foreach ($randomProducts as $same)
                        <li>
                            <a href="{{ route('product.show', $same->slug) }}" title="{{ $same->name }}">
                                <img src="{{ ( $same->image ) ? route('image',$same->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $same->name }}"/>
                            </a>
                            <p style="color:#e06b6b;">Model {{ str_limit($same->model, 20) }}</p>
                            <p>{{ str_limit($same->name, 20) }}</p>
                            <a class="btn-detail" href="{{ route('product.show', $same->slug) }}" title="Xem chi tiết">{{ trans('repositories.view_detail') }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="change">
                    <a href="javascript:;" class="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="javascript:;" class="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('prescripts')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

{{ HTML::script('vendor/magnific-popup/jquery.magnific-popup.min.js') }}
<script type="text/javascript">
    $('#product .product-tabs .content .change .prev').click(function() {
        var marginLeft = $('#product .product-tabs .content .slider ul').css('margin-left');
        marginLeft = marginLeft.replace('px', '');
        marginLeft = parseInt(marginLeft) + 190;
        if (marginLeft <= 0) {
            $('#product .product-tabs .content .slider ul').animate({'margin-left': marginLeft});
        }
    });

    $('#product .product-tabs .content .change .next').click(function() {
        var items = $('#product .product-tabs .content .slider ul li').length;
        var maxWidth = parseInt(items) * 190 - (190 * 3);
        var marginLeft = $('#product .product-tabs .content .slider ul').css('margin-left');
        marginLeft = marginLeft.replace('px', '');
        marginLeft = parseInt(marginLeft - 190);
        if ((maxWidth + marginLeft) != 0) {
            $('#product .product-tabs .content .slider ul').animate({'margin-left': marginLeft});
        }
    });
    $('a.image-thumb').on('click', function(e) {
        e.preventDefault();
        var imageDefault = $(this).data('default');
        var imageMedium = $(this).data('medium');
        $('.product-bigimage').find('a').attr('href', imageDefault);
        $('.product-bigimage').find('img').attr('src', imageMedium);

    });
    $(function () {
        $('.popup-link').magnificPopup({type:'image'});
    })
</script>
@endpush