<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="google-signin-client_id" content="802764257627-et68vcnarp4ol49c2rr8o8gp5uqn2u5u.apps.googleusercontent.com"> --}}

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset($icon) }}" type="image/x-icon">

    @include('include.before-script')

    @include('include.style')

    @yield('style')
</head>

<body class="font-sans antialiased bg-gray-50">
    @yield('content')

    @include('include.after-script')

    @stack('script')
</body>

</html>
