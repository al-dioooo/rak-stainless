<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset($icon) }}" type="image/x-icon">

    @include('include.before-script')

    @include('include.style')

</head>

<body class="antialiased">

    @stack('before-script')

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <x-sidebar></x-sidebar>
        <x-mobile-sidebar></x-mobile-sidebar>
        <div class="flex flex-col flex-1 w-full">
            <x-topbar></x-topbar>
            <main class="h-full overflow-y-scroll">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('modal')

    @include('include.after-script')

    @stack('script')
</body>

</html>
