<div id="top">
    <div class="language pull-right">
        {{ trans('repositories.lang') }}
        <strong ><a @if (session('locale') === 'vi') class="active" @endif href="{{ route('home.locale', 'vi') }}" title="Tiếng Việt">VN</a></strong> |
        <a @if (session('locale') === 'en') class="active" @endif href="{{ route('home.locale', 'en') }}" title="Tiếng Anh">EN</a>
    </div><!-- /.language -->
</div><!-- /#top -->