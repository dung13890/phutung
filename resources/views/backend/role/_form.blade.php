@extends('layouts.crud._form')

@push('form-fields')

<div class="form-group">
    {{ Form::label('name', 'Name', ['class'=>'control-label']) }}
    {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: name for role']) }}
</div>
@endpush

@push('form-partials')
@include('backend.role._ability')
@endpush