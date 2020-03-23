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
    min-height:300px;
}
div.img-background ul {
        list-style: none;
    }

    </style>
@endsection
@section('content')
<section class="container-full">
    <div class="img-background">
        <div class="cover"></div>
        <div class="content">
                <h1>OUR CORE IDEOLOGY</h1>   <hr>
                <h2>OUR CORE PURPOSE</h2>

               <h3>"To Transform The World"</h3>  
               <h4>"Talented people are leaders, if reformed are great icons who will transform the world socially, culturally, educationally, economically and politically". - Odeh Jackson John.
</h4> <hr>
            <h2 class="h2">Our Core Values</h2>
           <ul>
               <li><h3>Integrity</h3></li>
               <li><h3>Excellence</h3></li>
               <li><h3>Professionalism</h3></li>
               <li><h3>Transformative evolution.</h3></li>
           </ul>
           <hr>

        </div>
    </div>
</section>

<!--== Committee Page Content End ==-->

@endsection
