@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Menu')

@push('prestyles')
{{ HTML::style('vendor/jqtree/css/jqtree.css') }}
@endpush

@push('prescripts')
    {{ HTML::script('vendor/jqtree/js/tree.jquery.js') }}
<script>
    var flash_message = '{!!session("flash_message")!!}';
</script>
@endpush

@section('page-content')
<section class="content-header">
    <h1>{{ $heading or 'Menu' }}</h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{ $heading or 'Menu' }}</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary animated fadeInUp">
                <div class="box-header">
                    <h3 class="box-title">{{ $action or 'Create' }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                @stack('menu.left')
            </div>
        </div>
        <div class="col-md-6">
            @stack('menu.right')
        </div>
    </div>
</div>
@endsection
