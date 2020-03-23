@extends('layouts.admin')
@section('page_title')
Home
@endsection
@section('content')

                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-user"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">{{$params['users']}}</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Users</h4>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class="ti-pencil"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">{{$params['blogs']}}</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Blog Post</h4>
                                            <div><br><a href="{{route('blogs.index')}}" class="btn btn-primary">Manage</a></div>

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class=" ti-calendar"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">{{$params['events']}}</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Events</h4>
                                            <div><br><a href="{{route('events.index')}}" class="btn btn-primary">Manage</a></div>

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fas fa-video"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">{{$params['videos']}}</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Videos</h4>
                                            <div><br><a href="{{route('videos.index')}}" class="btn btn-primary">Manage</a></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fas fa-video"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">{{$params['admins']}}</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Admins</h4>
                                            <div><br><a href="{{route('admins.index')}}" class="btn btn-primary"> Manage</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
@endsection