<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Info</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name', 'Name', ['class'=>'control-label']) }}
            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'required: Name']) }}
        </div>

        <div class="form-group">
            {{ Form::label('slogan', 'Slogan', ['class'=>'control-label']) }}
            {{ Form::text('slogan', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('sort', 'Số thứ tự', ['class'=>'control-label']) }}
            {{ Form::number('sort', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'mini']) }}    <b>Locked  </b>
                </label>
                <label>
                    {{ Form::checkbox('featured', true, old('featured'), ['data-toggle'=>'toggle','data-size' => 'mini']) }}    <b>Nổi bật  </b>
                </label>
            </div>
        </div>
    </div>
</div>