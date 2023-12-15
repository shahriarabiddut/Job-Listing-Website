@extends('pages/base')
@section('title', 'Home')
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
        <a href="{{ route('staff.job.create') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block mb-1">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
    <!-- Jobs Start -->
    @include('../pages/layouts/jobs')
    <!-- Jobs End --> 
</div>
<!-- Jobs End -->

@endsection

 