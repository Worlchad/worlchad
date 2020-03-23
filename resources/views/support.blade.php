@extends('layouts.app')

@section('title')
Support Us
@endsection

@section('content')
<section class="container text-center" id="support-us">
    <!-- <h1>Welcome to our Support us Page</h1> <br> -->
    <h3 class="info">Your support today will help empower talented people to transform the world</h3>


    <div class="row">
        <div class="col-md-6">
            <div class="support-form  ">
                @if($errors)
                @foreach($errors->all() as $error)
                <p class="text-danger">* {{$error}}</p>
                @endforeach
                @endif
                <form action="" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="reference_id" id="reference-id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Your name " class="form-input" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" placeholder="Your email" class="form-input" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="tel" name="phone_number" placeholder="Your phone number" class="form-input" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Support Amount</label>
                        <input type="number" name="amount" placeholder="Amount" class="form-input" id="amount">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success pull-right">Support us</button><br>
                    </div>
                </form>
            </div>
        </div>
            <div class="col-md-6">
                <div class="container-fluid">
                <br>
                <h4>For Bank Deposit or Transfer you can support using the following Bank detail</h4>
                <br>
                <h6 class="text-success"><i class="fa fa-bank"></i> Bank Name</h6>
                <h6>United Bank for AFrica (UBA)</h6>
                <h6 class="text-success"><i class="fa fa-user"></i> Account Name</h6>
                <h6>WorlChad Global</h6>
                <h6 class="text-success"><i class="fa fa-card"></i> Account Number</h6>
                <h6>1021754662</h6>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    function payWithPaystack(el) {

        var handler = PaystackPop.setup({
            key: 'pk_live_ca533616cf4ce65ab490684a7210a94183957865', //put your public key here
            email: document.querySelector('#email').value, //put your customer's email here
            amount: document.querySelector('#amount').value * 100, //amount the customer is supposed to pay
            metadata: {
                custom_fields: [{
                    display_name: document.querySelector('#name').value,
                    value: document.querySelector('#phone').value, //customer's mobile number
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
                        var newElem = document.createElement('input');
                        newElem.value = status == 'success' ? 'paid' : 'not-paid';
                        newElem.type = 'hidden';
                        newElem.name = 'status';
                        el.append(newElem);
                        el.submit();
                    } else
                        alert('Transaction Failed');
                });
            },
            onClose: function() {
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