@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded mt-10">
    <h1 class="text-3xl font-bold text-indigo-700 mb-4">{{ $job->title }}</h1>

    <p class="text-gray-600 mb-2"><strong>Category:</strong> {{ $job->category->name ?? 'N/A' }}</p>
    <p class="text-gray-600 mb-2"><strong>Description:</strong> {{ $job->description }}</p>
    <p class="text-sm text-gray-400 mt-4">Posted on: {{ $job->created_at->format('d M, Y') }}</p>

    <div class="mt-6">
        <a href="{{ route('jobs.apply', $job->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Apply Now
        </a>
    </div>
</div>
@endsection
