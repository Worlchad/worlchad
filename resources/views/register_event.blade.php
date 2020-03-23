@extends('layouts.app')

@section('title')
Register for Event
@endsection

@section('content')
<section >
    <div class="container shadow-sm mt-5">
        <h2 class="text-center text-white bg-primary mt-5 p-5">{{$event->name}} Registration</h2>
        <div class="event-form container">
            <img src="{{asset('uploads/events/banners/'.$event->banner)}}" alt="{{$event->name}}" class="img-fluid">

            <div class="form"><br>
                 @if(\Session::has('message'))
                    <h3 class="text-success text-center">{{\Session::get('message')}}</h3>
                @endif
            <form action="{{route('event.register.store')}}" method="post" id="event-form"  enctype="multipart/form-data">
                    @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input id="reference-id" type="hidden" name="reference_id" value="">


                <input id="price-hid" type="hidden" name="price" value="{{$event->attendee_price}}">

                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input id="first-name" type="text" class="form-input" name="first_name" value="{{old('first_name')}}" required>
                         @if ($errors->has('first_name'))
                        <span class="text-danger" role="alert">
                            <p>{{ $errors->first('first_name') }}</p>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input id="last-name" type="text" class="form-input" name="last_name" value="{{$user!=null?$user->name:old('last_name')}}" required>
                        @if ($errors->has('last_name'))
                        <span class="text-danger" role="alert">
                             <p>{{ $errors->first('last_name') }}</p>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-input" name="email" value="{{$user!=null?$user->email:old('email')}}" required>
                        @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                             <p>{{ $errors->first('email') }}</p>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" class="form-input" name="phone" value="{{$user!=null?$user->phone:old('phone')}}" required>
                        @if ($errors->has('phone'))
                        <span class="text-danger" role="alert">
                             <p>{{ $errors->first('phone') }}</p>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Gender</label>
                        <select name="gender" id="country" class="form-input" >

                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input id="image" type="file" class="form-input" name="image" value="" required>
                        @if ($errors->has('image'))
                        <span class="text-danger" role="alert">
                             <p>{{ $errors->first('image') }}</p>
                        </span>
                        @endif
                        <div class="image" style="text-align: center">
                            <img src="" alt="" height="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="input-label">Country</label>
                        <select name="country_id" id="country" class="form-input" >
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" {{$country->name =='Nigeria'?'selected':''}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">State</label>
                        <select name="state_id" id="state" class="form-input">
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" type="text" class="form-input" name="price" value="{{$event->attendee_price}}" required disabled>
                             @if ($errors->has('price'))
                            <span class="text-danger" role="alert">
                                <p>{{ $errors->first('price') }}</p>
                            </span>
                            @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" >Register</button>
                    <!-- <br> -->
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>

    function payWithPaystack(el) {
// var el = document.querySelector('#event-form');

    var handler = PaystackPop.setup({
        key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
        email: document.querySelector('#email').value, //put your customer's email here
        amount: document.querySelector('#price').value * 100, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: document.querySelector('#first-name')+ ' ' + document.querySelector('#first-name'),
                    variable_name: document.querySelector('#first-name')+ ' ' + document.querySelector('#first-name'),
                    value:  document.querySelector('#email').value,//customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment
            //using transaction reference as post data

            $.get('/verifypayment/'+response.reference, function(status){
                var ref = document.querySelector('#reference-id');
                ref.value =response.reference;

                console.log(status)
                if(status == "success"){
                    //successful transaction
                    var newElem = document.createElement('input');
                    newElem.value = status=='success'?'paid':'not-paid';
                    newElem.type = 'hidden';
                    newElem.name = 'status';
                    el.append(newElem);
                    el.submit();
                }
                else
                    alert('Transaction Failed');
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
            let btnn = eventForm.querySelector('button');
            btnn.textContent = 'Register'
            btnn.disabled = false;
        }
    });
    handler.openIframe(); //open the paystack's payment modal
    }
</script>
@endsection
