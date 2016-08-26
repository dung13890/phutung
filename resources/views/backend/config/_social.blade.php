<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">Social</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body">
		<div class="form-group">
			{{ Form::label('facebook', 'Facebook', ['class'=>'control-label']) }}
		    {{ Form::text('facebook',$items->keyBy('key')['facebook']['value'], ['class' => 'form-control', 'placeholder' => 'required: Facebook']) }}
		</div>

		<div class="form-group">
			{{ Form::label('youtube', 'Youtube', ['class'=>'control-label']) }}
		    {{ Form::text('youtube',$items->keyBy('key')['youtube']['value'], ['class' => 'form-control', 'placeholder' => 'required: Youtube']) }}
		</div>
	</div>
</div>