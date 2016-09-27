@extends('layouts.crud._form')

@push('prestyles')
{{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
<style>
    .fileinput, .fileinput .fileinput-preview {
        width: 100%;
    }
    .fileinput .fileinput-preview {
        width: 100%;
        border-radius: 0;
    }
    .fileinput .fileinput-preview img {
        height: 150px;
    }

</style>
@endpush

@push('form-fields')
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {{ Form::label('name', 'Name', ['class'=>'control-label']) }}
            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: Name']) }}
        </div>
        <div class="col-sm-4">
            {{ Form::label('link', 'Link', ['class'=>'control-label']) }}
            {{ Form::text('link',null, ['class' => 'form-control', 'placeholder' => 'required: Link']) }}
        </div>
        <div class="col-sm-2">
            {{ Form::label('sort', 'Thứ tự', ['class'=>'control-label']) }}
            {{ Form::number('sort',null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('image', 'Image', ['class'=>'control-label']) }}
    <div class="fileinput fileinput-new"  data-provides="fileinput">
        <div class="thumbnail fileinput-preview" data-trigger="fileinput">
            {!! HTML::image( (isset($item) && $item->image )? route('image',$item->image_default) :  asset('assets/img/backend/no_image.jpg'),'', ['height' => '150']) !!}
        </div>
        <div>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            <div class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                {!! Form::file('image') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}   <b>Locked  </b>
        </label>
    </div>
</div>
@endpush

@push('prescripts')
{{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
@endpush


