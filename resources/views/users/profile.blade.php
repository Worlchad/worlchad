@extends('layouts.app')
@section('page_styles')
<style rel="stylesheet">
    select {
        border: 1px solid #ccc;
        height: 30px;
        width: 100%;
    }
</style>
@endsection
@section('title')
Profile
@endsection
@section('content')
<div class="container">
    <div class="panel panel-info shadow-sm p-5">
        <div class="panel-heading">
            <h3 class="text-primary">Profile</h3>
        </div>
        <div class="panel-body profile">
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
            @endif
            <div class="form-body">

                <div class="row">
                    <div class="col-md-5">
                        <div class="">

                            <img src="{{$user->avatar}}" alt="" class="img-fluid rounded-circle">
                            <form action="{{route('user.picture.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="" value="Update Picture" class="form-ontrol">
                                <input type="submit" value="Update picture" class="btn btn-sm btn-primary form-input">
                            </form>

                        </div>
                        <br>
                    </div>
                    <div class="col-md-7">
                        <form action="{{route('user.profile.update',$user->id)}}" method="post">

                            @csrf
                            <h6 class="box-title ">Person Info</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="John " value="{{$user->first_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" placeholder="John " value="{{$user->middle_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="12n" value="{{$user->last_name}}">
                                        <span class="help-block"> </span>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select class="" name="gender">
                                            <option value="male" {{$user->gender =='male'?'selected':''}}>Male</option>
                                            <option value="female" {{$user->gender =='female'?'selected':''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <input type="text" name="dob" class="form-control" placeholder="dd/mm/yyyy" value=" {{date('d/m/Y',strtotime($user->dob))}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phone</label>
                                        <input type="tel" name="phone" class="form-control" value=" {{$user->phone_no}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select name="country_id" id=""  class="">
                                                                    @foreach($countries as $country)
                                                                    <option value="">{{$country->name}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state_id" id="" class="">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--/span-->

            </div>

            <!--/row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <select name="state_id" id="" class="">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <!--/span-->

            </div>--}}
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-block btn-primary"> <i class="fa fa-check text-white"></i> Update Profile</button>
                </div>
                {{--<div class="col">
                                                            <button type="button" class="btn btn-lg btn-block btn-default">Cancel</button>
                                                        </div> --}}
            </div>
        </div>
        </form>
    </div>

</div>

</div>

<br>
</div>
</div>
</div>
@endsection