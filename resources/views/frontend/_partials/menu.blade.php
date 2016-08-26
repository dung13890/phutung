<div id="menu">
    <div id="menu-center">
        <div class="logo pull-left">
            <a href="#" title="Trang chủ">
                <img src="{{ route('image', $configs['logo']) }}" alt="LOGO"/>
            </a>
        </div><!-- /.logo -->
        <div class="links pull-right">
            <ul class="list-unstyled">
                @foreach ($__menus as $__menu)
                <li @if(parse_url(Request::url(), PHP_URL_PATH) === $__menu->src)  class="active" @endif>
                    <a href="{{ $__menu->src }}" title="{{ $__menu->name }}">{{ $__menu->name }}</a>
                </li>
                @endforeach
            </ul>
        </div><!-- /.links -->

        <div class="form">
            <form action="">
                <input type="text" placeholder="Từ khóa"/>
                <input type="submit" value=""/>
            </form>
        </div><!-- /.form -->
    </div><!-- /#menu-center -->
</div><!-- /#menu -->