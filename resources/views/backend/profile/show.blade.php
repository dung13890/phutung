@extends('layouts.crud.show')

@push('prestyles')
{{ HTML::style("vendor/datatables-bs/css/dataTables.bootstrap.min.css") }}
@endpush

@push('show.left')
<div class="box-body box-widget widget-user">
    <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username">{{$item->name}}</h3>
        <h5 class="widget-user-desc">{{$item->roles->pluck('name')->implode(' &amp; ')}}</h5>
    </div>
    <div class="widget-user-image">
        {{ HTML::image( ( $item->image )? route('image',$item->image_thumbnail) :  asset('assets/img/backend/avatar.png'),'', ['class' => 'profile-user-img img-responsive img-circle']) }}
    </div>
    <div class="box-footer"></div>
    <ul class="nav nav-stacked nav-pills">
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{$item->name}}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-check-square-o text-light-blue"></i> {{$item->username}}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa fa-envelope-o text-light-blue"></i> {{$item->email}}</a>
        </li>
        <li>
          	<a href="javascript:void(0)"><i class="fa {{config("developer.locked.{$item->locked}.icon")}} text-light-blue"></i> <span class="label {{config("developer.locked.{$item->locked}.label")}}">{{config("developer.locked.{$item->locked}.name")}}</span></a>
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
      	<li class="active"><a href="#activity" data-toggle="tab" >Activity Log</a></li>
      	<li ><a href="#settings" data-toggle="tab">Settings</a></li>
    </ul>
    <div class="tab-content">
    	<div class="tab-pane active" id="activity">
    		<div class="table-responsive">
                <table id="table-index" class="table table-bordered table-hover" width="100%">
                    <thead>
					    <tr>
					        <th style="display:none">ID</th>
					        <th>Text</th>
					        <th>Created</th>
					    </tr>
					</thead>
                </table>
            </div>
    	</div>
    	<div class="tab-pane" id="settings">
    		@include('backend.profile.edit')
    	</div>
    </div>
</div>
@endpush

@push('prescripts')
{{ HTML::script("vendor/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}
<script>
	var flash_message = '{!!session("flash_message")!!}';
	var activeSettings = '{{count($errors) ? true : false}}';
	$(function () {
		if (activeSettings) {
			$('a[href="#settings"]').parent().add('#settings').addClass('active');
			$('a[href="#activity"]').parent().add('#activity').removeClass('active');
		}

		renderTable(laroute.route('backend.profile.log'), [
				{ data: 'id', name: 'id', searchable: false },
	        	{ data: 'text', name: 'text'},
	        	{ data: 'created_at', name: 'created_at'}
			], {
				createdRow: function ( row, data, index ) {
		            $('td', row).eq(0).css('display','none');
		        }
			});
		});
</script>
@endpush