produ@extends('layouts.menu.index')

@push('menu.left')
<div class="box-body">
@can('category-write')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($item))
    {{ Form::model($item, ['method' => 'PATCH','url' => route('backend.category.update', $item->id), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off']) }}
        @include('backend.category._form')
    {{ Form::close() }}
    @else
    {{ Form::open(['url' => route('backend.category.store'), 'files' => true, 'autocomplete'=>'off']) }}
        {{ Form::hidden('type',$type) }}
        @include('backend.category._form')
    {{ Form::close() }}
    @endif
@endcan
</div>
@endpush

@push('menu.right')
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#list" data-toggle="tab" >Lists</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active block-style" id="list"></div>
    </div>
</div>
@endpush

@push('prescripts')
<script>
    var categories = {!! $items->toJson()!!};
    var category = {!! $item or 0 !!};
    var treeOptions = {
        onCreateLi: function(node, $li) {
            if (category != 0 && category.id == node.id) {
                return false;
            }
            $li.find('.jqtree-element')
            .append('<div class="btn-group pull-right tools">\
                <a href="'+laroute.route('backend.category.edit', {category: node.id})+'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a> \
                <a href="'+laroute.route('backend.category.destroy', {category: node.id})+'" class="btn btn-xs btn-danger handle-delete"><i class="fa fa fa-trash-o"></i></a>\
            </div>');
        }
    };
    $(function () {
        treeInit(categories, treeOptions);
        $('.handle-delete').on('click', function (e) {
            e.preventDefault();
            alertDestroy($(this).attr('href'));
        });
    });
</script>
@endpush
