@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">My Job Applications</h2>

    @forelse($applications as $app)
        <div class="border-b py-4">
            <h3 class="text-lg font-semibold text-indigo-600">
                {{ $app->job->title ?? 'Deleted Job' }}
            </h3>
            <p class="text-sm text-gray-600">Applied on: {{ $app->created_at->format('d M Y') }}</p>
            <ul class="mt-2 text-sm text-gray-800 space-y-1">
                <li><strong>Your Name:</strong> {{ $app->name }}</li>
                <li><strong>Email:</strong> {{ $app->email }}</li>
                <li><strong>Expected Salary:</strong> {{ $app->expected_salary }}</li>
                <li><strong>Previous Salary:</strong> {{ $app->previous_salary }}</li>
                <li><strong>Experience:</strong> {{ $app->experience_months }} months</li>
                <li><strong>Reason to Switch:</strong> {{ $app->reason_to_switch }}</li>
                <li><strong>Resume:</strong> <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="text-blue-500 underline">View Resume</a></li>
            </ul>
        </div>
    @empty
        <p class="text-gray-600">You haven't applied to any jobs yet.</p>
    @endforelse
</div>
@endsection
