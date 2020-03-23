@extends('layouts.default')
@section('page_title')
Admin Login
@endsection
@section('page_style')
<style>
.login-form {
    border:1px solid #3b60c9;
    background-color:#3b60c9;
    border-radius:10px;
    position:absolute;
    top:20%;
    left:5%;
    padding:4%;
    color:#fff;
}
.login-form .box-title{
    color:#fff;
    text-align:center;
    text-transform:uppercase
}
</style>
@endsection

@section('content')
        <div class="col-md-3 col-sm-12 col-md-offset-4 login-form">
                        <div class="">
                            <h3 class="box-title m-b-0">Login</h3>
                            <div class="devider"></div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{route('admin.login')}}">
                                    @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user " style="color:red"></i></div>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password"> </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1"> Remember me </label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-info btn-block waves-effect waves-light m-r-10">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
@endsection