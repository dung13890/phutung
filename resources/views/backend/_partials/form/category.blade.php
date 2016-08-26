<div class="box box-primary box-solid">
	<div class="box-header with-border">
		<h3 class="box-title">Chuyên mục</h3>
		<div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      	</div>
	</div>
	<div class="box-body no-padding">
		<div class="slim-scroll">
			<ul class="nav nav-stacked">
				@foreach ($rootCategories as $rootCategory)
				<?php
					$checked = (isset($item) && isset($item->categories->keyBy('id')[$rootCategory->id])) ? true : false;
				?>
				<li>
					<div class="container-fluid checkbox">
              			<label>
              				{{ Form::checkbox('category_id[]', $rootCategory->id, $checked, ['class'=>'parent']) }} <b>{{$rootCategory->name}}</b>
              			</label>
              		</div>
              		@if (count($rootCategory->children))
              			@foreach ($rootCategory->children as $childrenCategory)
              			<?php
							$childrenChecked = (isset($item) && isset($item->categories->keyBy('id')[$childrenCategory->id])) ? true : false;
						?>
              				<div class="container-fluid checkbox">
		              			<label>
		              				{{ Form::checkbox('category_id[]', $childrenCategory->id, $childrenChecked, ['class'=>'children','data-parent'=>$rootCategory->id]) }} - - {{$childrenCategory->name}}
		              			</label>
		              		</div>
              			@endforeach
              		@endif
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@push('prescripts')
<script>
	$(function () {
		$(':checkbox[class="children"]').change(function() {
            if($(this).is(":checked")) {
            	var parentId = $(this).data('parent');
            	if (! $(':checkbox[class="parent"][value='+parentId+']').is(':checked')) {
            		$(':checkbox[class="parent"][value='+parentId+']').prop('checked','true');
            	}
            }
        });
	})
</script>
@endpush