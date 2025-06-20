<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::latest()->get(); // You can also use paginate()
      $jobs = Job::with('category')->latest()->get(); // important: with('category')
    return view('welcome', compact('jobs'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
  Route::post('/jobs/{id}/apply', [JobController::class, 'submitApplication'])->name('applications.submit');
  Route::get('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');

  
});
Route::get('/my-applications', [JobController::class, 'myApplications'])->middleware('auth')->name('applications.mine');

 
 

// Admin and Employer
Route::middleware(['auth', 'role:admin,employer'])->group(function () {
    Route::get('/post-job', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/post-job', [JobController::class, 'store'])->name('jobs.store');
});

 


require __DIR__.'/auth.php';
