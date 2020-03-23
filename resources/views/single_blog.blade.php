@extends('layouts.app')

@section('title')
{{$blog->title}}
@endsection
@section('page_styles')
<style>
    .blog-content .img {
        width: 100%;
        height: 300px;
        background-repeat: no-repeat;
        background-image: url("{{asset('uploads/blog/'.$blog->image)}}");
        background-size: cover
    }
</style>
@endsection
@section('content')
{{--<section class="container-fuild">
    <section class="blog-page container ">
        <div class="blog-content pt-4 text-secondary">
            <div>
                <!-- <img src="./images/event-img-1.jpg" alt=""> -->
                <div class="img"></div>
                <h1 class="blog-title">{{$blog->title}}</h1>
</div>
<div class="blog-body text-left mt-4">{!!$blog->content!!}</div>
<div class="share">
    <h4>Share:</h4>
    <nav class="navbar">
        <div class="btn-group">
            <a class="btn btn-primary" href="https://web.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook"></i> facebook</a>
            <a class="btn btn-outline-primary" href="https://twitter.com/intent/tweet?text={{url()->current()}}" target="_blank"><i class="fa fa-twitter"></i> twitter</a>
            <a class="btn btn-success" href="" target="_blank"><i class="fa fa-whatsapp"></i> whatsapp</a>
            <a class="btn btn-outline-danger" href="" target="_blank"><i class=" fa fa-google"></i> gmail</a>

        </div>
    </nav>
</div><br>
<div class="comments">
    <div class="comment-form mb-5 p-4">
        <form action="{{route('comment.store')}}" class="form" method="post">
            @csrf
            <input type="hidden" name="comment_id" value="{{$blog->id}}">
            <input type="hidden" name="comment_type" value="blog">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" value="@auth {{auth()->user()->name }}@endauth">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="@isset(auth()->user()->email)
                            {{auth()->user()->email}}@endisset">
            </div>
            <textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="Your comments here"></textarea>
            <br><button class="btn btn-primary pull-right ">Submit</button><br>
        </form>
    </div>
    <div class="single-comment">
        <p class="author"><i class="fa fa-user"></i> Samfield Hawb</p>
        <p class="comment">this is a great thing to think about</p>
        <p class="time"><i class="fa fa-clock-o"></i> 2 hrs ago</p>
        <button class="btn btn-light pull-right "><i class="fa fa-reply"></i> replies</button>
        <div class="replies">
            <button class="btn-light add-reply btn">reply</button><br><br>

            <div class="reply-form">
                <form action="{{route('reply.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="comment_id" value="">
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="">
                    </div>
                    <textarea name="reply" id="" cols="3" rows="10" class="form-control" style="height:50px;" placeholder="Your comments here"></textarea>
                    <br><button class="btn btn-primary pull-right btn-lg">Submit</button>
                </form>
                <div class="single-reply">
                    <p class="author"><i class="fa fa-user"></i> samfield</p>
                    <p class="reply">what do you mean</p>
                    <p class="time"><i class="fa fa-clock-o"></i> 2 hrs ago</p>
                </div>
                <div class="single-reply">
                    <p class="author"><i class="fa fa-user"></i> samfield</p>
                    <p class="reply">what do you mean</p>
                    <p class="time"><i class="fa fa-clock-o"></i> 2 hrs ago</p>
                </div>
            </div>
        </div>
    </div>
    {{($blog->comments)}}
    <div class="single-comment">
        <p class="author"><i class="fa fa-user"></i> Samfield Hawb</p>
        <p class="comment">this is a great thing to think about</p>
        <p class="time pull-right"><i class="fa fa-clock-o"></i> 2 hrs ago</p><br>
    </div>
</div>
</div>
{{-- <aside class="sidebar text-center">
            <form action="" method="post">
                <input type="search" class="form-control input-block" placeholder="Search...">
            </form>
            <div class="tags">
                <span class="tag active"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
                <span class="tag"><a href="#">Music</a></span>
            </div>
        </aside>

</section>--}}

<!--== Blog Page Content Start ==-->
<div id="page-content-wrap" class="word-wrap">
    <div class="blog-page-content-wrap section-padding word-wrap">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="col-lg-10 ">
                    <article class="single-blog-content-wrap">
                        <header class="article-head">
                            <div class="single-blog-thumb">
                                <img src="{{asset('uploads/blog/'.$blog->image)}}" class="img-fluid" alt="Blog">
                            </div>
                            <div class="single-blog-meta pt-2">
                                <h2 class="text-primary">{{$blog->title}}</h2>
                                <small class="posting-info">
                                    <a class="text-secondary" href="#">{{date('D d F Y',strtotime($blog->created_at))}}</a> • Posted by: <a class="text-secondary" href="#">{{$blog->blogable->name}}</a>
                                </small>
                            </div>
                        </header>
                        <section class="blog-details pt-4">
                            {!!$blog->content!!}
                        </section>
                        <footer class="post-share">
                            <div class="share">
                                <h4>Share:</h4>
                                <nav class="navbar ">
                                    <div class="">
                                        <a class="btn btn-primary" href="https://web.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook text-white"></i> facebook</a>
                                        <a class="btn btn-info" href="https://twitter.com/intent/tweet?text={{url()->current()}}" target="_blank"><i class="fa fa-twitter text-white"></i> twitter</a>
                                        <a class="btn btn-success" href="whatsapp://send?text={{url()->current()}}" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp text-white"></i> whatsapp</a>
                                        <a class="btn btn-danger" href="" target="_blank"><i class=" fa fa-google text-white"></i> gmail</a>

                                    </div>
                                </nav>
                        </footer>
                    </article>
                    <div class="comments-section pt-4 bg-light p-4">
                        <h4 class="text-primary">Comments</h4>
                        <hr class="border-primary">
                        @forelse($blog->comments as $cm)
                        <div class="comment mt-1 mb-2 p-1 ">
                            <p class="author text-primary">
                                <img src="{{$cm->user->avatar}}" alt="{{$cm->user->name}}" class="img-30 rounded-circle"> <span> {{$cm->user->first_name}}</span>
                            </p>
                            <p class="date pull-right">{{date('Y-m-d',strtotime($cm->created_at))}}</p>
                            <p class="body">{{$cm->comment}}</p>
                            <button class="btn text-primary float-right btn-outline-info btn-reply"><i class="fa fa-reply"></i> Replies <span>{{$cm->replies->count()}}</span></button>
                            <div class="clear-fix"></div>
                            <hr class="border-white">
                            <div class="replies bg-white p-4" style="display:none">
                                @if($cm->replies->count()>0)
                                <div class="replies-body">
                                    @foreach($cm->replies as $reply)
                                    <div class="">
                                        <p class="author text-primary">
                                            <img src="{{$cm->user->avatar}}" alt="{{$cm->user->name}}" class="img-30 rounded-circle"> <span> {{$cm->user->first_name}}</span>
                                        </p>
                                        <p class="date pull-right">{{date('Y-m-d',strtotime($reply->created_at))}}</p>
                                        <p class="reply">{{$reply->reply}}</p>
                                        <hr class="border-light">
                                        <div class="clear-fix"></div>
                                    </div>
                                    @endforeach

                                </div>
                                @endif
                                @auth
                                <div class="reply-form mt-2">
                                    <h6>Reply</h6>
                                    <form action="{{route('reply.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{$cm->id}}">
                                        <input type="hidden" name="repliable_id" value="{{auth()->user()->id}}">
                                        <input type="hidden" name="repliable_type" value="{{(!auth()->user()->role_id)?'user':'admin'}}">
                                        <textarea name="reply" id="" cols="30" rows="10" class="form-control" style="height:50px;" placeholder="Your comments here"></textarea>
                                        <br><button class="btn btn-primary pull-right ">Submit</button>
                                        <br>
                                    </form>
                                </div>
                                @else
                                <p class="text-center alert alert-info"><a href="{{route('login')}}">Login to  reply</a></p>
                                        
                                @endauth
                            </div>
                            <!-- <hr> -->
                            <div class="clear-fix"></div>
                        </div>
                        @empty
                        <div class="text-center">
                            <p>No comments made</p>
                        </div>
                        @endforelse
                        @auth

                        <div>
                            <h5 class="text-primary pt-5"> Add Comment </h5>

                            <form action="{{route('comment.store')}}" class="form" method="post">
                                @csrf
                                <input type="hidden" name="commentable_id" value="{{$blog->id}}">
                                <input type="hidden" name="commentable_type" value="blog">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="Your comments here"></textarea>
                                <br><button class="btn btn-primary pull-right">Submit</button> <br>
                            </form>
                        </div>
                        @else
                        <p class="text-center alert alert-info"><a href="{{route('login')}}">Login to drop your comment</a></p>
                        @endauth

                    </div>

                </div>

                <!-- Blog content Area End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4 order-first order-lg-last">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page_scripts')
<script>
    $('.btn-reply').on('click', function() {
        $('.replies').hide();
        $(this).parent().find('.replies').show();
        console.log('hello')
    });
    $('.add-reply').on('click', function() {
        $(this).parent().find('.reply-form').toggle()
    })
</script>
@endsection