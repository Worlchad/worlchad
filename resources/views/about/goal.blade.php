@extends('layouts.app')

@section('title')
Our Focus
@endsection
@section('page_styles')
<style>
    div.img-background {
        background-image: url('{{asset('assets/img/gallery/img9.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        min-height: 300px;
    }

    div.img-background ul {
        list-style: none;
    }
</style>
@endsection
@section('content')
<section class="container-fluid p-5 bg-light">
    {{--<div class="img-background">
        <div class="cover"></div>
        <div class="content">
            <h1 class="h2">Our Goal</h1>
            <h4>We are focused on human development, empowering and reforming talented people into great icons who will transform the world socially, culturally, economically and politically</h4>
        </div>
    </div>--}}

    <div class="container shadow-sm p-5 ">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/img/gallery/img9.jpg')}}" alt="mission" class="img-fluid img-circle">
            </div>
            <div class="col-md-6 text-center text-primary">
                <h1 class="h2">Our Goal</h1>
                <h4 class="mt-4">We are focused on human development, empowering and reforming talented people into great icons who will transform the world socially, culturally, economically and politically</h4>
            </div>
        </div>
    </div>
</section>

@endsection