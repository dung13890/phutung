<div class="form-group">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						{{ Form::text('box_left_name',$items->keyBy('key')['box_left_name'][$parm], ['class' => 'form-control', 'placeholder' => 'Tên box bên trái']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::text('box_left_link',$items->keyBy('key')['box_left_link'][$parm], ['class' => 'form-control', 'placeholder' => 'Link: http://']) }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						{{ Form::text('box_right_name',$items->keyBy('key')['box_right_name'][$parm], ['class' => 'form-control', 'placeholder' => 'Tên box bên phải']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::text('box_right_link',$items->keyBy('key')['box_right_link'][$parm], ['class' => 'form-control', 'placeholder' => 'Link: http://']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>
	
<div class="form-group">
	<div class="row">
		<div class="col-sm-6">
			{{ Form::label('email', 'Email', ['class'=>'control-label']) }}
    		{{ Form::text('email', $items->keyBy('key')['email'][$parm], ['class' => 'form-control', 'placeholder' => 'required: Email']) }}
		</div>
		<div class="col-sm-6">
			{{ Form::label('phone', 'Phone', ['class'=>'control-label']) }}
    		{{ Form::text('phone', $items->keyBy('key')['phone'][$parm], ['class' => 'form-control', 'placeholder' => 'required: Phone']) }}
		</div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('address', 'Address', ['class'=>'control-label']) }}
    {{ Form::text('address',$items->keyBy('key')['address'][$parm], ['class' => 'form-control', 'placeholder' => 'required: Address']) }}
</div>
<hr>

<div class="form-group">
	{{ Form::label('slogan', 'Slogan', ['class'=>'control-label']) }}
    {{ Form::textarea('slogan',$items->keyBy('key')['slogan'][$parm], ['class' => 'form-control','rows'=>'3', 'placeholder'=>'Slogan']) }}
</div>

<div class="form-group">
	{{ Form::label('introduce', 'Introduce', ['class'=>'control-label']) }}
    {{ Form::textarea('introduce',$items->keyBy('key')['introduce'][$parm], ['class' => 'form-control textarea-summernote']) }}
</div>
<hr>
