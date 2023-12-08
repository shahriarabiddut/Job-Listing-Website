<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('staff.profile.account', [
            'user' => Auth::guard('staff')->user(),
        ]);
    }
    public function view()
    {
        return view('staff.layouts.view', [
            'user' => Auth::guard('staff')->user(),
        ]);
    }
    public function view2()
    {
        return view('staff.profile.account', [
            'user' => Auth::guard('staff')->user(),
        ]);
    }
    public function edit()
    {
        return view('staff.layouts.edit', [
            'user' => Auth::guard('staff')->user(),
        ]);
    }
    public function edit2()
    {
        return view('staff.profile.edit', [
            'user' => Auth::guard('staff')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = Staff::find($request->userid);
        $formFields = $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('StaffPhoto', 'public');
        } else {
            $formFields['photo'] = $request->prev_photo;
        }
        $data->name = $request->name;
        $data->bio = $request->bio;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->photo = $formFields['photo'];

        $data->save();
        return Redirect::route('staff.profile.view')->with('success', 'Profile Updated');
    }
}
