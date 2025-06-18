<!-- resources/views/jobs/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-blue-50 py-12 px-4">
    <div class="w-full max-w-xl bg-white/90 rounded-2xl shadow-xl p-8 border border-indigo-100">
        <div class="flex items-center gap-3 mb-6">
            <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 32 32">
                <rect width="32" height="32" rx="8" fill="currentColor"/>
                <text x="16" y="22" text-anchor="middle" fill="#fff" font-size="16" font-family="Arial" font-weight="bold">JP</text>
            </svg>
            <h2 class="text-2xl font-extrabold text-indigo-800">Post a New Job</h2>
        </div>
        <a href="{{ url('/') }}">
    <button class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-5 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
        Home
    </button>
</a>

        <form method="POST" action="{{ route('jobs.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Job Title</label>
                <input type="text" name="title" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required></textarea>
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Category</label>
                <select name="category_id" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="1">SQA</option>
                    <option value="2">DEVELOPMENT</option>
                    <option value="3">PYTHON</option>
                    <option value="4">CYBER</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-6 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
                    Post Job
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
