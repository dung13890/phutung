<div class="col-md-9">
    <div class="box box-primary animated @if (count($errors) > 0) jello @else fadeInUp @endif">
    	<div class="box-header with-border">
            <a href="javascript:window.history.back()" class="btn btn-default btn-sm" ><i class="fa fa-arrow-circle-left"></i> Back</a>
    		<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
    		<div class="box-tools pull-right">
            	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          	</div>
    	</div>
    	<div class="box-body">
            @if (count($errors) > 0)
	        <div class="alert alert-danger">
	            <strong>Whoops!</strong> There were some problems with your input.<br><br>
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	        @endif
		    @stack('form-fields')
		</div>
    </div>
</div>
<div class="col-sm-3">
	@stack('form-partials')
</div>