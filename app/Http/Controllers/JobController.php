<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class JobController extends Controller
{
    public function create()
{
    $categories = Category::all();
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
    ]);

   return redirect('/')->with('success', 'Job Posted Successfully!');

}
 public function destroy(Job $job)
{
    $job->delete();

    return redirect('/')->with('success', 'Job deleted successfully!');
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
    ]);

    $resumePath = $request->file('resume')->store('resumes');

    // Save to DB or send email — for now, just show success
    return back()->with('success', 'Application submitted successfully!');
}




}
