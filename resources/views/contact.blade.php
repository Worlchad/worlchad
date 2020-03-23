@extends('layouts.app')

@section('title')
Contact Us
@endsection

@section('content')


    <section class="container mt-5 mb-5">
      <div class="row shadow" >
          <div class="col-md-6 bg-primary" >
            <h2 class="text-white text-center p-4">Worlchad Global</h2>
            <!-- <hr> -->
            <div class="mt-5 p-2 text-white  shadow-sm">
                <h3>Address</h3>
                <address class="text-light">
                        No 26 off Beca Apartment, Patrick Yakowa.
                        Katampe, Abuja, Nigeria.
                </address>
            </div>
            <div class="mt-5 p-2 text-white shadow-sm">
                <h3>Email</h3>
                <a href="mailto:worlchadglobal@gmail.com"> worlchadglobal@gmail.com</a>
            </div>
            <div class="mt-5 p-2 text-white shadow-sm">
                <h3>Connect on Social</h3>
                <div class="social">
                   <a href="https://web.facebook.com/worlchadglobal/"><i class="fa fa-facebook"></i></a>
                   <a href=""><i class="fa fa-twitter"></i></a>
                   <a href="https://www.instagram.com/worlchad/"><i class="fa fa-instagram"></i></a>
                 </div>


            </div>
          </div>
          <div class="col-md-6 p-4">
              <h2  class="text-center text-primary ">SEND US A MESSAGE <i class="fa fa-envelope text-primary"></i></h2>
              @if(\Session::has('message'))
          <p class="text-success border-success">{{\Session::get('message')}}</p>
              @endif
          <form action="{{route('contact.send')}}" method="post" id="contact-form" class="mt-2 pt-5">
                  @csrf
                <div class="form-group">
                    <label for="name" class="text-primary">Full Name</label>
                    <input type="text" name="name" class="form-control input-block" placeholder="e.g John Doe" >
                </div>
                <div class="form-group" >
                    <label for="email" class="text-primary">Email</label>
                    <input type="email" name="email" class="form-control input-block" placeholder="e.g johndeo@gmail.com" >
                </div>
                <div class="form-group">
                    <label for="" class="text-primary">Message</label>
                   <textarea name="message" id="" cols="30" rows="10" class="form-control input-block"  placeholder="Your message goes here"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send <i class="fa fa-send text-white"></i></button>

              </form>
          </div>
      </div>
    </section>
@endsection
