<div id="top">
    <div class="language pull-right">
        {{ trans('repositories.lang') }}
        @if (session()->has('locale') && session('locale') === 'vi')
        <strong ><a style="font-size:17px;" href="{{ route('home.locale', 'vi') }}" title="Tiếng Việt">VN</a></strong> |
        <a href="{{ route('home.locale', 'en') }}" title="Tiếng Anh">EN</a>
        @else
        <strong ><a style="font-size:17px;" href="{{ route('home.locale', 'en') }}" title="English">EN</a></strong> |
        <a href="{{ route('home.locale', 'vi') }}" title="Tiếng Viêt">VN</a>
        @endif
    </div><!-- /.language -->
</div><!-- /#top -->