<div id="slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
            $count = 0; 
            $html = '';
        ?>
        @foreach ($__slides as $__slide)
        <?php
            $html .= '<li data-target="#slider" data-slide-to="' . $count . '"></li>';
        ?>
        <div class="item @if ($count++ === 1) active @endif">
            <img src="{{ route('image', $__slide->image_default) }}" alt="{{ $__slide->name }}"/>
        </div>
        @endforeach
    </div>

    <ol class="links carousel-indicators">
        {!! $html !!}
    </ol>

    <a class="left carousel-control" href="#slider" data-slide="prev">
        <img src="/template/img/slider-prev.png" alt="Slide Prev"/>
    </a>
    <a class="right carousel-control" href="#slider" data-slide="next">
        <img src="/template/img/slider-next.png" alt="Slide Next"/>
    </a>
</div><!-- /#slider -->