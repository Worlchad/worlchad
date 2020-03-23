@extends('layouts.app')

@section('title')
Event
@endsection

@section('content')
<section class="container">
    <div class="">
        <div class="title">
            <img src="{{asset('uploads/events/banners/'.$event->banner)}}" alt="">
            <h2 class="text-primary">{{$event->name}}</h2>
            <h6>{{$event->description}}</h6>
            @if($event->status =='open')
            <p><a href="{{route('event.register',$event->slug)}}" class="btn btn-primary">Register Now</a></p>
            @else
            <h3 class="text-danger">Registration has been closed</h3>
            @endif
        </div>
        <div class="event-details">
            {!! $event->details!!}
        </div>
    </div>
    <footer class="post-share">
        <div class="share">
            <h4>Share:</h4>
            <nav class="navbar ">
                <div class="btn-group">
                    <a class="btn btn-primary" href="https://web.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook text-white"></i> facebook</a>
                    <a class="btn btn-info" href="https://twitter.com/intent/tweet?text={{url()->current()}}" target="_blank"><i class="fa fa-twitter text-white"></i> twitter</a>
                    <a class="btn btn-success" href="" target="_blank"><i class="fa fa-whatsapp text-white"></i> whatsapp</a>
                    <a class="btn btn-danger" href="" target="_blank"><i class=" fa fa-google text-white"></i> gmail</a>

                </div>
            </nav>
    </footer>
</section>

<!--== Gallery Page Content Start ==-->
{{-- <section id="page-content-wrap">
    <div class="single-event-page-content section-padding">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-event-details">
                        <div class="event-thumbnails">
                            <div class="event-thumbnail-carousel owl-carousel" style="margin-top:-10%">
                                <div class="event-thumb-item event-thumb-img-1" style="background-image:url('{{asset('uploads/events/banners/'.$event->banner)}}')">
<div class="event-meta">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>{{$event->description}}</h3>
                <a class="event-address" href="#"><i class="fa fa-map-marker"></i> {{$event->venue}}, {{$event->city->name}}, {{$event->state->name}}</a>

            </div>
        </div>
        <a href="{{route('event.register',$event->id)}}" class="btn btn-brand btn-join">Register To Attend</a>

    </div>
</div>
</div>
</div>
<div class="event-countdown">
    <div class="event-countdown-counter" data-date="{{$event->start_date}}"></div>
    <p>Remaining</p>
</div>
</div>
<div class="container">
    <h2>About {{$event->name}}</h2>
    <div>{!!$event->details!!}</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section> --}}
<!--== Gallery Page Content End ==-->
@endsection
@section('page_scripts')

@endsection