@extends('layouts.app')
@section('page_styles')
<style>
    div.img-background {
        background-image: url('{{asset('assets/img/gallery/img1.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        min-height: 300px;

    }
</style>
@endsection
@section('title')
Our Mission
@endsection

@section('content')


<section class="container-fluid p-5 bg-light">
   {{-- <div class="img-background">
        <div class="cover"></div>
        <div class="content">
            <h1>Our Mission</h1>
            <h3>Empowering and reforming talented people into great icons to transform the world socially, culturally, economically and politically.</h3>
        </div>
    </div>--}}
    <div class="container shadow-sm p-5 ">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/img/gallery/img1.jpg')}}" alt="mission" class="img-fuild">
            </div>
            <div class="col-md-6 text-center text-primary">
                <h1>Our Mission</h1>
                <h4 class="pt-4">Empowering and reforming talented people into great icons to transform the world socially, culturally, economically and politically.</h4>

            </div>
        </div>
    </div>
</section>

@endsection