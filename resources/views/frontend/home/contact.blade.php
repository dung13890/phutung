@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/contact.css") }}
{{ HTML::style('template/css/responsive/contact.css') }}
{{ HTML::style('vendor/toastr/toastr.min.css') }}

<style>
	#header {
		background-image: url("{!! asset('assets/img/backend/banner-004.jpg') !!} ");
        background-repeat: no-repeat;
        background-size: 100% 100%;
	}
</style>
@endpush

@section('page-content')
<div id="header">
    <div class="title text-center">
        <h1 class="page-title">{{ trans('repositories.info_contact') }}</h1>
    </div>
    <div class="slogan pull-right">
        <span>Tân phát {{ trans('repositories.tanphat_support') }}</span>
    </div>
</div><!-- /#header -->

<div id="contact">
    <div class="row">
        <div class="col-lg-6">
            <div class="form">
                <h3 class="title">
                    <span class="text-uppercase">Tân phát</span>
                    <span class="text-uppercase">{{ trans('repositories.tanphat_support') }}</span>
                </h3>
                {{ Form::open(['url' => route('home.post.contact'), 'class' => 'form-horizontal']) }}
                    @if (count($errors) > 0)
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div id="validator" class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="topic" class="col-lg-3">
                            {{ trans('repositories.topic') }}:
                        </label>
                        <div class="col-lg-9">
                            {{ Form::text('topic', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-lg-3">
                            {{ trans('repositories.full_name') }}:
                        </label>
                        <div class="col-lg-9">
                            {{ Form::text('name', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-lg-3">
                            {{ trans('repositories.address') }}:
                        </label>
                        <div class="col-lg-9">
                            {{ Form::text('address', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-lg-3">
                            {{ trans('repositories.phone') }}
                        </label>
                        <div class="col-lg-9">
                            {{ Form::text('phone', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fax" class="col-lg-3">Fax:</label>
                        <div class="col-lg-9">
                            {{ Form::text('fax', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-3">Email:</label>
                        <div class="col-lg-9">
                            {{ Form::email('email', null, ['class' => 'form-control input-sm']) }}
                        </div>
                    </div>
                    <div class="form-group" id="contact-textarea">
                        <label for="content" class="col-lg-12">
                            {{ trans('repositories.content') }}:
                        </label>
                        <div class="col-lg-12">
                            {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => 4]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="text-right">
                                <button class="btn btn-primary">
                                    {{ trans('repositories.send') }}
                                </button>
                                <a href="#" class="btn btn-default">
                                    {{ trans('repositories.cancel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="col-lg-4 col-lg-offset-2">
            <div class="sidebar">
                <h3 class="heading">
                    {{ trans('repositories.info_contact') }}
                    <span>
                        <img src="/assets/img/icon-address.png" style="width:26px;height:37px;"/>
                    </span>
                </h3>
                <div class="text-center">
                    <strong>{{ trans('repositories.about_us') }}</strong>
                </div>

                @foreach ($positions as $position)
                <div class="branch">
                    <div class="title text-center">
                        <strong>{{ $position->name }}</strong>
                    </div>
                    <p class="address">{{ $position->address }}</p>
                    <p class="phone">ĐT: {{ $position->phone }}</p>
                    <p class="email">
                        Email:
                        <a href="mailto:{{ $position->email }}">
                            <u>{{ $position->email }}</u>
                        </a>
                    </p>
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
    var isValidator = {!! count($errors) !!};
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
            console.log(isValidator);
        if (isValidator) {
            $(this).scrollTop(600);
        }
    });
</script>
@endpush
