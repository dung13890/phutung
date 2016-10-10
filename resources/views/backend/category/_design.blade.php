@include('backend.category._form-design')
<div class="row">
	@if (isset($designs))
	@foreach ($designs as $design)
	<div class="col-sm-4">
		<div class="box box-default box-solid collapsed-box">
            <div class="box-header with-border">
              	<h3 class="box-title">{{ $design->name }}</h3>
              	<div class="box-tools pull-right">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <a href="{{ route('backend.category.design.destroy', $design->id) }}" class="btn btn-box-tool delete-design"><i class="fa fa-remove"></i></a>
              	</div>
            </div>
            <div class="box-body">
            	{{ HTML::image( ( $design->image )? route('image',$design->image_medium) :  asset('assets/img/backend/avatar.png'),'', ['class' => 'img-responsive']) }}
            	<br>
            	<p><b>Code: </b> {{ $design->code }}</p>
            	<p><b>Nhà cung cấp: </b> {{ $design->provider }}</p>
            	<p><b>STT: </b> {{ $design->order }}</p>
            </div>
        </div>
	</div>
	@endforeach
	@endif
</div>
<hr>
<div class="form-group">
    <a href="#" class="btn btn-primary btn-sm" id="create-box" ><i class="fa fa-plus"></i> Create Box</a>
</div>

@push('prescripts')
	<script>
		$('#create-box').on('click', function (e) {
			e.preventDefault();
			$('#form-design').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
		});

        $('.delete-design').on('click', function (e) {
            e.preventDefault();
            alertDestroy($(this).attr('href'));
        });

	</script>
@endpush