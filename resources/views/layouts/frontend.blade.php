<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    	<title>{!! $heading or $configs['name'] !!}</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <meta name="description" content="{!! $description or $configs['description'] !!}">
        <meta name="keywords" content="{!! $keywords or $configs['keywords'] !!}">
        <meta property="og:url" content="{!! Request::url() !!}" />
        <meta property="og:site_name" content="{!! $heading or $configs['name'] !!}" />
        <meta property="og:type"   content="website" />
        <meta property="og:title"  content="{!! $heading or $configs['name'] !!}" />
        <meta property="og:description"  content="{{ $description or $configs['description'] }}" />
        <meta property="og:image"  content="{!! $image or '/template/img/logo.png' !!}" />
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">

        {{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{ HTML::style('template/css/common.css') }}
        {{ HTML::style('template/css/responsive/common.css') }}

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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72792053-2', 'auto');
  ga('send', 'pageview');

</script>
        {{ HTML::script('vendor/jquery/jquery.min.js') }}
        {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::style(elixir('assets/js/frontend/frontend.js')) }}
        {{ HTML::script('template/js/app.js') }}
        @stack('prescripts')

    </body>
</html>
