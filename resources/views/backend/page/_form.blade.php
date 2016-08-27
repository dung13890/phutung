@extends('layouts.crud._form')

@push('prestyles')
{{ HTML::style("vendor/summernote/css/summernote.css") }}
{{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
<style>
	.animated {
		animation-fill-mode: none;
	}
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
	{{ Form::label('description', 'Content', ['class'=>'control-label']) }}
    {{ Form::textarea('description',null, ['class' => 'form-control textarea-summernote']) }}
</div>

<div class="form-group">
	{{ Form::label('banner', 'Banner', ['class'=>'control-label']) }}
    @include('backend._partials.form.image-form', ['imageName' => 'image','value'=> isset($item) ? $item->image_default : null])
</div>


@endpush

@push('form-partials')
@include('backend._partials.form.seo', ['value' => isset($item->seo) ? $item->seo : null] )
@include('backend.page._intro')
@endpush

@push('prescripts')
{{ HTML::script('vendor/summernote/js/summernote.min.js') }}
{{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
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
	})
</script>
@endpush