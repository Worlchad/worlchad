@extends('layouts.app')

@section('page_title')
Create Blog
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
                <form class="form-horizontal" method="POST" action="{{route('user.post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id" />
                    <div class="form-group">
                        <label class="col-md-12">Title <span class="help"></span></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Post title" value="" name="title"> </div>
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
                            <div class="form-control summernote" rows="5" name="content"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tags <span class="help"></span></label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="tags"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary pull-right bg-lg" value="Publish Post"> </div>
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