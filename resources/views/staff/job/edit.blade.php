@extends('pages/base')
@section('title', 'Post a Job | Recruiter')
@section('content')



    <!-- DataTales Example -->
    <div class="card shadow m-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">Edit Job </h1>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.job.update',$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Status</th>
                        <td><select name="status" class="form-control">
                            <option @if ($data->status==1) @selected(true) @endif value="1">Active</option>
                            <option @if ($data->status==0) @selected(true) @endif value="0">Disable</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><input required name="title" type="text" value="{{ $data->title }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><input required name="company" type="text" value="{{ $data->company }}"class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Company Logo</th>
                        <td><input name="company_logo" type="file">
                            <input name="prev_logo" type="hidden" value="{{ $data->company_logo }}">
                            <img width="100" src="{{$data->company_logo ? asset('storage/'.$data->company_logo) : ''}}" >
                        </td>
                    </tr>
                    <tr>
                        <th>Company Details</th>
                        <td><textarea name="company_details" class="form-control" row='2'>{{ $data->company_details }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Requirement</th>
                        <td><textarea name="requirement" class="form-control" row='2'>{{ $data->requirement }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Qualification</th>
                        <td><textarea name="qualification" class="form-control" row='2'>{{ $data->qualification }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea name="description" class="form-control" row='5'>{{ $data->description }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><select name="category" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Job Type</th>
                        <td><select name="job_type" class="form-control">
                            <option @if ($data->job_type=='full_time') @selected(true) @endif  value="full_time">Full Time</option>
                            <option @if ($data->job_type=='part_time') @selected(true) @endif value="part_time">Part Time</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td><input required name="job_salary" type="text" value="{{ $data->job_salary }}"class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Vacancy</th>
                        <td><input required name="vacancy" type="text" value="{{ $data->vacancy }} class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td><input required name="tags" type="text" value="{{ $data->tags }}"class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input required name="location" type="text" value="{{ $data->location }}"class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Deadline</th>
                        <td><input required name="deadline" type="date" value="{{ $data->deadline }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="staff_id" value="{{ Auth::guard('staff')->user()->id }}">
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

