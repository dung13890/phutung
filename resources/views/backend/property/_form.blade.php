<div class="form-group">
	{{ Form::label('name', 'Group', ['class'=>'control-label']) }}
	{{ Form::select('group',$groupList, null,['class' => 'form-control']) }}
</div>

<div class="form-group" id="name-group">
	{{ Form::label('name', 'Group Name', ['class'=>'control-label']) }}
	{{ Form::text('key',null, ['class' => 'form-control','placeholder'=>'required: Group']) }}
</div>

<div class="form-group">
	{{ Form::label('name', 'Value', ['class'=>'control-label']) }}
	{{ Form::text('name',null, ['class' => 'form-control','placeholder'=>'required: Value']) }}
</div>

<div class="form-group">
	<div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle','data-size' => 'small']) }}	<b>Locked</b>
        </label>
    </div>
</div>

<hr>
<div class="form-group">
	<a href="javascript:window.history.back()" class="btn btn-default btn-sm" ><i class="fa fa-arrow-circle-left"></i> Back</a>
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
    @if (isset($item))
    <a href="{{route('backend.property.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
    @endif
</div>
