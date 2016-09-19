@extends('layouts.crud._form')

@push('prestyles')
{{ HTML::style("vendor/summernote/css/summernote.css") }}
{{ HTML::style("vendor/select2/css/select2.min.css") }}
<style>
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		border-radius: 0;
	}
	.select2-container--default .select2-selection--multiple {
		border-radius: 0;
		border: 1px solid #ccc;
	}
	.animated {
		animation-fill-mode: none;
	}
</style>
@endpush

@push('form-fields')
<div class="form-group">
	{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
    {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: Name']) }}
</div>

<div class="form-group">
	{{ Form::label('intro', 'Intro', ['class'=>'control-label']) }}
    {{ Form::textarea('intro',null, ['class' => 'form-control','rows'=>'3', 'placeholder'=>'Intro']) }}
</div>

<div class="form-group">
	{{ Form::label('description', 'Content', ['class'=>'control-label']) }}
    {{ Form::textarea('description',null, ['class' => 'form-control textarea-summernote']) }}
</div>

<div class="form-group">
	{{ Form::label('tags', 'Từ khóa', ['class'=>'control-label']) }}
    {!! Form::select('tags[]', isset($tags) ? $tags : [], isset($tags) ? $tags : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked  </b>
        </label>
        <label>
            {{ Form::checkbox('featured', true, old('featured'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Hiện trang chủ  </b>
        </label>
    </div>
</div>
@endpush

@push('form-partials')
@include('backend._partials.form.seo', ['value' => isset($item->seo) ? $item->seo : null] )
@include('backend._partials.form.image', ['imageName' => 'image'])
@include('backend._partials.form.category', ['rootCategories' => $rootCategories])
@endpush

@push('prescripts')
{{ HTML::script('vendor/summernote/js/summernote.min.js') }}
{{ HTML::script('vendor/select2/js/select2.min.js') }}
<script>
	var route = laroute.route('backend.post.tags');
	$(function () {
		$('.textarea-summernote').summernote({
		  	height:300,
			callbacks: {
			  	onImageUpload: function(files) {
                    sendImage(files[0], laroute.route('backend.summernote.image'), $(this));
                }
            },
            toolbar: [
                ['style', ['style', 'ol', 'ul', 'paragraph', 'height']],
                ['font', ['fontname', 'fontsize', 'color', 'strikethrough', 'superscript', 'subscript', 'bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                ['misc', ['redo', 'undo', 'fullscreen', 'codeview', 'help']]
            ]
		});
		select2Init(laroute.route('backend.post.tags'));

	})
</script>
@endpush
