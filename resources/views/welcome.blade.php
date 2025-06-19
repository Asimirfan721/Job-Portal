<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal - Home</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #c5c2ec 0%, #dfeee6 100%);
        }
        .job-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 24px 0 rgba(80, 112, 255, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .job-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 8px 32px 0 rgba(80, 112, 255, 0.16);
        }
        .category-badge {
            background: linear-gradient(90deg, #d5d5f3 0%, #60a5fa 100%);
            color: #910404;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col font-sans">
    <!-- Top Navigation -->
    <header class="w-full px-8 py-6 flex justify-between items-center bg-white/80 backdrop-blur shadow-md fixed top-0 left-0 z-30">
        <div class="flex items-center gap-2">
            <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 32 32"><rect width="32" height="32" rx="8" fill="currentColor"/><text x="16" y="22" text-anchor="middle" fill="#fff" font-size="16" font-family="Arial" font-weight="bold">JP</text></svg>
            <span class="text-xl font-bold text-indigo-700 tracking-wide">Job Portal</span>
        </div>
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 rounded-lg font-medium text-indigo-700 border border-indigo-200 hover:bg-indigo-50 transition">
                            Dashboard
                        </a>
                        <a href="{{ route('jobs.create') }}">
                            <button class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-5 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
                                Post a Job
                            </button>
                        </a>
                    @endauth
                </nav>
            @endif
            @guest
                <a href="{{ route('register') }}">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow font-semibold">
                        Register Yourself Here
                    </button>
                </a>
            @endguest
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center justify-start pt-32 pb-12 px-4 min-h-screen">
        <section class="w-full max-w-2xl text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-800 mb-3 drop-shadow">Find Your Next Opportunity</h1>
            <p class="text-lg text-indigo-500 mb-2">Browse the latest job postings and kickstart your career!</p>
        </section>

        <section class="w-full max-w-2xl space-y-6">
            @forelse($jobs as $job)
                <div class="job-card p-6 flex flex-col gap-2 border border-indigo-100">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-semibold text-indigo-700">
                            <a href="{{ route('jobs.show', $job->id) }}" class="hover:underline">
                                {{ $job->title }}
                            </a>
                        </h3>
                        @if($job->category)
                            <span class="category-badge">{{ $job->category->name }}</span>
                        @endif
                    </div>
                    <p class="text-gray-600 text-base mt-1 mb-2">{{ $job->description }}</p>
                    <div class="flex items-center justify-between text-sm text-gray-400">
                        <span>Posted: {{ $job->created_at->diffForHumans() }}</span>
                        <span>Job ID: #{{ $job->id }}</span>
                    </div>
                    @auth
                        @php $user = Auth::user(); @endphp
                        @if(($user->role === 'admin') || ($user->role === 'employer' && $job->user_id === $user->id))
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                    Delete
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <div class="job-card p-8 text-center border border-indigo-100">
                    <p class="text-indigo-400 text-lg">No job postings yet. Be the first to <a href="{{ route('jobs.create') }}" class="text-indigo-600 underline font-semibold">post a job</a>!</p>
                </div>
            @endforelse
        </section>
    </main>
</body>
</html>
