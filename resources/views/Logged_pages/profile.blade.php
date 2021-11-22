@extends('MainLayout.header')
@section('title')
    <title>Profile</title>
@endsection
<link rel="stylesheet" href="{{asset('css/pricing.css')}}">

<style>
    .account{
        padding: 50px;
        margin-top: 30px;
        /* -webkit-box-shadow: 0 30px 10px 0 rgba(0,0,0,0.2); */
        border-radius: 10px !important;
        box-shadow: 0 30px 10px 0 rgba(0,0,0,0.1);





    }
    label{
        color: #340856;
        font-weight: bold;
    }
    .status{
        box-shadow: 0 15px 10px 0 rgba(0,0,0,0.1);
        border-radius: 10px;
        padding: 20px;

    }

</style>
@section('content')
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#info" role="tab" data-toggle="tab">{{__('profile.Personal Information')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#Subscription" role="tab" data-toggle="tab">{{__('profile.Subscription')}}</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#drug" role="tab" data-toggle="tab">Drug Lookup</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Customize Carriers</a>
    </li> --}}
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane  active" id="info">
        <div class="container account">
            <h3 style="color: #340856">{{__('profile.Personal Information')}}</h3>
            <div class="row account">
                <div class="col-lg-6 col-12">
                    <label>{{__('profile.Email')}}</label>
                    <input type="text" class="form-control" placeholder="Example@gmail.com"><br>
                    <label>{{__('profile.First Name')}}</label>
                    <input type="text" class="form-control" placeholder="First Name"><br>
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name"><br>
                    <label>{{__('profile.Password')}}</label>
                    <input type="text" class="form-control" placeholder="Password"><br>
                    <label>{{__('profile.Confirm Password')}}</label>
                    <input type="password" class="form-control"><br>
                    <button style="background-color: #340856;float: right;" class="btn btn-dark">{{__('profile.Update')}}</button>
                </div>
                <div class="col-lg-6 col-12">
                    <h5>{{__('profile.Referral Link')}}</h5><br>
                    <input type="text" value="https://insurancetoolkits.com/signup/?referral=4192" class="form-control" readonly><br>
                    <b style="color: #340856">*Special Offer</b><br>
                    <p style="color: gray">Get a $20 credit for every person you refer that successfully signs up and pays for Insurance Toolkits using your link.</p>
                </div>
                <div class="col-lg-6 col-12">
                    <h3 style="color: #340856">{{__('profile.Preference')}}</h3><br>
                    <label>State</label>
                    <select name="state" class="form-control" id="">
                        <option value="Florida">Florida</option>
                        <option value="Florida">Florida</option>

                    </select>
                </div>

            </div>

        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="Subscription">
        <div class="container-fluid" style="padding: 50px;">
           <div class="row">
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/overview')}}" style="background-color: #340856; color:white;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Overview</a>

                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/invoice')}}" style="background-color: white; color:black;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">{{__('profile.Invoice')}}</a>
                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/creditcard')}}" style="background-color: white; color:black; " class="btn btn-dark mt-2 mt-lg-0 mt-md-0">{{__('profile.Credit Cards')}}</a>
                </div>



            </div><br>
            <center>  <h4 style="color: #340856;">
                {{__('profile.Subscription Overview')}}
            </h4></center>
            <div class="row" style="margin-top: 30px;">

                <div class="col-lg-6 col-12 status">
                    <b style="color: #340856;">{{__('profile.Status')}}Status</b><br>
                    <h3>
                        {{__('profile.Current Plan: Agency')}}
                    </h3><br>
                    <p>
                        Your subscription is suspended.
                    </p><br>
                    <button class="btn btn-dark" style="background-color: #340856;float: right;">Resume Subscription</button>
                </div>


            </div>
            <div class="demo mt-lg-5">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-3 col-md-6 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title">Bussiness</h3>
                                </div>
                                <div class="price-value">
                                    <span class="amount">$10</span>
                                </div>
                                <span class="time">Per Month</span>
                                <ul class="pricing-content">
                                    <li> Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit</li>
                                    <li>Unlimited use of the quoter and underwriter</li>
                                    <li>Unlimited use of all in-field sales tools</li>
                                    <li>Access to CRM</li>

                                </ul>
                                <div class="pricingTable-signup">
                                    <a href="#">
                                        {{__('profile.DOWNLOAD PLAN')}}</a>
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

    </div>

</div>


@endsection
