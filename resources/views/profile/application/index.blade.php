@extends('pages/base')
@section('title', 'My Application')
@section('content')
<!-- Jobs Start -->
<div class="container-xxl py-5">
    <!-- Session Messages Starts -->
    @if(Session::has('success'))
    <div class="p-3 mb-2 bg-success text-white">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if(Session::has('danger'))
    <div class="p-3 mb-2 bg-danger text-white">
        <p>{{ session('danger') }} </p>
    </div>
    @endif
    <div class="container">
        <a href="{{ route('jobs') }}" class="btn btn-primary rounded-0 py-2 my-2 px-lg-5 d-none d-lg-block mb-1">Apply for Jobs<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
    <!-- Jobs Start -->
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Proposal List</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
    
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    @if ($data!=null)
                    
                        @foreach ($data as $application)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{$application->job->company_logo ? asset('storage/'.$application->job->company_logo) : url('images/user.png')}}" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ $application->job->title }} - (Application Date - {{ $application->created_at }} )
                                        </h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $application->job->location }}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                            @if ($application->job->job_type=='full_time') Full Time @else Part Time @endif
                                        </span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $application->job->job_salary }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary mx-1" href="{{ route('user.application.show',$application->id) }}">View</a>
                                        <a class="btn btn-danger mx-1" href="{{ route('user.application.destroy',$application->id) }}">Delete</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Aplication Last Date :{{ $application->job->deadline }}</small>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    @else
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4 p-2">
                            No Featured Jobs Found! Post A Job!
                        </div>
                    </div>
                    @endif
                    <a class="btn btn-primary py-3 px-5" href="">Browse More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End --> 
</div>
<!-- Jobs End -->

@endsection

 