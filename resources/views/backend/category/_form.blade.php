@push('prestyles')
{{ HTML::style("vendor/summernote/css/summernote.css") }}
{{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ HTML::style('vendor/colorpicker/css/bootstrap-colorpicker.min.css') }}
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
    .animated {
        animation-fill-mode: none;
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
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('slogan', 'Slogan', ['class'=>'control-label']) }}
            {{ Form::text('slogan', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm-3">
            {{ Form::label('slogan_color_bg', 'Background Color', ['class'=>'control-label']) }}
            <div class="input-group colorpicker-component">
                {{ Form::text('slogan_color_bg', null, ['class' => 'form-control']) }}
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>
        <div class="col-sm-3">
            {{ Form::label('slogan_color_text', 'Text Color', ['class'=>'control-label']) }}
            <div class="input-group colorpicker-component">
                {{ Form::text('slogan_color_text', null, ['class' => 'form-control']) }}
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
	{{ Form::label('banner', 'Banner', ['class'=>'control-label']) }}
    @include('backend._partials.form.image-form', ['imageName' => 'banner','value'=> isset($banner) ? $banner->image_default : null])
</div>

<div class="form-group">
	{{ Form::label('name', 'Description', ['class'=>'control-label']) }}
	{{ Form::textarea('description',null, ['class' => 'form-control textarea-summernote','rows'=>'3', 'placeholder'=>'Description...']) }}
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
{{ HTML::script('vendor/summernote/js/summernote.min.js') }}
{{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
{{ HTML::script('vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}
<script>
    $(function () {
        $('.textarea-summernote').summernote({
            height:200,
            callbacks: {
                onImageUpload: function(files) {
                    sendImage(files[0], laroute.route('backend.summernote.image'), $(this));
                }
            }
        });

        $('.colorpicker-component').colorpicker();
    })
</script>
@endpush
