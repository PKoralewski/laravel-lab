<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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

    Route::get('/{id}', function ($id) {
        $job = Job::find($id);

        return view('jobs.show', [
            'job' => $job
        ]);
    });

    Route::post('/', function () {
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    });
});


Route::get('/contact', function () {
    return view('contact');
});
