@extends('layouts.app')
@section('content')
<section class="container-fluid">
    <div class="banner">
    <img src="{{$event->banner_image}}" alt="" class="img-fluid">
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
    <h2>{{$event->name}} Registration</h2>
    <p class="text-danger">Please fill the following information accordingly to complete your registration</p>
        <form action="{{route('team.store',$event->id)}}" method="POST" enctype="multipart/form-data" id="register-team">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->id()}}">
            {{-- <input type="hidden" name="price" value="" id="price">
            <input type="hidden" name="reference_id" value="" id="reference-id">
            <input type="hidden" name="status" id="status" /> --}}
            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Team Name</label>
                        <input name="name" type="text" placeholder="Team Name" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">

                    <label for="">Team Logo</label>
                    <input name="logo" type="file" placeholder="Logo " class="form-control" required>
                    </div>
                </div>
        </div>

            <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                            <label for="">Phone Number</label>
                        <input name="phone_number" type="text" placeholder="Phone Number" class="form-control" required>

                       </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                            <label for="">State</label>
                            <select name="state_id" id="" class="form-control">
                                @foreach ($states as $state)
        
                            <option value="{{$state->id}}">{{$state->name}}</option>  
                                @endforeach
                            </select>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <label for="">Local Government</label>
                    <input type="text" placeholder="Team Name" class="form-control">
                </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Address</label>
                <input name="address" type="text" placeholder="Address" class="form-control" required>

            </div>
    </div>
            <br>
<button type="submit" class="btn btn-primary pull-right" id="register-btn" data-price="{{$event->participant_price}}" >Register</button> 
        </form>
        </div>
    </div>
        
    </div>
</section>
@endsection
@section('page_scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  let subBtns = document.querySelector('#register-btn');
  subBtns.addEventListener('click', function(e) {
      e.preventDefault();


      payWithPaystack();
    });

  function payWithPaystack() {

    var handler = PaystackPop.setup({
      // key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
      key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
      email: '{{\App\User::find(auth()->id())->email}}', //put your customer's email here
      amount: document.querySelector('#register-btn').dataset.price * 100, //amount the customer is supposed to pay
      metadata: {
        custom_fields: [{
          // display_name: document.querySelector('#name').value,
          // value:  document.querySelector('#phone').value,//customer's mobile number
        }]
      },
      callback: function(response) {
        //after the transaction have been completed
        //make post call  to the server with to verify payment
        //using transaction reference as post data

        $.get('/verifypayment/' + response.reference, function(status) {
          var ref = document.querySelector('#reference-id');
          ref.value = response.reference;

          console.log(status)
          if (status == "success") {
            //successful transaction
            // var newElem = document.createElement('input');
            // var newElem = document.querySelector('#status');
            // newElem.value = status == 'success' ? 'paid' : 'not-paid';
            // newElem.type = 'hidden';
            // newElem.name = 'status';
            //submit form
            document.querySelector('#register-team').submit()
          } else
            alert('Transaction Failed');
        });
      },
      onClose: function() {
        //when the user close the payment modal
        alert('Transaction cancelled');
      }
    });
    handler.openIframe(); //open the paystack's payment modal
  }
</script>
@endsection
