<div class="container">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
            <li class="nav-item">
                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                    <h6 class="mt-n1 mb-0">Featured</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                    <h6 class="mt-n1 mb-0">Full Time</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                    <h6 class="mt-n1 mb-0">Part Time</h6>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                @if ($data!=null)
                
                    @foreach ($data as $jobs)
                    @if ($jobs->job_type!=null)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{$jobs->company_logo ? asset('storage/'.$jobs->company_logo) : url('images/user.png')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $jobs->title }} 
                                    @if ($delete!=0)
                                        @if ($jobs->status==0)
                                        <span class="bg-danger p-1 text-white h6"> ( Disabled ) </span>
                                        @else
                                        <span class="bg-success p-1 text-white h6"> ( Active ) </span>
                                        @endif
                                    @endif
                                    </h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                        @if ($jobs->job_type=='full_time') Full Time @else Part Time @endif
                                    </span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->job_salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary mx-1" href="{{ route('jobdetails',$jobs->id) }}">View</a>
                                    @if ($delete!=0)
                                    <a class="btn btn-warning mx-1" href="{{ route('recruiter.job.edit',$jobs->id) }}"><i class="fa fa-edit mx-1"></i>Edit</a>
                                    <a class="btn btn-danger mx-1" href="{{ route('recruiter.job.delete',$jobs->id) }}"><i class="fa fa-trash mx-1"></i>Delete</a>
                                    @endif
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Aplication Last Date :{{ $jobs->deadline }}</small>
                            </div>
                        </div>
                    </div> 
                    @else
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4 p-2">
                            No Featured Jobs Found! Post A Job!
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                <div class="job-item p-4 mb-4">
                    <div class="row g-4 p-2">
                        No Featured Jobs Found! Post A Job!
                    </div>
                </div>
                @endif
                <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
            </div>
            <div id="tab-2" class="tab-pane fade show p-0">
                @if ($data!=null)
                    @foreach ($data as $jobs)
                    @if ($jobs->job_type=='full_time')
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{$jobs->company_logo ? asset('storage/'.$jobs->company_logo) : url('images/user.png')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $jobs->title }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if ($jobs->job_type=='full_time') Full Time @else Part Time @endif</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->job_salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary mx-1" href="{{ route('jobdetails',$jobs->id) }}">View</a>
                                    @if ($delete!=0)
                                    <a class="btn btn-danger mx-1" href="{{ route('recruiter.job.delete',$jobs->id) }}"><i class="fa fa-trash mx-1"></i>Delete</a>
                                    @endif
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Aplication Last Date :{{ $jobs->deadline }}</small>
                            </div>
                        </div>
                    </div> 
                    @else
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4 p-2">
                            No Full Time Jobs Found! Post A Job!
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                <div class="job-item p-4 mb-4">
                    <div class="row g-4 p-2">
                        No Full Time Jobs Found! Post A Job!
                    </div>
                </div>
                @endif
                <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0">
                @if ($data!=null)
                    @foreach ($data as $jobs)
                    @if ($jobs->job_type=='part_time')
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{$jobs->company_logo ? asset('storage/'.$jobs->company_logo) : url('images/user.png')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $jobs->title }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if ($jobs->job_type=='full_time') Full Time @else Part Time @endif</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->job_salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary mx-1" href="{{ route('jobdetails',$jobs->id) }}">View</a>
                                    @if ($delete!=0)
                                    <a class="btn btn-danger mx-1" href="{{ route('recruiter.job.delete',$jobs->id) }}"><i class="fa fa-trash mx-1"></i>Delete</a>
                                    @endif
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i> Aplication Last Date : {{ $jobs->deadline }}</small>
                            </div>
                        </div>
                    </div> 
                    @else
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4 p-2">
                            No Part Time Jobs Found! Post A Job!
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                <div class="job-item p-4 mb-4">
                    <div class="row g-4 p-2">
                        No Part Time Jobs Found! Post A Job!
                    </div>
                </div>
                @endif
                <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
            </div>
        </div>
    </div>
</div>