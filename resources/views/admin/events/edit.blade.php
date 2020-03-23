@extends('layouts.admin')

@section('page_title')
Update Event
@endsection
@section('page_styles')
<link href="{{asset('/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

<link href="{{asset('/plugins/bower_components/custom-select/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">

    <!-- summernotes CSS -->
 <link href="{{asset('/plugins/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update Event Forms</h3>
                            <p class="text-muted m-b-30 font-13"> update your event with ease</p>
                            <form class="form-horizontal" method="POST" action="{{route('events.update',$event->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" value="{{auth()->guard('admin')->user()->id}}" name="admin_id"/>
                                <div class="form-group">
                                    <label class="col-md-12">Name <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{$event->name}}" name="name"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="5" name="description" >{{$event->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Date <span class="help">- select a start and end date</span></label>
                                    <div class="col-md-12">
                                       <input class="form-control input-daterange-datepicker" type="text" name="date" value="{{date('m/d/Y',strtotime($event->start_date))}} - {{date('m/d/Y',strtotime($event->end_date))}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control " name="country" id="country">
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$country->name== $event->country->name ?'selected':''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">State</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="state" id="state">
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" {{$state->name== $event->state->name ?'selected':''}}  >{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">City</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="city" id="city">
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{$city->id ==$event->city_id ? 'selected':''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="category_id" id="">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"{{$category->id ==$event->category_id ? 'selected':''}} >{{$category->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Venue <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{$event->venue}}" name="venue"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Display Image</label>
                                    <div class="col-sm-12">
                                            <input type="file" id="" name="image" class="dropify" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Display banner</label>
                                    <div class="col-sm-12">
                                    <input type="file" id="" name="banner" class="dropify" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Detail</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control summernote" rows="5" name="details">{{$event->details}}</textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Registration Type <span class="help"></span></label>
                                        <div class="col-md-12">
                                            <select name="reg_type" id="" class="form-control">
                                                <option value="participant"  {{$event->reg_type=='participant'?'selected':''}}>Participant</option>
                                                <option value="attendee" {{$event->reg_type=='attendee'?'selected':''}}>Attendee</option>
                                                <option value="both" {{$event->reg_type=='both'?'selected':''}}>Both</option>
                                            </select></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Participant Price</label>
                                        <div class="col-sm-12">
                                        <input type="text" id="" name="participant_price" value="{{$event->participant_price}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-12">Attendee Price</label>
                                            <div class="col-sm-12">
                                                <input type="text" id="" name="attendee_price" value="{{$event->attendee_price}}" class="form-control" />
                                            </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-12">Registration Status <span class="help"></span></label>
                                    <div class="col-md-12">
                                      <select name="status" id="" class="form-control">
                                          <option value="open" {{$event->status=='open'?'selected':''}} >Open</option>
                                          <option value="closed" {{$event->status=='closed'?'selected':''}}>Closed</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary pull-right" value="Update Event"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>
                <!-- /.row -->
@endsection

@section('page_scripts')
 <!-- Date range Plugin JavaScript -->
 <script src="{{asset('/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

     <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>

    <script src="{{asset('/plugins/bower_components/custom-select/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script>
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    </script>
    <script>
    $(function() {
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        $('.inline-editor').summernote({
            airMode: true
        });
    });
    window.edit = function() {
        $(".click2edit").summernote()
    }, window.save = function() {
        $(".click2edit").summernote('destroy');
    }
    $('.dropify').dropify();
    $('#country').select2();
    $('#state').select2();
    $('#city').select2();

    $('#country').change(function(){
        var country = document.querySelector('#country').value;

            $.ajax({
                url:"{{route('states.get')}}",
                data:{'id':country},
                success: function (data) {
                    console.log("data");
                    $('#state').empty();
                $.each(data,function(name,id){

                    $('#state').append('<option value="'+id+'">'+name+'</option>');
                });
            }
        })
    })
    $('#state').change(function(){
        var state = document.querySelector('#state').value;

            $.ajax({
                url:"{{route('cities.get')}}",
                data:{'id':state},
                success: function (data) {
                    console.log(state);
                    $('#city').empty();
                $.each(data,function(name,id){

                    $('#city').append('<option value="'+id+'">'+name+'</option>');
                });
            }
        })
    })
    </script>
@endsection
