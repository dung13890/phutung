@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Edit')

@section('page-content')
<section class="content-header">
    <h1>{{ $heading or 'Edit' }}</h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        @if (Route::has("backend.{$resource}.index"))
        <li><a href="{{route("backend.{$resource}.index")}}">{{$resource}}</a></li>
        @endif
        <li class="active">{{ $heading or 'Edit' }}</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        {{ Form::model($item, ['url' => route("backend.{$resource}.update", $item), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off', 'method' => 'PATCH']) }}
            @include("backend.{$resource}._form")
        {{ Form::close() }}
    </div>
</div>
@endsection
