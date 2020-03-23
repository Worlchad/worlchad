@extends('layouts.app')

@section('title')
My Post
@endsection

@section('content')
<section class="">
    <div class="page-title p-5 ">
        <h1 class="text-center text-primary"><i class="fa fa-book text-primary"></i>MY POSTS</h1>
        <p class="float-right"><a href="{{route('user.post.new')}}" class="btn btn-primary">Create Post</a></p>
        <div class="clearfix"></div>
    </div>
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
            <div class="col-md-4 p-2 ">
                <div class=" card border-0  bg-light shadow h-100" style="position: relative">
                    <a href="{{route('blog.post',$blog->slug)}}" class="cover-link"></a>
                    <h6 class="card-title m-3 text-wrap text-primary">{{$blog->title}}</h6>
                    <img src="{{asset('/uploads/blog/'.$blog->image)}}" class="card-img-top img-fluid" style="height:200px" alt="{{$blog->title}}">
                    <div class="card-body text-wrap">
                        <p>{{\Illuminate\Support\Str::words(strip_tags($blog->content), $limit = 10, $end = '...')}}</p>
                        {{-- <small class="card-text">{{$blog->blogable->name}} | {{$blog->created_at}}</small>--}}
                    </div>
                    <div class="card-footer bg-light">
                        <div class="btn-group m-2">
                            <a href="{{route('user.post.edit',$blog->id)}}" class="btn text-primary"><i class="fa fa-trash text-primary"></i> Edit</a>
                            <form action="{{route('user.post.delete',$blog->id)}}" method="post">
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
                <h2 class="p-5 text-center">You have not made any post yet</h2>
            </div>
            @endforelse

        </div>
        {{$blogs->links()}}
    </div>



</section>
@endsection