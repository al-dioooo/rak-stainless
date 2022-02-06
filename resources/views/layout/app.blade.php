<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}

    <link rel="shortcut icon" href="{{ asset($icon) }}" type="image/x-icon">

    @include('include.before-script')

    @include('include.style')
</head>

<body class="font-sans antialiased">
    @yield('floating')

    <x-navbar></x-navbar>

    @yield('content')

    <x-footer></x-footer>

    @include('include.after-script')

    @stack('script')
</body>

</html>
