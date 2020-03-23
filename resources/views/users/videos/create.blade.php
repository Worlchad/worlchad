@extends('layouts.app')
@section('page_title')
Upload
@endsection

@section('content')

<section class="container">
    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">

            <div class="video-upload">
                <h2 class="text-center text-primary">Upload Video <i class="fa fa-upload text-primary"></i></h2>
                <hr><div class="col-md-12">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
                <form id="video-form" action="{{route('user.video.upload')}}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_type" value="user">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter a title for your video" name="title" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                <span class="text-danger" role="alert">
                                    <p>{{ $errors->first('title') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Give us a brief description of this video" value="{{old('description')}}">
                                @if ($errors->has('description'))
                                <span class="text-danger" role="alert">
                                    <p>{{ $errors->first('description') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Category</label>
                                <select id="" class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input type="file" class="dropify" name="video" value="{{old('video')}}">
                                @if ($errors->has('video'))
                                <span class="text-danger" role="alert">
                                    <p>{{ $errors->first('video') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Tags - <small>seperated by commas</small></label>
                        <input type="text" class="form-control" name="tags" data-role="tagsinput">
                    </div>
                    <button id="upload" type="submit" class="btn btn-primary btn-block btn-lg">Upload</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection