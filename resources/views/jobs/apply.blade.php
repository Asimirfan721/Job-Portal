@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow rounded mt-10">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4">Apply for: {{ $job->title }}</h2>

    <form action="{{ route('jobs.submitApplication', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Full Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Upload Resume</label>
            <input type="file" name="resume" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Submit Application</button>
    </form>
</div>
@endsection
