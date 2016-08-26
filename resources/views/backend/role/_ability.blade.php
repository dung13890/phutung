<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">Ability</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body no-padding">
		<div class="slim-scroll">
			<ul class="nav nav-stacked">
				@foreach($abilities as $key=>$group)
				<li>
					<label class="container-fluid"> {{ ucfirst(trans('repositories.' . $key))}}</label>
					@foreach($group->lists('name','id') as $id => $name)
					<?php
						$checked = (isset($item) && isset($item->abilities->keyBy('id')[$id])) ? true : false;
					?>
	              		<div class="container-fluid checkbox">
	              			<label>
	              				{{ Form::checkbox('ability_id[]', $id, $checked) }} {{$name}}
	              			</label>
	              		</div>
					@endforeach
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>