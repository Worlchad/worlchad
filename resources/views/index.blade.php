@extends('layouts.app')

@section('page_styles')

<!--owl carousel css -->
<link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" media="all" />
<link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.theme.default.min.css')}}" media="all" />
@endsection
@section('title')
Home
@endsection
@section('content')
<!-- <section class="slide">
    <div>
    <img src="{{asset('/assets/img/event/teenscup.jpg')}}" alt="" style="width:100%;height:100%">
    </div>
</section> -->

<div class="">
  <!-- <div class="row">
    <div class="col-md-12"> -->
  <div id="owl-demo" class="owl-carousel owl-theme" style="z-index:-100">

    <div class="item"><img src="{{asset('assets/img/gallery/img5.jpg')}}" alt="worlchad"></div>
    <div class="item"><img src="{{asset('assets/img/gallery/img2.jpg')}}" alt="worlchad"></div>
    <div class="item"><img src="{{asset('assets/img/gallery/img3.jpg')}}" alt="worlchad"></div>

  </div>
  <!-- </div>
  </div> -->
</div>

{{-- <section class="events-slide">
    <div class="single-event">
        <div class="img">
            <img src="./images/event-img-1.jpg" alt="">
        </div>
        <div class="event-card-body">
                <h2 class="event-title">National Sport Festival</h2>
            <div>
                <div class="date ev">
                    <h3>Date</h3>
                    <p >29th oct 2019</p>
                </div>
                <div class="venue ev">
                    <h3>Venue</h3>
                    <p >Ibom Hall Ground</p>
                </div>
            </div>
            <a href="#" class="btn btn-primary">Register Now</a>
        </div>
    </div>
</section> 

<section class="scroll container">
  <marquee behavior="" direction="">
    <h4 class="text-primary">***We are focused on human development***We empower talented people to transform the world***Upload 1 minute Video of your talent for free***Register now for Worlchad Teens Cup 2019***#TransformTheWorld</h4>
  </marquee>
</section>
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="section-title ">Latest Videos </h2>
      <div class="videos">
        <div class="row no-gutters">
          @foreach ($videos as $video)
          <div class="col-md-4">
            <div class="video-card shadow-sm m-2" draggable="true">
              <a href="{{route('video.single',$video->id)}}">
<div class="close"><i class="fa fa-times ml-auto"></i></div>
<img style="width:100%;height:150px" src="{{$video->link.'.jpg'}}" />
<source src="{{$video->link}}" type="video/mp4">
Your browser does not support the video tag.
</img>

<div class="card-title">
  <h6> {{$video->title}}</h6>
  <div><small class="text-secondary">{{$video->user->name}} | {{$video->created_at}}</small></div>
</div>
</a>
</div>
</div>
@endforeach
</div>
</div>
</div>

</div>
</section>
<!-- ==== Video Listing end ===== -->

<section class="container-fluid  gallery bg-light">
  <div class="container p-5">
    <div>
      <h2 class="section-title text-white"><i class="fa fa-camera text-white"></i> Gallery</h2>
    </div>

    <div>
      <div class=" ">
        <div class="owl-carousel owl-theme" id="img-wheel">
          @for($i=1;$i < 20; $i++) <div class="item">
            <img class="card-img-top" src="{{asset('assets/img/gallery/img'.$i.'.jpg')}}" alt="">
        </div>
        @endfor

      </div>
    </div>
  </div>
  </div>
</section>
<section class="container mt-5 mb-5 -support">
  <div class="row">
    <div class="col-md-6 text-center ">
      <div class="pt-5">
        <h3>Your Support will help empower talented people to transform the world</h3><br>
        <a href="{{route('support.us')}}" class="btn btn-primary">Support Us</a>

      </div>
    </div>
    <div class="col-md-6">
      <img class="card-img-top img-round" src="{{asset('assets/img/gallery/img9.jpg')}}" alt="">

    </div>
  </div>
</section>
<section class="container-fluid bg-light">
  <div class="container">
    <div class="row text-center text-white">
      <div class="col-md-4">
        <h2 class=" text-primary p-5"><i class="fa fa-baseball-ball  text-primary"></i> Sports</h2>
      </div>
      <div class="col-md-4">
        <h2 class=" text-primary p-5"><i class="fa fa-music  text-primary"></i> Music</h2>
      </div>
      <div class="col-md-4">
        <h2 class=" text-primary p-5"><i class="fa fa-car  text-primary"></i> Tech</h2>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid h-support ">
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-6">
        <img class="card-img-top rounded" src="{{asset('assets/img/gallery/winning.jpg')}}" alt="">

      </div>
      <div class="col-md-6 ">
        <div class="pt-5 justify-content-center">
          <h2>Got a Talent to Show us?</h2>
          <a href="{{route('video.upload.form')}}" class="btn btn-primary">Upload your Talent Video Now</a>

        </div>
      </div>

    </div>
  </div>
</section>
<section class="support-home">
  <h3>Your Support will help empower talented people to transform the world</h3><br>
  <a href="{{route('support.us')}}" class="btn btn-success">Support Us</a>
</section>
<section class="upload-video text-center">
  <h2>Got a Talent to Show us?</h2>
  <a href="{{route('video.upload.form')}}" class="btn btn-info">Upload your Talent Video Now</a>
</section>
<section class="container">
  <h2 class="section-title">Latest Posts</h2>
  <div class="row">
    @foreach ($blogs as $blog)
    <div class="card col-md-4 m-2 p-0">
      <img src="{{asset('/uploads/blog/'.$blog->image)}}" class="card-img-top img-fluid" style="height:200px" alt="{{$blog->title}}">
      <div class="card-body">
        <a href="{{route('blog.post',$blog->slug)}}" class="">
          <h5 class="card-title">{{$blog->title}}</h5>
        </a>
        <p class="card-text">{{$blog->blogable->name}} | {{$blog->created_at}}</p>
      </div>
    </div>
    @endforeach
  </div>
  --}}
</section>
<section class="container-fluid bg-light">
  <section class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          @foreach($data as $dt)
          @if($dt instanceof \App\Models\Video)
          <div class="card border-0 col-md-6 p-2" draggable="true">
            <div class="bg-light shadow h-100" style="position: relative">
              <a href="{{route('video.single',$dt->id)}}" class="cover-link"></a>
              <h6 class="card-title m-3 text-wrap text-primary">{{$dt->title}}</h6>
              <img class="card-img-top img-fluid" style="height:200px" src="https://img.youtube.com/vi/{{$dt->key}}/default.jpg" alt="{{$dt->title}}" />

              <div class="card-title">
                <p>{{\Illuminate\Support\Str::words($dt->description, $limit = 10, $end = '...')}}</p>
              </div>
            </div>
          </div>
          @elseif($dt instanceof \App\Models\Blog)
          <div class="card border-0 col-md-6 p-2 ">
            <div class="bg-light shadow h-100" style="position: relative">
              <a href="{{route('blog.post',$dt->slug)}}" class="cover-link"></a>
              <h6 class="card-title m-3 text-wrap text-primary">{{$dt->title}}</h6>
              <img src="{{asset('/uploads/blog/'.$dt->image)}}" class="card-img-top img-fluid" style="height:200px" alt="{{$dt->title}}">
              <div class="card-body">
                <p>{{\Illuminate\Support\Str::words(strip_tags($dt->content), $limit = 10, $end = '...')}}</p>
                {{-- <small class="card-text">{{$dt->blogable->name}} | {{$blog->created_at}}</small>--}}
              </div>
            </div>

          </div>

          @endif
          @endforeach
        </div>
        <div class="">
          {!!$data->links!!}
        </div>

      </div>
      <div class="col-md-3 bg-primary p-0">
        <h6 class="text-white p-1">Older Post</h6>
        @foreach($older_post as $post)
        <div class="card border-0 m-2 p-1"><a href="{{route('blog.post',$post->slug)}}">
            <div class="row">
              <div class="col-3">
                <img src="{{asset('/uploads/blog/'.$post->image)}}" class="card-img-left img-fluid" alt="{{$post->title}}">
              </div>

              <div class="col-8">
                <small class="card-title m-3 text-wrap">{{\Illuminate\Support\Str::words($post->title, $limit = 10, $end = '...')}}</small>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

</section>

@endsection
@section("page_scripts")
<script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

<!--owl-->
<script src="{{asset('assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
<script>
  $(document).ready(function() {
    var owl = $('#img-wheel');
    owl.owlCarousel({
      loop: false,
      autoWidth: true,
      margin: 10,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        960: {
          items: 3
        },
        1200: {
          items: 3
        }
      }
    });
    owl.on('mousewheel', '.owl-stage', function(e) {
      if (e.deltaY > 0) {
        owl.trigger('next.owl');
      } else {
        owl.trigger('prev.owl');
      }
      e.preventDefault();
    });
  });

  $(document).ready(function() {

    $("#owl-demo").owlCarousel({

      slideSpeed: 300,
      paginationSpeed: 400,
      items: 1,
      itemsDesktop: false,
      itemsDesktopSmall: true,
      itemsTablet: false,
      itemsMobile: false,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      loop: true

    });

  });
</script>

@endsection