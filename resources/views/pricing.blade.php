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
      /* .box{
        background-color: orange;
    text-align: center;
    border-radius: 11px;
    width: 70px;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .box1{
        background-color: purple;
    text-align: center;
    border-radius: 11px;
    width: 70px;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .box_orange{
        margin-top: 20px;
    border: 1px solid orange;
    padding: 20px;
    border-radius: 10px;
    height: 100%;
    }
    .box_purple{
        margin-top: 20px;
    border: 1px solid purple;
    padding: 20px;
    border-radius: 10px;
    height: 100% !important;

    }
    .btn-primary{
        position: absolute;
    right: 40%;
    bottom: -8px;
    box-shadow: none !important;
    border: none !important;
    } */
    /* left: auto;
    }
    /* @media only screen and (max-width: 768px) and (min-width: 768px) {
        .box2{
            width: 19% !important;
        }
} */
 </style>
@section('content')
 <div class="container con1">
     <h2 style="color:#340856">Pricing</h2><br><br>
     <div class="demo">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h3 class="title">{{__('profile.BUSSINESS')}}</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">$10</span>
                        </div>
                        <span class="time">{{__('profile.PER MONTH')}}</span>
                        <ul class="pricing-content">
                            <li> {{__('profile.Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit')}}</li>
                            <li>{{__('profile.Unlimited use of the quoter and underwriter')}}</li>
                            <li>{{__('profile.Unlimited use of all in-field sales tools')}}</li>
                            <li>{{__('profile.Access to CRM')}}</li>

                        </ul>
                        <div class="pricingTable-signup">
                            <a href="#">{{__('profile.START FREE TRAIL')}}</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4 col-sm-6">
                    <div class="pricingTable green">
                        <div class="pricingTable-header">
                            <h3 class="title">Business</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">$20</span>
                        </div>
                        <span class="time">Per Month</span>
                        <ul class="pricing-content">
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Bandwidth</li>
                            <li>15 Subdomains</li>
                        </ul>
                        <div class="pricingTable-signup">
                            <a href="#">Sign Up</a>
                        </div>
                    </div>
                </div> --}}
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
