    <!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    	<title>{!! $heading or $configs['name'] !!}</title>
        <meta name="description" content="{!! $description or $configs['description'] !!}">
        <meta name="keywords" content="{!! $keywords or $configs['keywords'] !!}">
        <meta property="og:url" content="{!! Request::url() !!}" />
        <meta property="og:site_name" content="{!! $heading or $configs['name'] !!}" />
        <meta property="og:type"   content="website" />
        <meta property="og:title"  content="{!! $heading or $configs['name'] !!}" />
        <meta property="og:description"  content="{!! $description or $configs['description'] !!}" />
        <meta property="og:image"  content="{!! $image or '/template/img/logo.png' !!}" />
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">
        {{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::style('template/css/common.css') }}
    	@stack('prestyles')
    </head>
    <body>
    	<div id="wrapper">
            @include('frontend._partials.top')
            @include('frontend._partials.menu')
            @include('frontend._partials.slide')
            <div id="content">
                <div id="content-center">
                    @yield('page-content')
                </div>
            </div>
            @include('frontend._partials.footer')
        </div>
        {{ HTML::script('vendor/jquery/jquery.min.js') }}
        {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::style(elixir('assets/js/frontend/frontend.js')) }}
        @stack('prescripts')
    </body>
</html>