{{ Form::model($item, ['url' => route("backend.profile.update"), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off', 'method' => 'PATCH']) }}
    <div class="row">
    	<div class="col-sm-8">
    		@if (count($errors) > 0)
		    <div class="alert alert-danger animated jello">
		        <strong>Whoops!</strong> There were some problems with your input.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		    @endif

		    <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
			    		{{ Form::text('name',null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('username', 'Username', ['class'=>'control-label']) }}
			    		{{ Form::text('username',null, ['class' => 'form-control','disabled']) }}
					</div>
				</div>
			</div>

			<div class="form-group">
			    {{ Form::label('email', 'Email', ['class'=>'control-label']) }}
			    {{ Form::email('email',null, ['class' => 'form-control','disabled']) }}
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						{{ Form::label('password', 'Password', ['class'=>'control-label']) }}
						{{ Form::password('password', ['class' => 'form-control','placeholder' => 'New your password']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::label('password_confirmation', 'Confirm Password', ['class'=>'control-label']) }}
						{{ Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'confirm your password']) }}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="checkbox">
			        <label>
			            {{ Form::checkbox('agree', true, null) }} I agree to the terms and conditions
			        </label>
			    </div>
			</div>
			<hr>
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
	        </div>
    	</div>
    	<div class="col-sm-4">
    		@include('backend._partials.form.image',['imageName' => 'image'])
    	</div>
    </div>
{{ Form::close() }}