<div id="top">
    <div class="language pull-right">
        {{ trans('repositories.lang') }}
        <strong style="margin-left: 10px;" ><a @if (session('locale') === 'vi') class="active" @endif href="{{ route('home.locale', 'vi') }}" title="Tiếng Việt">VN</a></strong> |
        <a @if (session('locale') === 'en') class="active" @endif href="{{ route('home.locale', 'en') }}" title="Tiếng Anh">EN</a>
        <a href="{{ $configs['facebook'] }}" title="Facebook" style="margin-left: 10px">
            {!! HTML::image('assets/img/facebook_icon.png', 'ICON-FB') !!}
        </a>
        <a href="{{ $configs['youtube'] }}" title="Youtube">
            {!! HTML::image('assets/img/youtube_icon.png', 'ICON-Youtube') !!}
        </a>
    </div><!-- /.language -->
</div><!-- /#top -->
