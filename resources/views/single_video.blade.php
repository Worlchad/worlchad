@extends('layouts.app')

@section('title')
{{$video->title}}
@endsection

@section('content')
<!--== Blog Page Content Start ==-->
<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                {{--<div class="col-lg-4">

                    <div class="sidebar-area-wrap">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar-wrap">
                            <div class="brand-search-form">
                                <form action="https://codeboxr.net/themedemo/unialumni/html/index.html">
                                    <input type="search" placeholder="Type and hit here">
                                    <button type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar-wrap d-none d-lg-block">
                            <h4 class="sidebar-title">Popular Tags</h4>
                            <div class="sidebar-body">
                                <div class="tags">
                                    <a href="#">Bootstrap</a>
                                    <a href="#">Design</a>
                                    <a href="#">web</a>
                                    <a class="active" href="#">custom</a>
                                    <a href="#">wordpres</a>
                                    <a href="#">Art</a>
                                    <a href="#">our team</a>
                                    <a href="#">Classic</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>--}}
                <!-- Sidebar Area End -->

                <!-- Blog content Area Start -->
                <div class="col-lg-12">
                    <article class="single-blog-content-wrap">
                        <header class="article-head">
                            <div class="video-container"><iframe width="853" height="480" src="https://www.youtube.com/embed/{{$video->key}}?autoplay=0&rel=0" frameborder="0" allowfullscreen></iframe></div>


                            <div class="single-blog-meta">
                                <h2 class="bg-dark p-3 text-white">{{$video->title}}</h2>
                                <div class="posting-info">
                                    <a href="#">{{date('d M Y',strtotime($video->created_at))}}</a> • Uploaded by : <a href="#">{{$video->user->name}}</a>
                                </div>
                            </div>
                        </header>
                        <section class="blog-details">
                            {{$video->description}}
                        </section>

                        <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Share:</span>
                                        <nav class="navbar ">
                                            <div class="">
                                                <a class="btn btn-primary" href="https://web.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook text-white"></i> facebook</a>
                                                <a class="btn btn-info" href="https://twitter.com/intent/tweet?text={{url()->current()}}" target="_blank"><i class="fa fa-twitter text-white"></i> twitter</a>
                                                <a class="btn btn-success" href="whatsapp://send?text={{url()->current()}}" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp text-white"></i> whatsapp</a>
                                                <a class="btn btn-danger" href="" target="_blank"><i class=" fa fa-google text-white"></i> gmail</a>

                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="post-like-comm">
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up"></i>20</a> -->
                                        <a href="#"><i class="fa fa-comment-o"></i> {{$video->comments->count()}}</a>
                                    </div>
                                </div>

                            </div>

                        </footer>
                    </article>

                    <div class="comments-section pt-4 bg-light p-4">
                        <h4 class="text-primary">Comments</h4>
                        <hr class="border-primary">
                        @forelse($video->comments as $cm)
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
                                <p class="text-center alert alert-info"><a href="{{route('login')}}">Login to reply</a></p>
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
                                <input type="hidden" name="commentable_id" value="{{$video->id}}">
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
                <!-- video content Area End -->
            </div>
        </div>
    </div>
</div>
<!--== Blog Page Content End ==-->
@endsection
@section('page_scripts')
<script>
    $('.btn-reply').on('click', function() {
        $('.replies').hide();
        $(this).parent().find('.replies').toggle();
    });
</script>
@endsection