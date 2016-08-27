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
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
    		{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: name']) }}
		</div>

		<div class="col-md-6">
			{{ Form::label('parent_id', 'Root', ['class'=>'control-label']) }}
			{!! Form::select('parent_id',$listItems, null,['class' => 'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
    {{ Form::label('slogan', 'Slogan', ['class'=>'control-label']) }}
    {{ Form::text('slogan', isset($banner) ? $banner->name : null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('banner', 'Banner', ['class'=>'control-label']) }}
    @include('backend._partials.form.image-form', ['imageName' => 'banner','value'=> isset($banner) ? $banner->image_default : null])
</div>

<div class="form-group">
	{{ Form::label('name', 'Description', ['class'=>'control-label']) }}
	{{ Form::textarea('description',null, ['class' => 'form-control','rows'=>'3', 'placeholder'=>'Description...']) }}
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked</b>
        </label>
    </div>
</div>

<hr>
<div class="form-group">
	<a href="javascript:window.history.back()" class="btn btn-default btn-sm" ><i class="fa fa-arrow-circle-left"></i> Back</a>
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
    @if (isset($item))
    <a href="{{ route('backend.category.type',$item->type) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
    @endif
</div>

@push('prescripts')
{{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
@endpush