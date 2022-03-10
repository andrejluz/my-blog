<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>andrejblog -- @yield('title')</title>

    <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

<!-- Styles -->

    @if ($_SERVER['HTTP_HOST'] === 'andrejbolg.test')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/my-styles.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('css/my-styles.css') }}">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    @endif


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{--        <script src="{{ url('js/app.js') }}" defer></script>--}}
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->
    <header class="header">
        @include('layouts.blog.blog_header')

    </header>

<!-- content -->
    <section class="content page_content">
        @yield('content')
    </section>

    <section class="content page_category">
        @yield('category')
    </section>

    <!-- footer -->
    <footer>
        @yield('footer')
    </footer>

</body>
</html>
