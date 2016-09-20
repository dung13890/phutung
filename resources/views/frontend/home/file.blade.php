@extends('layouts.frontend')

@push('prestyles')
{{ HTML::style("template/css/contact.css") }}
{{ HTML::style('template/css/responsive/contact.css') }}

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
        <h1 class="page-title">{{ trans('repositories.docs') }}</h1>
    </div>
    <div class="slogan pull-right">
        <span>{{ trans('repositories.tanphat_support') }}</span>
    </div>
</div><!-- /#header -->

<div id="contact">
    <div class="row">
        <div class="col-lg-12">
            <div class="form">
                <h3 class="title">
                    <span class="text-uppercase">Tân phát</span>
                    <span class="text-uppercase">{{ trans('repositories.docs') }}</span>
                </h3>
                <div class="list-news col-lg-offset-3">
                    @foreach ($items as $item)
                    <div class="news">
                        <div class="info">
                            <a href="{{ route('file', $item->file) }}" title="Xem chi tiết">{{ $item->name }}</a>
                            <div class="detail">
                                <p>{{ $item->description }}</p>
                                <span class="pull-right">{{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <nav class="text-center">{!! $items->render() !!}</nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

