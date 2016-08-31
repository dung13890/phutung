@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/contact.css") }}
{{ HTML::style('vendor/toastr/toastr.min.css') }}
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
        <h1 class="page-title">Thông tin liên hệ</h1>
    </div>
    <div class="slogan pull-right">
        <span >Tân phát hân hạng được hỗ trợ quý khách</span>
    </div>
</div><!-- /#header -->

<div id="contact">
    <div class="row">
        <div class="col-lg-8">
            <div class="form">
                <h3 class="title">
                    Tân phát vui lòng được hỗ trợ quý khách
                </h3>
                {{ Form::open(['url' => route('home.post.contact'), 'autocomplete'=>'off', 'class' => 'form-horizontal']) }}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Lỗi!</strong> Làm ơn xem lại các trường đã nhập.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="" class="col-lg-2">Chủ đề:</label>
                        <div class="col-lg-10">
                            {{ Form::text('topic', null, ['class' => 'form-control input-sm', 'placeholder' => 'Chủ đề']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2">Họ và tên:</label>
                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control input-sm', 'placeholder' => 'Họ và tên']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2">Địa chỉ:</label>
                        <div class="col-lg-10">
                            {{ Form::text('address', null, ['class' => 'form-control input-sm', 'placeholder' => 'Địa chỉ']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2">Điện thoại:</label>
                        <div class="col-lg-10">
                            {{ Form::text('phone', null, ['class' => 'form-control input-sm', 'placeholder' => 'Điện thoại']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2">Fax:</label>
                        <div class="col-lg-10">
                            {{ Form::text('fax', null, ['class' => 'form-control input-sm', 'placeholder' => 'Fax']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2">Email:</label>
                        <div class="col-lg-10">
                            {{ Form::text('email', null, ['class' => 'form-control input-sm', 'placeholder' => 'email@domain.com']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-12">Nội dung:</label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Nội dung...', 'rows' => 4]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="text-right">
                                <button class="btn btn-primary">Gửi</button>
                                <a href="#" class="btn btn-default">Hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar">
                <h3 class="heading">
                    Thông tin liên lạc
                    <span><img src="/assets/img/icon-address.png" style="width:26px;height:37px;"/></span>
                </h3>
                <div class="text-center">
                    <strong>LIÊN HỆ VƠÍ CHÚNG TÔI </strong>
                </div>

                @foreach ($positions as $position)
                <div class="branch">
                    <div class="title text-center">
                        <strong>{{ $position->name }}</strong>
                    </div>
                    <p class="address">{{ $position->address }}</p>
                    <p class="phone">ĐT: {{ $position->phone }}</p>
                    <p class="email">Email: <a href="mailto:{{ $position->email }}">{{ $position->email }}</a></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('prescripts')
{{ HTML::script('vendor/toastr/toastr.min.js') }}
<script>
    var flash_message_frontend = '{!!session("flash_message_frontend")!!}';
    $(function () {
        if (typeof flash_message_frontend !== 'undefined' && flash_message_frontend) {
            var e = JSON.parse(flash_message_frontend);
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "600",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            e.code == 0 ? toastr.success(e.message) : toastr.error(e.message);
        }
    });
</script>
@endpush