@extends('layouts.crud.index')

@push('prescripts')
<script>
	var datatableRoute = '{!! route('backend.file.data') !!}';
	var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'name', name: 'name'},
        { data: 'file', name: 'file'},
        { data: 'locked', orderable: true, name: 'locked'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
    	createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
            $('td',row).eq(2).html('<a target="_blank" href="'+laroute.route('file', {path:data.file})+'">'+data.name+'</a>');
            $('td', row).eq(3).html( data.locked == 0 ? '<span class="label label-primary">Actived</span>' : '<span class="label label-danger">Locked</span>');
            var actions = data.actions;
            if (!actions || actions.length < 1) { return; }
            var actionHtml = $('td', row).eq(4);
            actionHtml.html('');
            if (actions.edit) { 
            	actionHtml.append('<a title ="'+actions.edit.label+'" class="btn btn-default btn-xs" href="'+actions.edit.uri+'"><i class="fa fa-pencil"></i></a>');
            }
            if (actions.delete) { 
            	actionHtml.append('<a title ="'+actions.delete.label+'" class="btn btn-danger btn-xs handle-delete" href="'+actions.delete.uri+'"><i class="fa fa-times"></i></a>');
            }
        }
    };
</script>
@endpush

@push('box-header-right')
    <div class="pull-right">
        <a href="{{route('backend.file.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
    </div>
@endpush

@push('index-table-thead')
<thead>
    <tr>
        <th style="display:none">ID</th>
        <th>Tên</th>
        <th>File</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
</thead>
@endpush