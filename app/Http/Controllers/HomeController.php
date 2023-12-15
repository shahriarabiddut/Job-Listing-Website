<?php

namespace App\Http\Controllers;

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
        $data = Job::all();
        $delete = 0;
        return view('pages.jobs', ['data' => $data, 'delete' => $delete]);
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
