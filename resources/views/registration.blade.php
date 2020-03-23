@extends('layouts.default')

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
        <div class="img" >
            <div class="cover"></div>
        </div>
        <div class="login-form">

            <a href="{{url('/')}}" class="">Back to Home</a>
        <form action="{{route('register')}}" class="form" id="reg-form" method="POST">
            @csrf
                <h2 class="text-center text-primary">Create A Free Account</h2>
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                <input type="text" name="firstName" class="form-input input-block" value="{{old('firstName')}}" required>
                    @if($errors->has('firstName'))
                        <p class="text-danger">{{$errors->first('firstName')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-input input-block" value="{{old('lastName')}}" required>
                    @if($errors->has('lastName'))
                        <p class="text-danger">{{$errors->first('lastName')}}</p>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="email">Email</label>
                 <input type="email" name="email" class="form-input input-block" value="{{old('email')}}" required>
                    @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="phone">Phone</label>
                 <input type="text" name="phone" class="form-input input-block" value="{{old('phone')}}" required>
                    @if($errors->has('phone'))
                        <p class="text-danger">{{$errors->first('phone')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-input input-block" required>
                    @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input input-block" required>
                </div>
                <div class="cf">
                    <button type="submit" class="btn btn-primary btn-block text-upper">Create Account</button>
                </div><br>
                <p>Already have an account? <a href="{{route('login')}}">Click to Login</a></p>

            </form>
        </div>
    </div>
@endsection
