@extends('layouts.crud.index')

@push('prescripts')
<script>
	var datatableRoute = '{!! route('backend.contact.data') !!}';
	var datatableColumns = [
        { data: 'id', name: 'id', searchable: false },
        { data: 'topic', name: 'topic'},
        { data: 'name', name: 'name'},
        { data: 'phone', name: 'phone'},
        { data: 'email', name: 'email'},
        { data: 'created_at', name: 'created_at'},
        { data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
    ];
    var datatableOptions = {
    	createdRow: function ( row, data, index ) {
            $('td', row).eq(0).css('display','none');
            $('td', row).eq(1).html('<a title="'+ data.address +'" href="'+laroute.route('backend.conact.show', {contact:data.id})+'">'+data.name+'</a>');
            var actions = data.actions;
            if (!actions || actions.length < 1) { return; }
            var actionHtml = $('td', row).eq(6);
            actionHtml.html('');
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
        <th>Chủ đề</th>
        <th>Tên</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Ngày tạo</th>
        <th>Thao tác</th>
    </tr>
</thead>
@endpush