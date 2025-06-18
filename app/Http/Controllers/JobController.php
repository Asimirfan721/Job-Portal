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

    return redirect()->route('dashboard')->with('success', 'Job Posted Successfully!');
}



}
