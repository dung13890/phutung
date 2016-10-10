@push('prestyles')
<style>
    #header .links > ul > li.active > a{
        color:#CD181F;
    }
    #header .links > ul > li > a:hover{
        color:#CD181F;
        text-decoration: none;
    }
    #header .links > .name > a{
        color:#fff;
    }

    #header .links > .name > a:hover{
        color:#CD181F;
        text-decoration: none;
    }
    #header .slogan{
        background: {{  $item->slogan_color_bg ? $item->slogan_color_bg : '#ffe100' }} !important;
        color: {{  $item->slogan_color_text ? $item->slogan_color_text : '#231f20' }} !important;
    }
</style>
@endpush
<div>
    <div class="links pull-left">
        <div class="name"><a href="{{ route(strtolower(class_basename($categoryFirst)) . '.show', $categoryFirst->slug) }}" title="{{ $categoryFirst->name }}"> {{ str_limit($categoryFirst->name, 20) }} </a></div>
        <ul class="list-unstyled clearfix">
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
    <div class="slogan pull-right">{{ $item->slogan or $configs['slogan'] }}</div>
</div>