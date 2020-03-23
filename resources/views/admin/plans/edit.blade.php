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
                            <h3 class="box-title m-b-0">Update Plan</h3>
                            <p class="text-muted m-b-30 font-13"> update plan with ease</p>
                            <form class="form-horizontal" method="POST" action="{{route('plans.update',$plan->id)}}" >
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group {{$errors->has('title')?'has-error has-feedback':''}}">
                                    <label class="col-md-12">Name <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text " class="form-control" value="{{$plan->name}}" name="name">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{$plan->price}}"  name="price" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Duration in month</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" value="{{$plan->duration}}"  name="duration" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" >Save</button>
                                    </div>
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