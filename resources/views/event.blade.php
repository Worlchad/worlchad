@extends('layouts.app')

@section('title')
Events
@endsection

@section('content')

<section class="container">
    <h2 class="text-primary text-center mt-5"><i class="fa fa-calendar text-primary"></i> Upcoming Events</h2>

    <div class="events mt-5">
        @forelse ($events as $event)
        <div class="single-event">
            <div class="img">
                <img src="{{$event->image !=''?'/uploads/events/images/'.$event->image:'assets/img/event/event-img-1.jpg'}}" class="img-fluid" alt="Upcoming Event">
            </div>
            <div class="event-card-body">
                    <a href="{{route('event.single',['id'=>$event->slug])}}"><h2 class="event-title">{{$event->name}}</h2></a>
                <div>
                    <div class="date ev">
                        <h3>Date</h3>
                        <p >29th oct 2019</p>
                    </div>
                    <div class="venue ev">
                        <h3>Venue</h3>
                        <p >{{$event->venue}}</p>
                    </div>
                </div>
            @if($event->status =='open')
            <a href="{{route('event.register',$event->slug)}}" class="btn btn-primary">Register Now</a>
            @else
            <h3 class="text-danger">Registration has been closed</h3>
            @endif
            </div>
        </div>
        @empty
        <h3 class="text-center p-5">No Event Available at the Moment</h3>

        @endforelse


    </div>
    {{-- <div class="pagination">
        <ul>
            <li class="pagination-link"><a href="">Prev</a></li>
            <li class="pagination-link active">1</li>
            <li class="pagination-link"><a href="">2</a></li>
            <li class="pagination-link"><a href="">3</a></li>
            <li class="pagination-link"><a href="">4</a></li>
            <li class="pagination-link"><a href="">Next</a></li>
        </ul>
    </div> --}}
</section>

@endsection
