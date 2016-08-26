@extends('layouts.crud._form')

@push('form-fields')
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
    		{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: your name.']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('username', 'Username', ['class'=>'control-label']) }}
    		{{ Form::text('username',null, ['class' => 'form-control', 'placeholder' => 'required: username']) }}
		</div>
	</div>
</div>

<div class="form-group">
    {{ Form::label('email', 'Email', ['class'=>'control-label']) }}
    {{ Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'required: email@domain.com']) }}
</div>

<div class="form-group">
	<div class="row">
		<div class="col-sm-6">
			{{ Form::label('password', 'Password', ['class'=>'control-label']) }}
			{{ Form::password('password', ['class' => 'form-control','placeholder' => 'required: your password']) }}
		</div>
		<div class="col-sm-6">
			{{ Form::label('password_confirmation', 'Confirm Password', ['class'=>'control-label']) }}
			{{ Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'required: confirm your password']) }}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked</b>
        </label>
    </div>
</div>

@endpush

@push('form-partials')
@include('backend.user._role')
@include('backend._partials.form.image',['imageName' => 'image'])
@endpush