@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/search.css") }}
<style>
	#header {
		background: url("{!! asset('assets/img/backend/banner-004.jpg') !!} ") no-repeat; background-size: 100% 100%;
	}
	.main { 
		min-height: 350px;
	}
	#header .links .submenu {
		z-index: 1000;
	}

    #header .slogan {
        background-color: #fff;
    }
    #header .slogan span {
        color: #078fdd;
    }
</style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">Tìm kiếm</h1>
    </div>
    <div class="slogan pull-right">
        <span>Từ khóa " {{ $value }} "</span>
    </div>
</div><!-- /#header -->

<div id="search">
    <div class="row">
        <div class="col-lg-12">
            <div class="form">
                <h3 class="title">
                    Tìm được {{ $products->total() }} thiết bị và phụ tùng
                </h3>

                @if ($products)
                <?php
                    $groupProduct = $products->groupBy('type');
                ?>
                @if (isset($groupProduct['product']))
                <h4 class="text-uppercase"> Thiết bị</h3>
                <div class="item">
                    <ul class="list list-inline">
                        @foreach ($groupProduct['product'] as $product)
                        <li>
                            <a href="{{ route('product.show', $product->slug) }}"><img src="{{ ( $product->image ) ? route('image',$product->image_small) :  asset('assets/img/backend/no_image.jpg') }}"/></a>
                            <p>Bảo hành: {{ config("developer.guarantee.{$product->guarantee}") }}</p>
                            <div class="name"><a title="{{ $product->name }}" href="{{ route('product.show', $product->slug) }}"> {{ str_limit($product->name, 15) }}</a></div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <br>
                <br>
                @if (isset($groupProduct['accessary']))
                <h4 class="text-uppercase"> Phụ kiện</h3>
                <div class="item">
                    <ul class="list list-inline">
                        @foreach ($groupProduct['accessary'] as $accessary)
                        <li>
                            <a href="{{ route('product.show', $accessary->slug) }}"><img src="{{ ( $accessary->image ) ? route('image', $accessary->image_small) :  asset('assets/img/backend/no_image.jpg') }}"/></a>
                            <p>Mã: {{ $accessary->code }}</p>
                            <div class="name">
                                <a title="{{ $accessary->name }}" href="{{ route('product.show', $accessary->slug) }}"> {{ str_limit($accessary->name, 15) }}</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <nav>{!! $products->appends('search', $value)->links() !!}</nav>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
