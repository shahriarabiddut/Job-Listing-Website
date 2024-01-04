<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $data = Application::all()->where('user_id', $user_id);
        return view('profile.application.index', ['data' => $data]);
    }
    public function apply(string $id)
    {
        //
        $user_id = Auth::user()->id;
        $data = Job::all()->where('id', $id)->first();
        $data2 = Application::all()->where('user_id', $user_id)->where('job_id', $data->id)->first();
        if ($data2 != null) {
            return redirect()->route('user.application.index')->with('danger', 'Allready Applied!');
        }
        return view('profile.application.create', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        $data2 = Application::all()->where('user_id', $user_id)->where('job_id', $request->job_id)->first();
        if ($data2 != null) {
            return redirect()->route('user.application.index')->with('danger', 'Allready Applied!');
        }
        $request->validate([
            'user_id' => 'required',
            'job_id' => 'required',
            'status' => 'required',
            'application' => 'required',
        ]);
        //Data save to Database 
        $data = new Application();
        $data->user_id = $request->user_id;
        $data->job_id = $request->job_id;
        $data->status = $request->status;
        $data->application = $request->application;

        //If user Gieven any PHOTO
        if ($request->hasFile('cvData')) {
            $data->cvData = $request->file('cvData')->store('cvData', 'public');
        } elseif ($request->has('cvData')) {
            $data->cvData = $request->cvData;
        } else {
            $data->cvData = 'No Data';
        }
        //
        $data->save();
        //Data Saved
        return redirect()->route('user.application.index')->with('success', 'Job Application Submitted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Application::find($id);
        if (strpos($data->cvData, 'cvData/') !== false) {
            $cvData = 1;
        } else {
            $cvData = 0;
        }
        return view('profile.application.show', ['data' => $data, 'cvData' => $cvData]);
    }
    public function showRecruiter(string $id)
    {
        //
        $data = Application::find($id);
        if (strpos($data->cvData, 'cvData/') !== false) {
            $cvData = 1;
        } else {
            $cvData = 0;
        }
        return view('pages.application', ['data' => $data, 'cvData' => $cvData]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $data = Application::find($id);
        if ($data == null) {
            return redirect()->route('user.application.index')->with('danger', 'Application Not Found!');
        }
        //
        $data->delete();
        return redirect()->route('user.application.index')->with('danger', 'Application Deleted Successfully!');
    }
}
