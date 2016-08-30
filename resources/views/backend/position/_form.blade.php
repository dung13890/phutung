@extends('layouts.crud._form')

@push('form-fields')
<div class="form-group">
	{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
	{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: your name.']) }}
</div>

<div class="form-group">
	{{ Form::label('phone', 'Phone', ['class'=>'control-label']) }}
	{{ Form::text('phone',null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('email', 'Email', ['class'=>'control-label']) }}
    {{ Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'required: email@domain.com']) }}
</div>

<div class="form-group">
	{{ Form::label('address', 'Address', ['class'=>'control-label']) }}
	{{ Form::text('address',null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked</b>
        </label>
    </div>
</div>

@endpush
