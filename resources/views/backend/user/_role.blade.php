<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">Role</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-stacked">
			@foreach($roles as $id => $name)
				<?php
					$checked = (isset($item) && isset($item->roles->keyBy('id')[$id])) ? true : false;
				?>
				<li>
              		<div class="container-fluid checkbox">
              			<label>
              				{{ Form::checkbox('role_id[]', $id, $checked) }} {{$name}}
              			</label>
              		</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>