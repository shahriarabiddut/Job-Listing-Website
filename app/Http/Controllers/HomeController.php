<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Job::all();
        $delete = 0;
        return view('pages.home', ['data' => $data, 'delete' => $delete]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function jobdetails(string $id)
    {
        //
        $jobs = Job::find($id);
        return view('pages.jobdetail', ['jobs' => $jobs]);
    }

    public function jobs()
    {
        //
        $jobs = Job::all();
        $delete = 0;
        $data = [];
        // Check with Deadline
        $today = Carbon::now(); // get current date and time
        $todayDate = $today->setTimezone('GMT+6')->format('Y-m-d');
        foreach ($jobs as $job) {
            if ($todayDate <= $job->deadline && $job->status == 1) {
                $data[] = $job;
            }
        }
        //
        return view('pages.jobs', ['data' => $data, 'delete' => $delete]);
    }
    /**
     * Display the specified resource.
     */
    public function jobSearch(string $id)
    {
        //
        //
        $jobs = Job::all()->where('category', $id);
        $delete = 0;
        $data = [];
        // Check with Deadline
        $today = Carbon::now(); // get current date and time
        $todayDate = $today->setTimezone('GMT+6')->format('Y-m-d');
        foreach ($jobs as $job) {
            if ($todayDate <= $job->deadline && $job->status == 1) {
                $data[] = $job;
            }
        }
        //
        return view('pages.jobs', ['data' => $data, 'delete' => $delete]);
    }

    public function jobSearchHome(Request $request)
    {
        //
        if ($request->keyword == null && $request->location == null && $request->category != null) {
            return redirect()->route('jobSearch', $request->category);
        }
    }
}
