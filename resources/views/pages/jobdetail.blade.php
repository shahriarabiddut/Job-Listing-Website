@extends('pages/base')
@section('title', 'Job Details')
@section('content')

@if ($jobs!=null)
 <!-- Job Detail Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    
                    <img width="100" src="{{$jobs->company_logo ? asset('storage/'.$jobs->company_logo) : ''}}" style="width: 80px; height: 80px;">
                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $jobs->title }}</h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if ($jobs->job_type=='full_time') Full Time @else Part Time @endif</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->job_salary }} </span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                    <p>{{ $jobs->description }}</p>
                    <h4 class="mb-3">Requrement</h4>
                    <p>{{ $jobs->requirement }}</p>
                    <h4 class="mb-3">Qualifications</h4>
                    <p>{{ $jobs->qualification }}</p>
                </div>
                @auth('recruiter')
                @if ($jobs->recruiter_id==Auth::guard('recruiter')->user()->id)
                <div class="bg-info rounded p-3 mt-2 text-white wow slideInUp">
                    <h4 class="mb-3 bg-light p-1 text-center">Applications</h4>
                    <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                            <tr class="p-2">
                                <th class="text-white font-weight-bolder">No.</th>
                                <th class="text-white font-weight-bolder">Applicant</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
                                <th class="text-white font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs->application as $key => $application)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $application->created_at }}</td>
                                <td>{{ $application->user->name }}</td>
                                <td><a class="btn btn-primary mx-1" href="{{ route('recruiter.application.showRecruiter',$application->id) }}">View</a>
                                   </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>     
                </div>
                @endif
                @endauth
            </div>

            <div class="col-lg-4 ">
                @auth
                @foreach (Auth::user()->application as $application)
                @if($application->job_id !=$jobs->id)
                <div class="bg-light rounded p-2 mb-1 wow slideInUp text-center" data-wow-delay="0.1s">
                    <h4 class="mb-4 text-center">Apply For Job</h4>
                    <p><a class="btn d-block btn-primary text-center" href="{{ route('user.application.apply',$jobs->id) }}">Apply Now</a></p>
                </div>
                @elseif($application->job_id ==$jobs->id)
                <div class="bg-info rounded p-2 mb-1 wow slideInUp text-center text-white" data-wow-delay="0.1s">
                    Already Applied
                </div>
                @endif
                @endforeach
                @if(count(Auth::user()->application)==0)
                <div class="bg-light rounded p-2 mb-1 wow slideInUp text-center" data-wow-delay="0.1s">
                    <h4 class="mb-4 text-center">Apply For Job</h4>
                    <p><a class="btn d-block btn-primary text-center" href="{{ route('user.application.apply',$jobs->id) }}">Apply Now</a></p>
                </div>
                @endif
                @endauth
                <div class="bg-light rounded p-3 mb-2 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summery</h4>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $jobs->created_at }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $jobs->vacancy }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Application : {{ count($jobs->application) }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: @if ($jobs->job_type=='full_time') Full Time @else Part Time @endif</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $jobs->job_salary }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $jobs->location }}</p>
                    <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: {{ $jobs->deadline }}</p>
                </div>
                <div class="bg-light rounded p-3 mb-2 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Company Detail</h4>
                    <h6 class="mb-4">{{ $jobs->company }}</h6>
                    <p class="m-0">{{ $jobs->company_details }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->
@else
<div class="job-item p-4 mb-4">
    <div class="row g-4 p-2">
        Not Found!
    </div>
</div>
@endif
@endsection

 