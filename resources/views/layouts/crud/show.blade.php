@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Show')

@section('page-content')
<section class="content-header">
    <h1>{{ $heading or 'Show' }}</h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        @if (Route::has("backend.{$resource}.index"))
        <li><a href="{{route("backend.{$resource}.index")}}">{{$resource}}</a></li>
        @endif
        <li class="active">{{ $heading or 'Show' }}</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary animated fadeInUp">
                <div class="box-header">
                    <h3 class="box-title">Info</h3>
                    <div class="box-tools pull-right">
                        @if (Route::has("backend.{$resource}.edit",$item))
                        <a href="{{ route("backend.{$resource}.edit",$item) }}" class="btn btn-box-tool"><i class="fa fa-cogs"></i></a>
                        @endif
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                @stack('show.left')
            </div>
        </div>
        <div class="col-md-8">
            @stack('show.right')
        </div>
    </div>
</div>
@endsection
