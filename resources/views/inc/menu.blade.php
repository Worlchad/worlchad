<header id="main-header" class=" bg-primary ">
    {{-- <div class="container-full">
        <a href="{{url('/')}}" class="logo"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
        <nav>
            <div class="menu-bar">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
           <ul class="nav">
                <li  class="{{url()->current()==url('/')?'active':''}}"><a href="{{url('/')}}">Home</a></li>
            <li class="dropdown"><a class="dropdown-label">About</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('about.mission')}}">Our Mision</a></li>
                    <li><a href="{{route('about.vision')}}">Our Vision</a></li>
                    <li><a href="{{route('about.goal')}}">Our Goal</a></li>
                    <li><a href="{{route('about.corevalues')}}">Our Core Values</a></li>
                    <li class="l2"><a>Our Team</a>
                        <ul>
                            <li><a href="{{route('about.trustees')}}">Board of Trustees</a></li>
                            <li><a href="{{route('about.management')}}">Managements</a></li>
                            <li><a href="{{route('about.executives')}}">Executives</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{url()->current()==route('event.participation.form')?'active':''}}"><a href="{{route('event.participation.form')}}">Registration</a></li>
            <li class="{{url()->current()==route('event')?'active':''}}"><a href="{{route('event')}}">Events</a></li>
            <li class="{{url()->current()==route('blog')?'active':''}}"><a href="{{route('blog')}}">Blog</a></li>
            <li class="{{url()->current()==route('contact')?'active':''}}"><a href="{{route('contact')}}">Contact</a></li>
            <li class="{{url()->current()==route('support.us')?'active':''}}"><a href="{{route('support.us')}}">Support Us</a></li>
            @if(!auth()->user())
            <a href="{{route('login')}}" class="btn btn-primary">Login</a href="">
            <a href="{{route('registration')}}" class="btn btn-primary">Create Free Account</a href="">
            @else
            <li><a href="{{route('video.upload.form')}}">Upload Talent</a></li>
            <li class="dropdown acc-nav-link"><img src="{{asset('uploads/users/'.auth()->user()->image)}}" alt="" class="account-circle-img">
                <div class="dropdown-menu">
                    <ul>
                        <li>
                            <p>{{ auth()->user()->name}}</p>
                        </li>
                        <li><a href="{{route('user.profile')}}">Profile</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn  btn-block" style="height:50px">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>


            @endif
            </ul>
        </nav>--}}
        <nav class="navbar navbar-expand-md navbar-dark container ">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/img/logo.png')}}" alt="logo" width="200"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('about.mission')}}">Our Mision</a>
                            <a class="dropdown-item" href="{{route('about.vision')}}">Our Vision</a>
                            <a class="dropdown-item" href="{{route('about.goal')}}">Our Goal</a>
                            <a class="dropdown-item" href="{{route('about.management')}}">Our Team</a>
                            {{--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else heImage Ure</a>--}}
                        </div>
                    </li>
                    <li class="nav-item {{url()->current()==route('event.participation.form')?'active':''}}">
                        <a class="nav-link" href="{{route('event.participation.form')}}">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('event')}}">Events</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    @if(!auth()->user())
                    <li class="nav-item">
                        <a class="nav-link  bg-primary text-white" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn  btn-danger btn text-white" href="{{route('register')}}">Create a free account</a>
                    </li>
                    @else

                    <li class="nav-item dropdown" style="position:relative">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <div class="" > -->
                            <img src="{{auth()->user()->avatar}}" alt="" class="account-circle-img" style="top:-10px">
                            <!-- </div> -->
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                            <a class="dropdown-item" href="{{route('user.posts')}}">My Posts</a>
                            <a class="dropdown-item" href="{{route('user.videos')}}">My Videos</a>
                            <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                            <form action="{{route('logout')}}" method="post">
                                    @csrf
                               <button type="submit"  class="btn btn-primary  " >Logout</button>
                        </form>
                            {{--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>--}}
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>