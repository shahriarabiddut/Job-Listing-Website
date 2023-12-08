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
        return view('staff.job.index', ['data' => $data]);
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
        ]);
        //If user Gieven any PHOTO
        if ($request->hasFile('company_logo')) {
            $data->company_logo = $request->file('company_logo')->store('CompanyLogo', 'public');
        }
        //Data save to Database 
        $data = new Job();
        $data->staff_id = $request->staff_id;
        $data->title = $request->title;
        $data->company = $request->company;
        $data->requirement = $request->requirement;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->job_salary = $request->job_salary;
        $data->job_type = $request->job_type;
        $data->tags = $request->tags;
        $data->location = $request->location;
        $data->deadline = $request->deadline;
        $data->status = 1;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
