@extends('layouts.app')

@section('title')
About Us
@endsection

@section('content')
    <section class="container">
        <h2 class="section-title text-center box-shadow">Our Executives</h2>
        <div class="executives">
            <div class="executive-card">
                <img src="{{asset('assets/img/executives/bolade_felix.png')}}" alt="">
                <div class="executive-card-body">
                    <div class="close">&times;</div>
                    <h3 class="title">Mr. Bolade Felix</h3>
                    <h4 class="position">Chairmain</h4>
                    <div class="detail">
                            <p>He is a financial expert and auditor. He is currently the Head, Internal Audit of Omega Fire Ministries International, Auchi, Edo State. Nigeria. He was the Audit Consultant to Abdulfatai Ibrahim & Co (Chartered Accountant), Abuja. He was the Internal Control Officer First City Monument bank Limited and Cluster Control Manager for Benue, Nasarawa and Plateau cluster of the defunct Mainstream Bank Limited and the cluster Control Officer, United Bank for Africa Plc, Lafia. He is happily married with children.</p>
                    </div>
                    </div>
            </div>
            <div class="executive-card">
                <img src="{{asset('assets/img/executives/OdehJacksonJohn.png')}}" alt="">
                <div class="executive-card-body">
                    <div class="close">&times;</div>
                    <h3 class="title">Odeh Jackson John</h3>
                    <h4 class="position">Founder/CEO</h4>
                    <hr>
                    <div class="detail">
                            <p>He is dedicated to human development. He is a strategist, speaker and talent enthusiast. He was a lecturer before founding the Worlchad Organization, which is focus on human development, to empower talented people to global transformation. He runs the “Youth Leadership Network” to help youth develop creativity, innovation and leadership capabilities, through coaching, training and consulting. He speaks at conferences and other forum. He is the author of “Correct Pronunciation” and his co-research work was published on the International Journal of Environment and Bioenergy. He convenes “Aggression” and “Disrupt” an annual revolutionary music concert to lead people to global transformation. He loves reading, invention and music.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
