@extends('layouts.frontend')

@push('prestyles')
    {{ HTML::style("template/css/product.css") }}
    {{ HTML::style('template/css/responsive/product.css') }}
    {{ HTML::style("vendor/magnific-popup/magnific-popup.css") }}

    {{ HTML::style('vendor/bxslider/jquery.bxslider.css') }}
    <style>
    	#header {
    		background-image: url("{!! ( $banner ) ? route('image',$banner->image_banner) :  asset('assets/img/backend/no_image.jpg') !!} ");
            background-repeat: no-repeat;
            background-size: 100% 100%;
    	}
        #header .slogan {
            background: #ffe100;
            color: #231f20;
        }

        .product-detail {
            height: 420px;
        }

        .product-images {
            height: 412px;
            overflow-y: hidden;
        }

        .bx-wrapper .bx-prev {
            opacity: 0.8;
            background: url("{{ URL::to('vendor/bxslider/images/controls.png') }}") no-repeat 1px -21px;
        }

        .bx-wrapper .bx-prev:hover {
            background: url("{{ URL::to('vendor/bxslider/images/controls.png') }}") no-repeat 1px -21px;
        }

        .bx-wrapper .bx-next {
            opacity: 0.8;
            background: url("{{ URL::to('vendor/bxslider/images/controls.png') }}") no-repeat 1px -64px;
        }

        .bx-wrapper .bx-next:hover {
            background: url("{{ URL::to('vendor/bxslider/images/controls.png') }}") no-repeat 1px -64px;
        }
    </style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ $category->name }}</h1>
    </div>
    @include('frontend._partials.sidebar', ['categoryFirst' => $category , 'categories' => $categories])
</div><!-- /#header -->

<ol class="breadcrumb">
    <li>
        <a href="/" title="Trang chủ">{{ trans('repositories.home') }}</a>
    </li>
    <li>
        <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
    </li>
    <li class="active">{{ $item->name }}</li>
</ol>

<div id="product">
    <div class="main">
    	<div class="visible-md-block visible-sm-block visible-lg-block">
            <a href="/" title="Trang chủ">{{ trans('repositories.home') }}</a> >>
            <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a> >>
            <span style="text-transform: capitalize">{{ $item->name }}</span>
        </div>
        <h3 class="product-title">
            <span class="text-uppercase visible-lg-block visible-md-block visible-sm-block">
                {{ str_limit($item->name, 40) }}
            </span>
            <span class="text-uppercase visible-xs-block">
                {{ str_limit($item->name, 20) }}
            </span>
        </h3>
        <div class="product-detail">
            @if ($item->type == 'product')
            <div class="product-images">
                <ul class="list-unstyled">
                    <li>
                        <a class="image-thumb" href="javascript:;"
                            data-default="{{ ( $item->image ) ? route('image',$item->image_default) :  asset('assets/img/backend/no_image.jpg') }}"
                            data-medium="{{ ( $item->image ) ? route('image',$item->image_product) :  asset('assets/img/backend/no_image.jpg') }}"><img src="{{ ( $item->image ) ? route('image',$item->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/></a>
                    </li>
            	    @if(count($item->images))
            			@foreach($item->images as $image)
                			<li>
                                <a class="image-thumb" href="javascript:;"
                                    data-default="{{ ( $image->image ) ? route('image', $image->image_default) :  asset('assets/img/backend/no_image.jpg') }}"
                                    data-medium="{{ ( $image->image ) ? route('image', $image->image_product) :  asset('assets/img/backend/no_image.jpg') }}"><img src="{{ ( $image->image ) ? route('image',$image->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $image->name }}" class="img-responsive"/></a>
                            </li>
                        @endforeach
            	    @endif
                </ul>
            </div>
        	<div class="product-bigimage">
                <a class="popup-link" href="{{ ( $item->image ) ? route('image', $item->image_default) :  asset('assets/img/backend/no_image.jpg') }}" title="{{ $item->name }}">
                    <img src="{{ ( $item->image ) ? route('image',$item->image_product) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/>
                </a>
            </div>
            @else
            <!-- Accessary -->
            <div class="product-images" style="width: 22%; height: 433px;" id="accessary-images">
                <ul class="list-unstyled">
                    <li>
                        <a class="image-thumb" href="javascript:;"
                            data-default="{{ ( $item->image ) ? route('image', $item->image_default) :  asset('assets/img/backend/no_image.jpg') }}"
                            data-medium="{{ ( $item->image ) ? route('image', $item->image_medium) :  asset('assets/img/backend/no_image.jpg') }}"><img src="{{ ( $item->image ) ? route('image',$item->image_thumbnail_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/></a>
                    </li>
                    @if (count($item->images))
                    @foreach ($item->images as $image)
                    <li>
                        <a class="image-thumb" href="javascript:;"
                            data-default="{{ ( $image->image ) ? route('image', $image->image_default) :  asset('assets/img/backend/no_image.jpg') }}"
                            data-medium="{{ ( $image->image ) ? route('image', $image->image_medium) :  asset('assets/img/backend/no_image.jpg') }}"><img src="{{ ( $image->image ) ? route('image',$image->image_thumbnail_small) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $image->name }}" class="img-responsive"/></a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="product-bigimage" style="width: 77%">
                <a class="popup-link" href="{{ ( $item->image ) ? route('image', $item->image_default) :  asset('assets/img/backend/no_image.jpg') }}" title="{{ $item->name }}">
                    <img src="{{ ( $item->image ) ? route('image',$item->image_medium) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $item->name }}" class="img-responsive"/>
                </a>
                <div class="like-share-accessary">
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
            @endif

            <?php $images = $item->images->take(3); ?>
            @if(!$images->isEmpty())
                <div id="mobileProductImages" class="carousel slide visible-xs-block" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($images as $i => $image)
                            <div class="item{{ ($i == 0) ? ' active' : ''}}">
                                {{ HTML::image(route('image', $image->image_medium), $image->name, ['class' => 'img-responsive']) }}
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#mobileProductImages" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#mobileProductImages" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            @endif

            @if ($item->type == 'product')
            <div class="product-info">
                <h3 class="code"><span class="text-uppercase">{{ $item->code }}</span></h3>

                <div class="provider text-center">
                    <p class="text-center">{{ trans('repositories.provider') }}</p>
                    {{ isset($item->provider) ? $item->provider->name : trans('repositories.provider') }}
                    <img src="{{ (isset($item->provider) && $item->provider->image) ? route('image', $item->provider->image_default) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ isset($item->provider) ? $item->provider->name : trans('repositories.provider') }}"/>
                </div>

                <div class="desc">
                    <p>
                        <strong>Model</strong><b>:</b> {{ $item->model }}
                    </p>
                    <p>
                        <strong>{{ trans('repositories.origin') }}</strong><b>:</b> {{ $item->origin }}
                    </p>
                    <p>
                        <strong>{{ trans('repositories.guarantee') }}</strong><b>:</b> {{ config("developer.guarantee.{$item->guarantee}") }}
                    </p>
                    <p>
                        <strong>{{ trans('repositories.qty') }}</strong><b>:</b> {{ $item->qty }}
                    </p>
                </div>
                <div class="price">
                    Giá: {{ $item->price_show ? number_format($item->price) . ' ' .$item->unit : trans('repositories.contact') }}
                </div>

                <div class="like-share">
                   <table>
                       <tr>
                           <td><div class="fb-like" data-href="{{ Request::url() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></td>
                           <td style="padding-top: 9px;">
                               <div class="g-plusone" data-annotation="none" data-height="14" data-href="{{ Request::url() }}"></div>
                           </td>
                       </tr>
                   </table>
                </div>
            </div>
            @endif
        </div>

        <div class="product-tabs">
            <ul class="tabs">
                <li class="active">
                    <a href="#details" data-toggle="tab">{{ trans('repositories.details') }}</a>
                    <span class="right"></span>
                </li>
                @if ($item->youtube)
                <li>
                    <span class="left"></span>
                    <a href="#video" data-toggle="tab">Video</a>
                    <span class="right"></span>
                </li>
                @endif
                @if ($item->guide)
                <li>
                    <span class="left"></span>
                    <a href="#guide" data-toggle="tab">{{ trans('repositories.guide') }}</a>
                    <span class="right"></span>
                </li>
                @endif
                @if (count($item->properties))
                <li>
                    <span class="left"></span>
                    <a href="#properties" data-toggle="tab">{{ trans('repositories.property') }}</a>
                    <span class="right"></span>
                </li>
                @endif
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    <div class="content">
                    {!! $item->description !!}
                    </div>
                </div>
                <div class="tab-pane" id="video">
                    <div class="content">
                        @if ($item->youtube)
                        <iframe width="100%" height="315" src="http://www.youtube.com/embed/{{$item->youtube}}?rel=0&controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="guide">
                    <div class="content">
                    {!! $item->guide !!}
                    <br>
                    @if ($item->file)
                    <a target="_blank" href="{{ route('file', $item->file) }}">Tài liệu tham khảo</a>
                    @endif
                    </div>
                </div>
                @if (count($item->properties))
                <div class="tab-pane" id="properties">
                    <div class="content">
                        @foreach ($item->properties->groupBy('key') as $key => $value)
                        <p><strong>{{ $key }}:</strong>  {{ $value->implode('name', ', ') }}</p>
                        @endforeach
                    </div>
                </div>
                @endif
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
                                    <img src="{{ ( $same->image ) ? route('image', $same->image_thumbnail) :  asset('assets/img/backend/no_image.jpg') }}" alt="{{ $same->name }}"/>
                                </a>
                                <p style="color:#e06b6b;">Model {{ str_limit($same->model, 20) }}</p>
                                <p title="{{ $same->name }}" >{{ str_limit($same->name, 12) }}</p>
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

                <div id="mobileProductList" class="carousel slide visible-xs-block" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($randomProducts as $i => $same)
                            <li data-target="#mobileProductList" data-slide-to="{{ $i }}" class="{{ ($i == 0) ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($randomProducts as $i => $same)
                            <div class="item{{ ($i == 0) ? ' active' : ''}}">
                                <a href="{{ route('product.show', $same->slug) }}" title="{{ $same->name }}">
                                    {{ HTML::image(( $same->image ) ? route('image', $same->image_thumbnail) :  asset('assets/img/backend/no_image.jpg'), 'product-same') }}
                                </a>
                                <p style="color:#e06b6b;">Model {{ str_limit($same->model, 20) }}</p>
                                <p>{{ str_limit($same->name, 20) }}</p>
                                <a class="btn-detail" href="{{ route('product.show', $same->slug) }}" title="{{ $same->name }}">Xem chi tiết</a>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#mobileProductList" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#mobileProductList" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

{{ HTML::script('vendor/bxslider/jquery.bxslider.min.js') }}

<script type="text/javascript">
    $('.product-images > ul').bxSlider({
        mode: 'vertical',
        minSlides: 4,
        slideMargin: 0,
    });

    $('.bx-wrapper .bx-prev').css({top: '23px', left: '33%'});
    $('.bx-wrapper .bx-next').css({top: 'auto', left: '33%', bottom: '10px'});
    $('#accessary-images .bx-wrapper .bx-next').css({bottom: '134px'});
</script>

@endpush
