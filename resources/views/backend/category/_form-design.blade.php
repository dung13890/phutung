<div class="modal" id="form-design">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">New Box</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => route("backend.category.design", $item->id), 'files' => true, 'autocomplete'=>'off', 'method' => 'PATCH']) }}
                    <div class="form-group">
                        {{ Form::label('design_name', 'Name', ['class'=>'control-label']) }}
                        {{ Form::text('design_name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('design_code', 'code', ['class'=>'control-label']) }}
                        {{ Form::text('design_code', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('design_provider', 'Nhà cung cấp', ['class'=>'control-label']) }}
                        {{ Form::text('design_provider',null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('design_link', 'Link', ['class'=>'control-label']) }}
                        {{ Form::text('design_link',null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('design_order', 'Thứ tự', ['class'=>'control-label']) }}
                        {{ Form::number('design_order',null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('design_image', 'Ảnh đại diện', ['class'=>'control-label']) }}
                        @include('backend._partials.form.image-form', ['imageName' => 'design_image'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>