@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/contact.css") }}
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

<div id="contact">
    <div class="row">
        <div class="col-lg-12">
            <div class="form">
                <h3 class="title">
                    Tìm đưọc {{ count($products['product']) }} thiết bị và {{ count($products['accessary']) }} phụ tùng
                </h3>
                
            </div>
        </div>
    </div>
</div>

@endsection
