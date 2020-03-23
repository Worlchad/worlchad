@extends('layouts.app')
@section('page_styles')

@endsection
@section('title')
Subscription
@endsection
@section('content')
<section class="plan container-fluid p-5">
  <div class="row">
    <div class="plans-header container">
      <h2>Subscribe to our Flexible Plans</h2>
    </div>
  </div>
    <div class="container">
          <form action="{{route('user.subscribe')}}" method="post" id="subscription-form">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->id()}}">
            <input type="hidden" name="price" value="" id="price">
            <input type="hidden" name="reference_id" value="" id="reference-id">
            <input type="hidden" name="plan_id" id="plan-id" />
            <input type="hidden" name="status" id="status" />
          </form>

      <div class="row">

          @foreach($plans as $plan)
          <div class=" text-center  col-md-3 m-1 p-4 shadow">

            <div class="plan-name text-primary">
              <h3>{{$plan->name}}</h3>
            </div>
            <div class="plan-price">
              <h2>{{$plan->getFormatedPrice()}}</h2>
            </div>

            <button class="subscribe-btn btn btn-success" data-plan='{{$plan->id}}' data-price="{{$plan->price}}">Subscribe</button>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('page_scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  let subBtns = document.querySelectorAll('.subscribe-btn');
  subBtns.forEach(function(el) {

    el.addEventListener('click', function(e) {
      document.querySelector('#price').value = el.dataset.price;
      document.querySelector('#plan-id').value = el.dataset.plan;


      payWithPaystack();
    })
  })

  function payWithPaystack() {

    var handler = PaystackPop.setup({
      // key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
      key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
      email: '{{\App\User::find(auth()->id())->email}}', //put your customer's email here
      amount: document.querySelector('#price').value * 100, //amount the customer is supposed to pay
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
            var newElem = document.querySelector('#status');
            newElem.value = status == 'success' ? 'paid' : 'not-paid';
            // newElem.type = 'hidden';
            // newElem.name = 'status';
            //submit form
            document.querySelector('#subscription-form').submit()
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