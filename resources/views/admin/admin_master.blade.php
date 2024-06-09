<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KhitanCare') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Content -->
            <main>
                @yield('klinik')
                @yield('dashboard')
                @yield('register')
                @yield('registersuccess')
                @yield('forgotpassword')
                @yield('resetpassword')
                @yield('login')
                @yield('profile')
                @yield('createprofile')
                @yield('editprofile')
                @yield('doctor')
                @yield('createdoctor')
                @yield('editdoctor')
                @yield('metode')
                @yield('editmetode')
                @yield('services')
                @yield('createservices')
                @yield('footer')



            </main>
        </div>
    </body>
</html>
