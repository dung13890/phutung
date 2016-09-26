@extends('layouts.crud._form')

@push('form-fields')
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {{ Form::label('category_id', 'Chuyên mục', ['class'=>'control-label']) }}
            {{ Form::select('category_id', $listCategory, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-sm-6">
			{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
    		{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: Name']) }}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-sm-6">
			{{ Form::label('description', 'Mô tả', ['class'=>'control-label']) }}
    		{{ Form::textarea('description',null, ['class' => 'form-control','rows'=>'3', 'placeholder'=>'Mô tả']) }}
    	</div>
    </div>
</div>

<div class="form-group">
    <label for="file">Tài liệu đính kèm</label>
    {{ Form::file('file') }}
    @if (isset($item) && $item->file)
    <a href="{{ route('file', $item->file) }}">{{ $item->file }}</a>
    @endif
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked  </b>
        </label>
    </div>
</div>
@endpush



