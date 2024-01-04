<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recruiter_id = Auth::guard('recruiter')->user()->id;
        $jobs = Job::all()->where('recruiter_id', $recruiter_id);
        $delete = 1;
        $data = [];
        // Check with Deadline
        $today = Carbon::now(); // get current date and time
        $todayDate = $today->setTimezone('GMT+6')->format('Y-m-d');
        foreach ($jobs as $job) {
            if ($todayDate <= $job->deadline) {
                $data[] = $job;
            }
        }
        //
        return view('recruiter.job.index', ['data' => $data, 'delete' => $delete]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view('recruiter.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required',
            'title' => 'required',
            'company' => 'required',
            'company_logo' => 'required',
            'requirement' => 'required',
            'qualification' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'job_salary' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
            'status' => 'required',
        ]);
        //Data save to Database 
        $data = new Job();
        $data->recruiter_id = $request->recruiter_id;
        $data->title = $request->title;
        $data->vacancy = $request->vacancy;
        $data->company = $request->company;
        $data->company_details = $request->company_details;
        $data->vacancy = $request->vacancy;
        $data->requirement = $request->requirement;
        $data->qualification = $request->qualification;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->job_salary = $request->job_salary;
        $data->job_type = $request->job_type;
        $data->tags = $request->tags;
        $data->location = $request->location;
        $data->deadline = $request->deadline;
        $data->status = $request->status;

        //If user Gieven any PHOTO
        if ($request->hasFile('company_logo')) {
            $data->company_logo = $request->file('company_logo')->store('CompanyLogo', 'public');
        }
        //
        $data->save();
        //Data Saved
        return redirect()->route('recruiter.job.index')->with('success', 'Job Posted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $recruiter_id = Auth::guard('recruiter')->user()->id;
        $data = Job::find($id);
        if ($data == null || $data->recruiter_id != $recruiter_id) {
            return redirect()->route('recruiter.job.index')->with('danger', 'Not Found!');
        }
        return view('recruiter.job.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Job::find($id);
        $request->validate([
            'recruiter_id' => 'required',
            'title' => 'required',
            'company' => 'required',
            'qualification' => 'required',
            'requirement' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'job_salary' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
            'status' => 'required',
        ]);
        $data->recruiter_id = $request->recruiter_id;
        $data->title = $request->title;
        $data->vacancy = $request->vacancy;
        $data->company = $request->company;
        $data->company_details = $request->company_details;
        $data->vacancy = $request->vacancy;
        $data->requirement = $request->requirement;
        $data->qualification = $request->qualification;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->job_salary = $request->job_salary;
        $data->job_type = $request->job_type;
        $data->tags = $request->tags;
        $data->location = $request->location;
        $data->deadline = $request->deadline;
        $data->status = $request->status;

        //If user Gieven any PHOTO
        if ($request->hasFile('company_logo')) {
            $data->company_logo = $request->file('company_logo')->store('CompanyLogo', 'public');
        } else {
            $data->company_logo = $request->prev_logo;
        }
        //
        $data->save();

        return redirect()->route('recruiter.job.index')->with('success', 'Job Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recruiter_id = Auth::guard('recruiter')->user()->id;
        $job = Job::all()->where('recruiter_id', '=', $recruiter_id)->where('id', '=', $id)->first();
        // Check with Deadline
        $today = Carbon::now(); // get current date and time
        $todayDate = $today->setTimezone('GMT+6')->format('Y-m-d');
        if ($todayDate >= $job->deadline) {
            return redirect()->route('recruiter.job.index')->with('danger', 'Job Cant be Deleted! Contact Admin!');
        }
        //
        $job->delete();
        return redirect()->route('recruiter.job.index')->with('danger', 'Job Deleted Successfully!');
    }
}
