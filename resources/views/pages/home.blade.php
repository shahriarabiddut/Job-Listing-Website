@extends('pages/base')
@section('title', 'Home')
@section('content')
<!-- Carousel Start -->
@include('../pages/layouts/carousel')
<!-- Carousel End -->
<!-- Search Start -->
@include('../pages/layouts/search')
<!-- Search End -->

<!-- Category Start -->
@include('../pages/layouts/category')
<!-- Category End -->

<!-- About Start -->
@include('../pages/layouts/about')
<!-- About End -->

<!-- Jobs Start -->
@include('../pages/layouts/jobs')
<!-- Jobs End -->

{{-- <!-- Testimonial Start -->
@include('../pages/layouts/testimonial')
<!-- Testimonial End --> --}}

@endsection

 