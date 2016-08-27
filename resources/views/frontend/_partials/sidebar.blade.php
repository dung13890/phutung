<div>
    <div class="links pull-left">
        <div class="name">{{ str_limit($categoryName, 20) }}</div>
        <ul class="list-unstyled">
        	@foreach ($categories as $category)
            <li>
            	<a href="{{ route(strtolower(class_basename($category)) . '.show',$category->slug) }}">{{ $category->name }}</a>
            	@if (count($category->children))
            		<ul class="submenu">
            		@foreach ($category->children as $children)
                        <li><a href="{{ route(strtolower(class_basename($category)) . '.show',$category->slug) }}">{{ $children->name }}</a></li>
            		@endforeach
                    </ul>
            	@endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="slogan pull-right">{{ $banner->name or '' }}</div>
</div>