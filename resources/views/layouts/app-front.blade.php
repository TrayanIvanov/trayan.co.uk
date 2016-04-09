<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('head.title')Trayan Ivanov - web developer</title>
    <meta name="Keywords" content="@yield('head.meta.keywords', 'trayan ivanov,web developer,portfolio,personal website,php,html,html5,css,mysql,javascript')" />
    <meta name="Description" content="@yield('head.meta.description', 'Trayan Ivanov - web developer - personal website with portfolio of my work and information about me.')" />

    <meta property="og:title" content="@yield('head.og.title', 'Trayan Ivanov - web developer')" />
    <meta property="og:description" content="@yield('head.og.description', 'Personal website with portfolio of my work and information about me.')" />

    <meta name="robots" content="index, follow, all" />
    <meta name="Revisit-After" content="5 days" />
    <meta name="author" content="Trayan Ivanov" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="/css/front-app.css">
    <link rel="stylesheet" href="/css/libs/sweetalert.css">
    @yield('scripts.header')

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' />

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">
    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="/js/libs/sweetalert-dev.js"></script>
    @yield('scripts.footer')
    @include('partials.flash')
</body>
</html>
