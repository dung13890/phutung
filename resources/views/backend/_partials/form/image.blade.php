@push('prestyles')
{{ HTML::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
@endpush
<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">{{ucfirst($imageName)}}</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body">
		<div class="fileinput fileinput-new"  data-provides="fileinput">
			<div class="fileinput-preview thumbnail" data-trigger="fileinput">
				{!! HTML::image( (isset($item) && $item->image )? route('image',$item->image_medium) :  asset('assets/img/backend/no_image.jpg'),'', ['width' => '100%']) !!}
			</div>
			<div>
				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
				<div class="btn btn-default btn-file">
					<span class="fileinput-new">Select image</span>
					<span class="fileinput-exists">Change</span>
					{!! Form::file($imageName) !!}
				</div>
			</div>
		</div>
	</div>
</div>
@push('prescripts')
{{ HTML::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
@endpush