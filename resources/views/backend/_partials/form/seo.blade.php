<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#seo_title" data-toggle="tab">TIT</a></li>
        <li><a href="#seo_description" data-toggle="tab">DES</a></li>
        <li><a href="#seo_keywords" data-toggle="tab">KEY</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="seo_title">
            <div class="form-group">
				{{ Form::label('seo_title', 'Tiêu đề', ['class'=>'control-label']) }}
			    {{ Form::text('seo_title', (isset($value) && $value) ? $value->title : null, ['class' => 'form-control', 'placeholder' => 'Tiêu đề SEO']) }}
			</div>
        </div>
        <div class="tab-pane" id="seo_description">
	        <div class="form-group">
	        	{{ Form::label('seo_description', 'Mô tả', ['class'=>'control-label']) }}
    			{{ Form::textarea('seo_description',(isset($value) && $value) ? $value->description : null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Mô tả SEO tối đa 120 ký tự']) }}
	        </div>
        </div>
        <div class="tab-pane" id="seo_keywords">
	        <div class="form-group">
	        	{{ Form::label('seo_keywords', 'Từ khóa', ['class'=>'control-label']) }}
			    {{ Form::text('seo_keywords', (isset($value) && $value) ? $value->keywords : null, ['class' => 'form-control','placeholder' => 'Từ khóa SEO ']) }}
	        </div>
        </div>
    </div>
</div>