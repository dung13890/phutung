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
	{{ Form::label('description', 'Content', ['class'=>'control-label']) }}
    {{ Form::textarea('description',null, ['class' => 'form-control textarea-summernote']) }}
</div>

<div class="form-group">
	{{ Form::label('tags', 'Từ khóa', ['class'=>'control-label']) }}
    {!! Form::select('tags[]', isset($tags) ? $tags : [], isset($tags) ? $tags : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>


@endpush

@push('form-partials')
@include('backend.page._intro')
@endpush

@push('prescripts')
{{ HTML::script('vendor/summernote/js/summernote.min.js') }}
{{ HTML::script('vendor/select2/js/select2.min.js') }}
<script>
	var route = laroute.route('backend.page.tags');
	$(function () {
		$('.textarea-summernote').summernote({
		  	height:300,
		  	toolbar: [
			    ['style', ['bold', 'italic', 'underline', 'clear']],
			    ['fontsize', ['fontsize']],
			    ['insert', ['link','picture','video']],
			    ['misc', ['fullscreen','undo','redo']]
			],
			callbacks: {
			  	onImageUpload: function(files) {
                    sendImage(files[0], laroute.route('backend.summernote.image'), $(this));
                }
            }
		});
		select2Init(route);
	})
</script>
@endpush