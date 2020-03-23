@extends('layouts.app')

@section('title')
Thank You
@endsection

@section('content')
<section class="thanks text-center">
<h2 class="text-success">{{$message}}</h2>
<div><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i> back to home</a></div>
</section>
@endsection
