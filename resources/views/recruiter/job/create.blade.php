@extends('pages/base')
@section('title', 'Post a Job | Recruiter')
@section('content')



    <!-- DataTales Example -->
    <div class="card shadow m-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">Post a Job </h1>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('recruiter.job.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Title</th>
                        <td><input required name="title" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><input required name="company" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Company Details</th>
                        <td><textarea name="company_details" class="form-control" row='2'>N/A</textarea></td>
                    </tr>
                    <tr>
                        <th>Company Logo</th>
                        <td><input required name="company_logo" type="file" ></td>
                    </tr>
                    <tr>
                        <th>Requirement</th>
                        <td><textarea name="requirement" class="form-control" row='2'></textarea></td>
                    </tr>
                    <tr>
                        <th>Qualification</th>
                        <td><textarea name="qualification" class="form-control" row='2'>N/A</textarea></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea name="description" class="form-control" row='5'></textarea></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><select required name="category" class="form-control">
                            <option value="1">Marketing</option>
                            <option value="2">Customer Service</option>
                            <option value="3">Human Resource</option>
                            <option value="4">Project Management</option>
                            <option value="5">Business Development</option>
                            <option value="6">Sales & Communication</option>
                            <option value="7">Teaching & Education</option>
                            <option value="8">Design & Creative</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Job Type</th>
                        <td><select required name="job_type" class="form-control">
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td><input required name="job_salary" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Vacancy</th>
                        <td><input required name="vacancy" type="number" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td><input required name="tags" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input required name="location" type="text" class="form-control" placeholder="Enter Location!"></td>
                    </tr>
                    <tr>
                        <th>Deadline</th>
                        <td><input required name="deadline" type="date" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Job Status</th>
                        <td><select required name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Disable</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="recruiter_id" value="{{ Auth::guard('recruiter')->user()->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

