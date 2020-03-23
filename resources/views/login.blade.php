@extends('layouts.default')
@section('page_title')
Login
@endsection
@section('page_styles')
<style>
.login > .img {
    flex: 2;
    background-image: url('{{asset('assets/img/event/event-img-2.jpg')}}');
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
    </style>
@endsection
@section('title')
Register
@endsection

@section('content')
    <div class="login">
        <div class="img">
            <div class="cover"></div>
        </div>
        <div class="login-form signin pd-5">
            <a href="{{url('/')}}" class="">Back to Home</a>
            <form action="{{ route('login') }}" class="form" id="login-form" method="post">
                @csrf
                <h2 class="text-center text-primary">Login</h2>
                @if($errors->has('email'))
                <p class="alert alert-danger  ">{{ $errors->first('email') }} </span>
                @endif
                 <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-input input-block" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-input input-block" name="password">
                </div>
                <div class="cf">
                    <button type="submit" class="btn btn-primary btn-block text-upper">Login</button>
                </div>
                <br>
            <span>Dont't have an account? <a href="{{route('register')}}">Click to register</a>
                     {{-- or </span>
                <a href="./register.html">Forgot password?</a> --}}

            </form>
        </div>
    </div>
@endsection
