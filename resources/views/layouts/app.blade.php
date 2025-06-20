<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Role-based quick links -->
            @auth
                <nav class="flex gap-4 p-4 bg-white shadow mb-4">
                    @if(Auth::user()->role === 'admin')
                        <a href="/admin-panel" class="text-indigo-700 font-semibold hover:underline">Admin Panel</a>
                    @endif

                    @if(Auth::user()->role === 'employer')
                        <a href="{{ route('jobs.create') }}" class="text-indigo-700 font-semibold hover:underline">Post a Job</a>
                    @endif

                   @auth
    @if(auth()->user()->role === 'job_seeker')
        <a href="{{ route('applications.mine') }}" class="text-indigo-600 font-semibold ml-4">
            My Applications
        </a>
        <a href="{{ url('/') }}">
    <button class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-5 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
        Home
    </button>
</a>
    @endif
@endauth
                </nav>
            @endauth

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                  @yield('content')
            </main>
        </div>
    </body>
</html>
