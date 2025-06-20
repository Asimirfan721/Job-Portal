<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Category; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application; // Assuming you have an Application model
 

class JobController extends Controller
{
    public function create()
{
    $categories = Category::all();
    $jobs = Job::with('user', 'category')->latest()->get();
    return view('jobs.create', compact('categories'));
}

public function store(Request $request)
{
     
 
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
         
    ]);

    Job::create([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id,
         'user_id' => Auth::id(), // ✅ Save employer ID
    ]);

   return redirect('/')->with('success', 'Job Posted Successfully!');

}
public function destroy(Job $job)
{
    $user = Auth::user();

    // Admins can delete any job
    if ($user->role === 'admin') {
        $job->delete();
        return redirect('/')->with('success', 'Job deleted by admin.');
    }

    // Employers can only delete their own jobs
    if ($user->role === 'employer' && $job->user_id === $user->id) {
        $job->delete();
        return redirect('/')->with('success', 'Job deleted.');
    }

    abort(403, 'Unauthorized action.');
}
public function show($id)
{
    $job = Job::with('category')->findOrFail($id);
    return view('jobs.show', compact('job'));
}

public function apply($id)
{
    $job = Job::findOrFail($id);
    return view('jobs.apply', compact('job'));
}
public function submitApplication(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        'expected_salary' => 'nullable|numeric',
        'previous_salary' => 'nullable|numeric',
        'experience_months' => 'nullable|integer',
        'reason_to_switch' => 'nullable|string',
    ]);

    $resumePath = $request->file('resume')->store('resumes', 'public');

    Application::create([
        'job_id' => $id,
         'user_id' => Auth::id(), // save current user's ID
        'name' => $request->name,
        'email' => $request->email,
        'resume' => $resumePath,
        'expected_salary' => $request->expected_salary,
        'previous_salary' => $request->previous_salary,
        'experience_months' => $request->experience_months,
        'reason_to_switch' => $request->reason_to_switch,
    ]);

    return back()->with('success', 'Application submitted successfully!');
}


public function myApplications()
{
    $applications = Application::with('job')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('applications.mine', compact('applications'));
}

}
