@extends('pages/base')
@section('title', 'Application Details')
@section('content')

@if ($data!=null)
 <!-- Job Detail Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $data->job->title }}</h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $data->job->location }}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if ($data->job->job_type=='full_time') Full Time @else Part Time @endif</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $data->job->job_salary }} </span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Application</h4>
                    <p>{{ $data->application }}</p>
                    <h4 class="mb-3">CV</h4>
                    <p>
                        @if ($cvData==1)
                        <a href="{{ asset('storage/'.$data->cvData) }}">View CV</a>
                        @else
                        <a href="{{ $data->cvData }}">View CV</a>
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-lg-4 ">
                
                <div class="bg-light rounded p-3 mb-2 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Applicant Detail</h4>
                    <h6 class="mb-4">{{ $data->user->name }}</h6>
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

 