@extends('layouts.crud.show')

@push('show.left')
<div class="box-body box-profile no-padding">
    <ul class="nav nav-stacked nav-pills">
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{ $item->topic }}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{ $item->name }}</a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{ $item->address }}</a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{ $item->phone }}</a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{ $item->fax }}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-envelope-o text-light-blue"></i> {{ $item->email }}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-clock-o text-light-blue"></i> {{$item->created_at}}</a>
        </li>
    </ul>
</div>
@endpush

@push('show.right')
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
      	<li class="active"><a href="#actions" data-toggle="tab">Nội dung </a></li>
    </ul>
    <div class="tab-content">
    	<div class="tab-pane active" id="actions">
            <div class="row">
                <div class="col-md-12">
                    {{ $item->content }}
                </div>
            </div>
    	</div>
    </div>
</div>
@endpush