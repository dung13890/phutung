@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Create')

@section('page-content')
<section class="content-header">
    <h1>{{ $heading or 'Create' }}</h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        @if (Route::has("backend.{$resource}.index"))
        <li><a href="{{route("backend.{$resource}.index")}}">{{$resource}}</a></li>
        @endif
        <li class="active">{{ $heading or 'Create' }}</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        {{ Form::open(['url' => route("backend.{$resource}.store"), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off']) }}
            @include("backend.{$resource}._form")
        {{ Form::close() }}
    </div>
</div>
@endsection
