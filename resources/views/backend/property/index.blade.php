@extends('layouts.menu.index')

@push('menu.left')
<div class="box-body">
@can('property-write')
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
    {{ Form::model($item, ['method' => 'PATCH','url' => route('backend.property.update', $item->id), 'role'  => 'form', 'autocomplete'=>'off']) }}
        @include('backend.property._form')
    {{ Form::close() }}
    @else
    {{ Form::open(['url' => route('backend.property.store'), 'autocomplete'=>'off']) }}
        @include('backend.property._form')
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
    var properties = {!! $items !!};
    var property = {!! $item or 0 !!};
    var treeOptions = {
        onCreateLi: function(node, $li) {
            if (typeof node.id === 'undefined' || !node.id) {
                return false;
            }
            if (property != 0 && property.id == node.id) {
                return false;
            }
            $li.find('.jqtree-element')
            .append('<div class="btn-group pull-right tools">\
                <a href="'+laroute.route('backend.property.edit', {property: node.id})+'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a> \
                <a href="'+laroute.route('backend.property.destroy', {property: node.id})+'" class="btn btn-xs btn-danger handle-delete"><i class="fa fa fa-trash-o"></i></a>\
            </div>');
        }
    }
    $(function () {
        treeInit(properties, treeOptions);

        $('select[name="group"]').change(function () {
            if ($(this).val() != 0) {
                $('#name-group').addClass('hide');
                $('input[name="key"]').val($(this).val());
            } else {
                $('#name-group').removeClass('hide');
            }
        });

       $('.handle-delete').on('click', function (e) {
            e.preventDefault();
            alertDestroy($(this).attr('href'));
       });
    });
</script>
@endpush