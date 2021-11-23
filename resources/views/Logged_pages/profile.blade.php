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
        <a class="nav-link active" href="#info" role="tab" data-toggle="tab">Personal Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#Subscription" role="tab" data-toggle="tab">Subscription</a>
    </li>

</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane  active" id="info">
        <div class="container account">
            <h3 style="color: #340856">Personal Information</h3>
            <div class="row account">
                <div class="col-lg-6 col-12">
                    <form method="post" action="{{url('user/update/profile')}}">
                        @csrf


                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif


                        <label>Email</label>
                    <input type="text" name="email" readonly required class="form-control" placeholder="Example@gmail.com" value="{{Auth::user()->email}}"><br>
                    <label> Name</label>
                    <input type="text" name="name" required  value="{{Auth::user()->name}}" class="form-control" placeholder="First Name"><br>

                    <label>old Password</label>
                    <input type="password" name="old_password" class="form-control" placeholder="old password"><br>


                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="New password"><br>
                        @if($errors->has('password'))

                            <p style="color: red">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </p>
                        @endif

                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password"><br>
                    <button type="submit" style="background-color: #340856;float: right;" class="btn btn-dark">Update</button>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <h5>Referral Link</h5><br>
                    <input type="text" value="{{Request::root().'/register/?referral='.Auth::user()->id}}" class="form-control" readonly><br>
                    <b style="color: #340856">*Special Offer</b><br>
                    <p style="color: gray">Get a $20 credit for every person you refer that successfully signs up and pays for Insurance Toolkits using your link.</p>
                </div>


            </div>

        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="Subscription">
        <div class="container-fluid" style="padding: 50px;">

            <center>  <h4 class="my-5" style="color: #340856;">
                Subscription Overview
            </h4></center>
            <div class="row" style="margin-top: 30px;">

                <div class="col-lg-6 col-12 status my-3" style="margin: auto">
                    <b style="color: #340856;">Status</b><br>
                    <h3>
                        Current Plan: {{$setting->p_name}}
                    </h3><br>
                    <p>

                        @php

        $date1=  Auth::user()->created_at->addDays(Auth::user()->register);






                        @endphp
               Your subscription is valid until         <span style="font-weight: bold">  {{\Carbon\Carbon::parse($date1)->format('Y-M-d')}}.
                        </span>
                    </p><br>
                <a href="{{url('pricing')}}">    <button class="btn btn-dark" style="background-color: #340856;float: right;">Resume Subscription</button> </a>
                </div>


            </div>

        </div>

    </div>

</div>


@endsection
