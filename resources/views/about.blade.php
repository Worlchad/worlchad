@extends('layouts.app')

@section('title')
About Us
@endsection

@section('content')

<!--== Page Title Area Start ==-->
<section id="page-title-area" style="background-image:url('{{asset('/assets/img/slider/slider-img-2.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">About Us</h1>
                    <p>Empowering talented people to transform the world</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->
<!--== Committee Page Content Start ==-->
<section id="page-content-wrap">
<div class="our-honorable-commitee section-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <h4><a href="{{route('about.management')}}">Our Board Of Trustees</a></h4>
                </div>
               
                <div class="col-md-4">
                    <h4><a href="{{route('about.executives')}}">Our Executive</a></h4>
                </div> 
                <div class="col-md-4">
                    <h4><a href="{{route('about.management')}}">Our Management</a></h4>
                </div>
            </div>
            
        </div>
</div>
</section>
<!--== Committee Page Content End ==-->

@endsection