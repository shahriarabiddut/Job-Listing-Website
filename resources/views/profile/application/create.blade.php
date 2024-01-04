@extends('pages/base')
@section('title', 'Apply for Job | USer')
@section('content')



    <!-- DataTales Example -->
    <div class="card shadow m-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">Application Form for Job </h1>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('user.application.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Job Title</th>
                        <td>
                            <input readonly name="title" type="text" class="form-control" value="{{ $data->title }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Application</th>
                        <td><textarea name="application" class="form-control" row='5'></textarea></td>
                    </tr>
                    
                    <tr>
                        <th>Upload CV </th>
                        <td><input name="cvData" type="file" ></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            OR
                        </td>
                    </tr>
                    <tr>
                        <th> Online CV Link</th>
                        <td><input name="cvData" type="text" class="form-control" placeholder="Enter CV URL"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="job_id" value="{{ $data->id }}">
                            <input type="hidden" name="status" value="0">
                            <button type="submit" class="btn btn-primary">Apply For Job</button>
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

