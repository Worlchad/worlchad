@extends('layouts.admin')

@section('page_title')
Create Blog
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
                            <!-- <h3 class="box-title m-b-0">Create Event Forms</h3>
                            <p class="text-muted m-b-30 font-13"> create your event with ease</p> -->
                            <form class="form-horizontal" method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- <input type="hidden" value="{{auth()->guard('admin')->user()->id}}" name="admin_id"/> -->
                                <div class="form-group">
                                    <label class="col-md-12">Title <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="" name="title"> </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-12">Display Image</label>
                                    <div class="col-sm-12">
                                            <input type="file" id="" name="image" class="dropify" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Content</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control summernote" rows="5" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tags <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"  name="tags"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary pull-right" value="Publish Blog"> </div>
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