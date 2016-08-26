@extends('layouts.crud.index')
@push('prescripts')
<script>
	var datatableRoute = null;
	var datatableColumns = [];
    var datatableOptions = {};
</script>
@endpush

@push('index-table-thead')
<thead>
	<tr>
	    <th style="display:none">ID</th>
	    <th>Name</th>
	    <th width="80%">Abilities</th>
	    <th>Actions</th>
	</tr>
</thead>
<tbody>
	@foreach($roles as $role)
	<tr>
        <td>{{ $role->name }}</td>
        <td>
        {!!
        	$role->abilities->lists('name')->map(function ($item) {
        		$parts = explode('-', $item);
        		return '<span class="label label-default">' . $parts[1] . '-' . trans('repositories.'. $parts[0]) . '</span>';
        	})->implode(' ')

        !!}
        </td>
        <td>
            @can('role-write')
            <a href="{{ route('backend.role.edit', $role) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
            <a href="{{route('backend.role.destroy', $role)}}" class="btn btn-xs btn-danger handle-delete"><i class="fa fa-times"></i></a>
            @endcan
        </td>
    </tr>
	@endforeach
</tbody>
@endpush