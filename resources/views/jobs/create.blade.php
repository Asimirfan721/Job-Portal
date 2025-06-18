<!-- resources/views/jobs/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Post a New Job</h2>

    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Job Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
<div class="mb-4">
    <label class="block text-gray-700">Category</label>
    <select name="category_id" class="w-full border rounded px-3 py-2" required>
        <option value="1">SQA</option>
        <option value="2">DEVELOPMENT</option>
        <option value="3">PYTHON</option>
        <option value="4">CYBER</option>
    </select>
</div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Post Job</button>
    </form>
</div>
@endsection
