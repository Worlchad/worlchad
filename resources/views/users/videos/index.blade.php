@extends('layouts.app')

@section('title')
My Post
@endsection

@section('content')
<section class="">
    <div class="page-title p-5 ">
        <h1 class="text-center text-primary"><i class="fa fa-camara text-primary"></i>MY VIDEOS</h1>
        <p class="pull-right"><a href="{{route('user.video.form')}}" class="btn btn-primary">Upload new video</a></p>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        {{--<div class="col-md-12 ">
             <div class="search text-center shadow ">
            <form action="" class="form">
                <input type="search" placeholder="Search videos" class="form-input input-block">
            </form>
        </div> --}}
    </div>
    <div class="container">
        <div class="row no-gutters">
            @forelse ($videos as $video)
            <div class="col-md-4 p-2" draggable="true">
                <div class="h-100 card bg-light shadow border-0 " style="position: relative">
                    <a href="{{route('video.single',$video->id)}}" class="cover-link"></a>
                    <h6 class="card-title m-3 text-wrap text-primary">{{$video->title}}</h6>
                    <img class="card-img-top img-fluid" style="height:200px" src="https://img.youtube.com/vi/{{$video->key}}/default.jpg" alt="{{$video->title}}" />

                    <div class="card-title">
                        <p>{{\Illuminate\Support\Str::words($video->description, $limit = 10, $end = '...')}}</p>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="btn-group m-2">
                            <form action="{{route('user.video.delete',$video->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-light text-danger" style="height:50px"><i class="fa fa-trash text-danger"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <div class="text-center col-12">
                <h2 class="p-5 text-center">You don't have any video yet</h2>
            </div>
            @endforelse

        </div>
        {{$videos->links()}}
    </div>



</section>
@endsection