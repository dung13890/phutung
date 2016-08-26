@extends('layouts.backend')

@section('title',isset($heading) ? $heading : 'Index')

@push('prestyles')
{{ HTML::style('vendor/datatables-bs/css/dataTables.bootstrap.min.css') }}
@endpush

@push('prescripts')
{{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
<script>
    var flash_message = '{!!session("flash_message")!!}';
    $(function(){
        renderTable(datatableRoute, datatableColumns, datatableOptions, function () {
            $('.handle-delete').click(function (e) {
                e.preventDefault();
                alertDestroy($(this).attr('href'));
            });
        });
    });
</script>
@endpush

@section('page-content')
<section class="content-header">
    <h1>{{ $heading or 'Index' }} </h1>
    <ol class="breadcrumb">
        <li><a href="/backend"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{ $heading or 'Index' }}</li>
    </ol>
</section>
<div class="content animated fadeInUp">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="pull-left">
                        @stack('box-header-left')
                    </div>
                    @if (Route::has("backend.{$resource}.create"))
                    @can ("{$resource}-write")
                    <div class="pull-right">
                        <a href="{{route("backend.{$resource}.create")}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    @endcan
                    @endif
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table-index" class="table table-bordered table-hover" width="100%">
                            @stack('index-table-thead')
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection