<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Department;

use Carbon\Carbon;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //
    public function index()
    {
        $data = Recruiter::all();
        return view('admin.recruiter.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departs = Department::all();
        return view('admin.recruiter.create', ['departs' => $departs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Recruiter;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:recruiter|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
            'name' => 'required',
            'department_id' => 'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amount' => 'required',
            'photo' => 'required',
        ]);
        $imgpath = $request->file('photo')->store('RecruiterPhoto', 'public');

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->department_id = $request->department_id;
        $data->photo = $imgpath;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;

        $data->save();

        return redirect('admin/recruiter')->with('success', 'Recruiter Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Recruiter::find($id);
        return view('admin.recruiter.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $departs = Department::all();
        $data = Recruiter::find($id);
        return view('admin.recruiter.edit', ['data' => $data, 'departs' => $departs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Recruiter::find($id);
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amount' => 'required',
        ]);

        $data->name = $request->name;
        $data->department_id = $request->department_id;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;
        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $imgpath = $request->file('photo')->store('RecruiterPhoto', 'public');
        } else {
            $imgpath = $request->prev_photo;
        }
        $data->photo = $imgpath;
        $data->save();

        return redirect('admin/recruiter')->with('success', 'Recruiter Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Recruiter::find($id);
        $data->delete();
        return redirect('admin/recruiter')->with('danger', 'Data has been deleted Successfully!');
    }

    public function change(string $id)
    {
        //
        $departs = Department::all();
        $data = Recruiter::find($id);
        return view('admin.recruiter.change', ['data' => $data, 'departs' => $departs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function changeUpdate(Request $request, $id)
    {
        //
        $data = Recruiter::find($id);
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect('admin/recruiter')->with('success', 'Recruiter Email & Password has been updated Successfully!');
    }
}
