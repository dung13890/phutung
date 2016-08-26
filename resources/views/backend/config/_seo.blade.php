<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">SEO</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body">
		<div class="form-group">
			{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
		    {{ Form::text('name',$items->keyBy('key')['name']['value'], ['class' => 'form-control', 'placeholder' => 'required: Name']) }}
		</div>

		<div class="form-group">
			{{ Form::label('keywords', 'Keywords', ['class'=>'control-label']) }}
		    {{ Form::text('keywords',$items->keyBy('key')['keywords']['value'], ['class' => 'form-control', 'placeholder' => 'required: Keywords']) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description', ['class'=>'control-label']) }}
		    {{ Form::textarea('description', $items->keyBy('key')['description']['value'], ['class' => 'form-control','rows'=>'3', 'placeholder'=>'Description']) }}
		</div>
	</div>
</div>