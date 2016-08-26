@extends('layouts.crud.show')

@push('show.left')
<div class="box-body box-profile no-padding">
	{{ HTML::image( ( $item->image )? route('image',$item->image_thumbnail) :  asset('assets/img/backend/avatar.png'),'', ['class' => 'profile-user-img img-responsive img-circle']) }}
    <h3 class="profile-username text-center">{{$item->name}}</h3>
    <p class="text-center">{!! $item->roles->map(function ($item, $key) {
    	return "<span class='label label-primary'>{$item->name}</span>";
    })->implode(' ') !!}</p>
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
      	<li class="active"><a href="#actions" data-toggle="tab" >Actions</a></li>
    </ul>
    <div class="tab-content">
    	<div class="tab-pane active" id="actions">
            <div class="row">
                <div class="col-md-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                         </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                         </a>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
@endpush