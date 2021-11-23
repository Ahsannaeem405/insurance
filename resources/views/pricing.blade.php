@extends('MainLayout.header')
@section('title')
 <title>Pricing</title>
 @endsection
 <link rel="stylesheet" href="{{asset('css/pricing.css')}}">
 <style>
     .con1{
         padding:50px;
         text-align: center;
     }

 </style>
@section('content')
 <div class="container con1">
     <h2 style="color:#340856">Pricing</h2><br><br>
     <div class="demo">
        <div class="container">
            <div class="row my-5">
                <div class="offset-md-3 col-md-6 col-sm-6" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h3 class="title">{{$pricing->p_name}}</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">${{$pricing->p_cost}}</span>
                        </div>
                        <span class="time">{{$pricing->p_days}} Days</span>
                        <ul class="pricing-content">
                            <li> {{__('profile.Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit')}}</li>
                            <li>{{__('profile.Unlimited use of the quoter and underwriter')}}</li>
                            <li>{{__('profile.Unlimited use of all in-field sales tools')}}</li>
                            <li>{{__('profile.Access to CRM')}}</li>

                        </ul>
                        <div class="pricingTable-signup">
                            @if(Auth::check())
                                <a href="{{url('user/buy/plan')}}">{{'BUY NOW'}}</a>
                            @else
                                <a href="{{url('register')}}">{{'BUY NOW'}}</a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
         $(document).ready(function(){

    $('.nav-item').removeClass("active1");
    $('#pricing').addClass("active1");

});
     </script>
@endsection
