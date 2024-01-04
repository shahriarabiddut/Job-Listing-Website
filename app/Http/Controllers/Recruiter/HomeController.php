<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\Recruiter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('recruiter.profile.account', [
            'user' => Auth::guard('recruiter')->user(),
        ]);
    }
    public function view()
    {
        return view('recruiter.layouts.view', [
            'user' => Auth::guard('recruiter')->user(),
        ]);
    }
    public function view2()
    {
        return view('recruiter.profile.account', [
            'user' => Auth::guard('recruiter')->user(),
        ]);
    }
    public function edit()
    {
        return view('recruiter.layouts.edit', [
            'user' => Auth::guard('recruiter')->user(),
        ]);
    }
    public function edit2()
    {
        return view('recruiter.profile.edit', [
            'user' => Auth::guard('recruiter')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = Recruiter::find($request->userid);
        $formFields = $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('RecruiterPhoto', 'public');
        } else {
            $formFields['photo'] = $request->prev_photo;
        }
        $data->name = $request->name;
        $data->bio = $request->bio;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->photo = $formFields['photo'];

        $data->save();
        return Redirect::route('recruiter.profile.view')->with('success', 'Profile Updated');
    }
}
