@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-blue-50 py-12 px-4">
    <div class="w-full max-w-xl bg-white/90 rounded-2xl shadow-xl p-8 border border-indigo-100">
        <h2 class="text-2xl font-extrabold text-indigo-800 mb-6">Apply for: {{ $job->title }}</h2>

        <form method="POST" action="{{ route('applications.submit', $job->id) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Your Name</label>
                <input type="text" name="name" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Resume (PDF, DOC, etc.)</label>
                <input type="file" name="resume" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white" required>
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Expected Salary</label>
                <input type="number" name="expected_salary" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" placeholder="e.g. 50000">
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Previous Salary</label>
                <input type="number" name="previous_salary" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" placeholder="e.g. 40000">
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Experience (in months)</label>
                <input type="number" name="experience_months" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" placeholder="e.g. 24">
            </div>

            <div>
                <label class="block text-indigo-700 font-semibold mb-1">Why do you want to switch?</label>
                <textarea name="reason_to_switch" rows="3" class="w-full border border-indigo-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" placeholder="Share your reason"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-400 text-white px-6 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-blue-500 transition">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
