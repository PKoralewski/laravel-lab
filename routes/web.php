<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::group(['prefix' => '/jobs',], function () {
    Route::get('/', function () {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    });

    Route::get('/create', function () {
        return view('jobs.create');
    });

    Route::get('/{job}', function (Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    });

    Route::get('/{job}/edit', function (Job $job) {
        return view('jobs.edit', [
            'job' => $job
        ]);
    });

    Route::patch('/{job}', function (Job $job) {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect("/jobs/{$job->id}");
    });

    Route::delete('/{job}', function (Job $job) {
        $job->delete();

        return redirect("/jobs");
    });

    Route::post('/', function () {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    });
});
