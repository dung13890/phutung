@push('prestyles')
<style>
    #header .links > ul > li.active > a{
        color:#CD181F;
    }
</style>
@endpush
<div>
    <div class="links pull-left">
        @if (count($categories))
        <div class="name">{{ str_limit($categories->shift()->name, 20) }}</div>
        @endif
        <ul class="list-unstyled">
        	@foreach ($categories as $category)
            <li @if ($item->slug === $category->slug || (($item->parent) && $item->parent->slug === $category->slug)) class="active"  @endif >
            	<a title="{{ $category->name }}" href="{{ route(strtolower(class_basename($category)) . '.show', $category->slug) }}">{{ $category->name }}</a>
            	@if (count($category->children))
            		<ul class="submenu">
            		@foreach ($category->children as $children)
                        <li><a title="{{ $children->name }}" href="{{ route(strtolower(class_basename($category)) . '.show', $children->slug) }}">{{ $children->name }}</a></li>
            		@endforeach
                    </ul>
            	@endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="slogan pull-right">{{ $banner->name or '' }}</div>
</div>