<div id="menu">
    <div id="menu-center">
        <div class="logo pull-left">
            <a href="/" title="Trang chủ">
                <img src="{{ route('image', $configs['logo_header']) }}" alt="LOGO"/>
            </a>
        </div>

        <div class="links pull-right">
            <ul class="list-unstyled">
                <li class="closesidenav">
                    <a href="javascript:;" onclick="closeSidenav()">
                        <span>&times;</span>
                    </a>
                </li>
                @foreach ($__menus as $__menu)
                    <li @if (parse_url(Request::url(), PHP_URL_PATH) === $__menu->src )  class="active" @endif>
                        <a href="{{ $__menu->src }}" title="{{ $__menu->name }}">{{ $__menu->name }}</a>

                        @if(!$__menu->children->isEmpty())
                        <ul class="submenu">
                            @foreach($__menu->children as $menu)
                                <li>
                                    <a href="{{ $menu->src}}" title="{{ $menu->name }}">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    </li>
                @endforeach
                <li @if (parse_url(Request::url(), PHP_URL_PATH) === '/lien-he') class="active" @endif >
                    <a href="/lien-he" title="{{ trans('repositories.contact') }}">{{ trans('repositories.contact') }}</a>
                </li>
            </ul>
        </div>

        <div class="form">
            {{ Form::open(['url' => route('home.search'),'method' => 'GET']) }}
                <input type="text" name="search" placeholder="{{ trans('repositories.keywords') }}" onfocus="this.placeholder = ''">
                <input type="submit" value="">
            {{ Form::close() }}
        </div>

        <ul class="icons list-inline">
            <li>
                <a href="javascript:;" class="show-search">
                    {{ HTML::image('/template/img/i-search.png', 'i-search') }}
                </a>
            </li>
            <li>
                <a href="{{ $configs['youtube'] }}">
                    {{ HTML::image('template/img/i-white-youtube.png', 'i-white-youtube') }}
                </a>
            </li>
            <li>
                <a href="{{ $configs['facebook'] }}">
                    {{ HTML::image('template/img/i-white-fb.png') }}
                </a>
            </li>
        </ul>

        <button type="button" class="toggle-menu" display="0" onclick="openSidenav()"></button>
    </div>
</div>
