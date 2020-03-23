@extends('layouts.app')

@section('content')
<section id="wrapper" class="error-page mt-5">
  <div class="error-box">
    <div class="error-body text-center">
      <h1 class="text-primary" style="font-size: 30vh">400</h1>
      <h1 class="text-uppercase">Page Not Found !</h1>
      <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
      <a href="{{url('/')}}" class="btn btn-primary btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
    <footer class="footer text-center"></footer>
  </div>
</section>
@endsection