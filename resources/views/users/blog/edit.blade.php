@extends('layouts.app')

@section('page_title')
Edit Blog
@endsection
@section('page_styles')
<link rel="stylesheet" href="{{asset('/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <!-- .row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <!-- <h3 class="box-title m-b-0">Create Event Forms</h3>
                            <p class="text-muted m-b-30 font-13"> create your event with ease</p> -->
                <form class="form-horizontal" method="POST" action="{{route('user.post.update',$blog->id)}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id" />
                    <div class="form-group">
                        <label class="col-md-12">Title <span class="help"></span></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$blog->title}}" name="title"> </div>
                    </div>
                    <!-- <div class="form-group">
                                    <label class="col-md-12">Date <span class="help">- select a start and end date</span></label>
                                    <div class="col-md-12">
                                       <input class="form-control input-daterange-datepicker" type="text" name="date" value="01/01/2015 - 01/31/2015" />
                                    </div>
                                </div> -->
                    <div class="form-group">
                        <label class="col-sm-12">Display Image</label>
                        <div class="col-sm-12">
                            <input type="file" id="" name="image" class="dropify" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Content</label>
                        <div class="col-md-12">
                            <textarea class="form-control summernote" rows="5" name="content">{{$blog->content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tags <span class="help"></span></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$blog->tags}}" name="tags"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary pull-right" value="Update Blog"> </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
    <!-- /.row -->
</div>
@endsection

@section('page_scripts')
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- <script src="{{asset('/plugins/bower_components/summernote/dist/summernote.min.js')}}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<script src="{{asset('/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(function() {
        $('.summernote').summernote({
            // height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    });
    $('.dropify').dropify();
</script>
@endsection