<?php

namespace App\Http\Controllers\Staff;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staff_id = Auth::guard('staff')->user()->id;
        $data = Job::all()->where('staff_id', $staff_id);
        $delete = 1;
        return view('staff.job.index', ['data' => $data, 'delete' => $delete]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view('staff.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_id' => 'required',
            'title' => 'required',
            'company' => 'required',
            'company_logo' => 'required',
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
        //Data save to Database 
        $data = new Job();
        $data->staff_id = $request->staff_id;
        $data->title = $request->title;
        $data->vacancy = $request->vacancy;
        $data->company = $request->company;
        $data->company_details = $request->company_details;
        $data->vacancy = $request->vacancy;
        $data->requirement = $request->requirement;
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
        return redirect()->route('staff.job.index')->with('success', 'Job Posted Successfully!');
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
        $data = Job::find($id);
        return view('staff.job.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Job::find($id);
        $request->validate([
            'staff_id' => 'required',
            'title' => 'required',
            'company' => 'required',
            'company_logo' => 'required',
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
        $data->staff_id = $request->staff_id;
        $data->title = $request->title;
        $data->vacancy = $request->vacancy;
        $data->company = $request->company;
        $data->company_details = $request->company_details;
        $data->vacancy = $request->vacancy;
        $data->requirement = $request->requirement;
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

        return redirect()->route('staff.job.index')->with('success', 'Job Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff_id = Auth::guard('staff')->user()->id;
        $job = Job::all()->where('staff_id', '=', $staff_id)->where('id', '=', $id)->first();
        $job->delete();
        return redirect()->route('staff.job.index')->with('danger', 'Job Deleted Successfully!');
    }
}
