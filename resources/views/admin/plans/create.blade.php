@extends('layouts.admin')

@section('page_title')
Upload Video
@endsection
@section('page_styles')

<link href="{{asset('/plugins/bower_components/custom-select/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">

<link href="{{asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
   
    <!-- summernotes CSS -->
 <link href="{{asset('/plugins/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" /> 
@endsection
@section('content')

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Plans</h3>
                             <form id="video-form" class="form-horizontal" method="POST" action="{{route('plans.store')}}" >
                            @csrf
                                <div class="form-group {{$errors->has('title')?'has-error has-feedback':''}}">
                                    <label class="col-md-12">Name <span class="help"></span></label>
                                    <div class="col-md-12">
                                        <input type="text " class="form-control" value="" name="name">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"  name="price" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Duration in month</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control"  name="duration" >
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
    
     <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>

    <script src="{{asset('/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
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
    $('#category').select2();
    $('.dropify').dropify();
    
    $('#video-form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
        e.preventDefault();
        return false;
    }
    });
    </script>
@endsection