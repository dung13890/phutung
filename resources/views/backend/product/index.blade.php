@extends('layouts.crud.index')

@push('prescripts')
<script>
	var datatableRoute = '{!! isset($category->id) ? route('backend.product.data.category', $category->id) : route('backend.product.data.type', $type) !!}';
	var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'image', name: 'image'},
        { data: 'name', name: 'name'},
        { data: 'price', name: 'price'},
        { data: 'locale', name: 'locale'},
        { data: 'locked', orderable: true, name: 'locked'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
    	createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
            if (data.actions.show) {
                $('td',row).eq(1).html('<img width="30" class="img-thumbnail" src="'+laroute.route('image', {path:data.image_thumbnail})+'"/>');
            }
            $('td', row).eq(3).html( localeString(data.price));
            $('td', row).eq(5).html( data.locked == 0 ? '<span class="label label-primary">Actived</span>' : '<span class="label label-danger">Locked</span>');
            var actions = data.actions;
            if (!actions || actions.length < 1) { return; }
            var actionHtml = $('td', row).eq(6);
            actionHtml.html('');
            if (actions.edit) { 
            	actionHtml.append('<a title ="'+actions.edit.label+'" class="btn btn-default btn-xs" href="'+actions.edit.uri+'"><i class="fa fa-pencil"></i></a>');
            }
            if (actions.delete) { 
            	actionHtml.append('<a title ="'+actions.delete.label+'" class="btn btn-danger btn-xs handle-delete" href="'+actions.delete.uri+'"><i class="fa fa-times"></i></a>');
            }
        },initComplete: function () {
            var table = this.api();                
            $('.input-search').on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column(4).search(val ? val : '', true, false).draw();
            });
        }
    };
</script>
@endpush

@push('box-header-left')
<div class="btn-group">
    <span class="btn btn-default btn-sm">{!!$category->name or 'Tất cả' !!}</span>
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" >
        <i class="caret"></i>
    </button>
    <ul class="dropdown-menu pull-left">
        <li><a href="{!!route('backend.product.type', $type)!!}">Tất cả</a></li>
        @foreach ($rootCategories as $rootCategory)
        <li><a href="{{ route('backend.product.category', $rootCategory->id) }}">{{ $rootCategory->name }}</a></li>
        @endforeach
    </ul>
    <div class="btn-group" style="margin-left: 5px;">
        {!! Form::select('locale', $listLocale , null, ['class' => 'input-search form-control input-sm']) !!}
    </div>
</div>
@endpush

@push('box-header-right')
    @can ('product-write')
    <div class="pull-right">
        <a href="{{ route('backend.product.create.type', $type) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tạo mới</a>
    </div>
    @endcan
@endpush

@push('index-table-thead')
<thead>
    <tr>
        <th style="display:none">ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>languare</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
</thead>
@endpush