@extends('layouts.crud.index')

@push('prescripts')
<script>
	var datatableRoute = '{!! route('backend.slide.data') !!}';
	var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'image', name: 'image'},
        { data: 'name', name: 'name'},
        { data: 'locked', orderable: true, name: 'locked'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
    	createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
            $('td',row).eq(1).html('<img width="30" class="img-thumbnail" src="'+laroute.route('image', {path:data.image_thumbnail})+'"/>');
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

@push('index-table-thead')
<thead>
    <tr>
        <th style="display:none">ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
</thead>
@endpush