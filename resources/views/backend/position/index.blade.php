@extends('layouts.crud.index')

@push('prescripts')
<script>
	var datatableRoute = '{!! route('backend.position.data') !!}';
	var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'name', name: 'name'},
        { data: 'address', name: 'address'},
        { data: 'phone', name: 'phone'},
        { data: 'email', name: 'email'},
        { data: 'locked', orderable: true, name: 'locked'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
    	createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
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
        }
    };
</script>
@endpush


@push('index-table-thead')
<thead>
    <tr>
        <th style="display:none">ID</th>
        <th>Tên chi nhánh</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>
</thead>
@endpush