@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-blue-50 py-12 px-4">
    <div class="w-full max-w-2xl bg-white/95 rounded-2xl shadow-2xl p-10 border border-indigo-100">
        <div class="flex items-center gap-4 mb-6">
            <div class="flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-r from-indigo-500 to-blue-400 shadow">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 32 32">
                    <rect width="32" height="32" rx="8" fill="currentColor"/>
                    <text x="16" y="22" text-anchor="middle" fill="#fff" font-size="16" font-family="Arial" font-weight="bold">JP</text>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-indigo-700 mb-1">{{ $job->title }}</h1>
                <div class="flex flex-wrap items-center gap-2">
                    @if($job->category)
                        <span class="inline-block bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-4 py-1 rounded-full text-xs font-semibold shadow">
                            {{ $job->category->name }}
                        </span>
                    @endif
                    <span class="text-gray-400 text-xs">Posted on: {{ $job->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-indigo-600 mb-2">Description</h2>
            <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
        </div>

        <div class="mb-6 flex items-center gap-2">
            <span class="text-gray-500 text-sm">
                <svg class="inline w-4 h-4 text-indigo-400 mr-1" fill="none" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"/></svg>
                Posted By: <span class="font-semibold">{{ $job->user->name ?? 'Unknown' }}</span>
            </span>
        </div>

        <div class="flex items-center justify-between mt-8">
            <span class="text-sm text-gray-400">Job ID: #{{ $job->id }}</span>
            @auth
                @if(auth()->user()->role === 'job_seeker')
                    <a href="{{ route('jobs.apply', $job->id) }}" class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-7 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
                        Apply Now
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
