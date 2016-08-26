{{ Form::label('image', ucfirst($imageName), ['class'=>'control-label']) }}
<div class="fileinput fileinput-new"  data-provides="fileinput">
	<div class="thumbnail fileinput-preview" data-trigger="fileinput">
		{{ HTML::image( (isset($value) && $value )? route('image', $value) :  asset('assets/img/backend/no_image.jpg'),'') }}
	</div>
	<div>
		<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		<div class="btn btn-default btn-file">
			<span class="fileinput-new">Select image</span>
			<span class="fileinput-exists">Change</span>
			{{ Form::file($imageName) }}
		</div>
	</div>
</div>