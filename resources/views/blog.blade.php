@extends('layouts.app')

@section('title')
Blog
@endsection

@section('content')
<section class="">
    {{--<div class="page-title p-5 ">
        <h1 class="text-center text-primary"><i class="fa fa-book"></i> BLOG</h1>
    </div>--}}
    <div class="row">
        {{--<div class="col-md-12 ">
             <div class="search text-center shadow ">
            <form action="" class="form">
                <input type="search" placeholder="Search blog" class="form-input input-block">
            </form>
        </div> --}}
    </div>
    <div class="container">
        <div class="row no-gutters">
            @forelse ($blogs as $blog)
            <div class="card border-0 col-md-4 p-2 ">
                <div class="bg-light shadow h-100" style="position: relative">
                    <a href="{{route('blog.post',$blog->slug)}}" class="cover-link"></a>
                    <h6 class="card-title m-3 text-wrap text-primary">{{$blog->title}}</h6>
                    <img src="{{asset('/uploads/blog/'.$blog->image)}}" class="card-img-top img-fluid" style="height:200px" alt="{{$blog->title}}">
                    <div class="card-body">
                        <p>{{\Illuminate\Support\Str::words(strip_tags($blog->content), $limit = 10, $end = '...')}}</p>
                        {{-- <small class="card-text">{{$blog->blogable->name}} | {{$blog->created_at}}</small>--}}
                    </div>
                </div>

            </div>
            @empty
            <div class="text-center col-12">
                <h2 class="p-5 text-center">No Post Available</h2>
                <p><a href="{{url('/')}}">back to home</a></p>
            </div>
            @endforelse

        </div>
        {{$blogs->links()}}
    </div>



</section>
@endsection