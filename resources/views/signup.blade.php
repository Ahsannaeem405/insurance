@extends('MainLayout.header')
@section('title')
    <title>SignUp</title>
@endsection
<style>
    .con {
        text-align: center;
        padding: 20px;
        color: darkblue;
    }

    .con1 {
        /* padding: 50px 30px 50px 30px !important; */
        padding-left: 20px !important;
        padding-right: 20px !important;

        padding-bottom: 20px;
        border: 1px solid white;
        margin-bottom: 40px;
        border-radius: 10px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        max-width: 790px !important;

    }

    .box {
        background-color: orange;
        text-align: center;
        border-radius: 11px;
        width: 70px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .box1 {
        background-color: purple;
        text-align: center;
        border-radius: 11px;
        width: 70px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .box_orange {
        margin-top: 20px;
        border: 1px solid orange;
        padding: 20px;
        border-radius: 10px;
    }

    .box_purple {
        margin-top: 20px;
        border: 1px solid purple;
        padding: 20px;
        border-radius: 10px;
    }

    /* togglebutton */

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: orange;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px orange;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
        height: 30px;
    }

    .slider.round:before {
        border-radius: 50%;
    }



    @media only screen and (max-width: 320px) {

        .heading {
            margin-left: 5px !important;
            font-size: 13px !important;
        }
    }

</style>

@section('content')
    <div class="containerfluid con">
        <h2>Sign Up</h2>
    </div>
    <div class="container con1">
        <h5 style="color: gray; margin-top:20px">Personal Information</h5>
        <div class="row">
            <div class="col-lg-6 col-12">
                <input type="text" class="form-control" style="margin-top:20px" placeholder="First Name">
            </div>
            <div class="col-lg-6 col-12">
                <input type="text" class="form-control" style="margin-top:20px" placeholder="Last Name">
            </div>
            <div class="col-lg-12 col-12" style="margin-top:20px">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-lg-12 col-12" style="margin-top:20px">
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-lg-12 col-12" style="margin-top:20px">
                <textarea name="info" class="form-control" id="" cols="2" rows="5">How did you hear about us?</textarea>
            </div>
            <div class="col-lg-12" style="margin-top:20px">
                <h5 style="color: gray; margin-top:20px">Promo</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-12" style="margin-top:20px">
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-12" style="margin-top:20px">
                <h5 style="color: gray">Choose Your Plan</h5>
            </div>
            <div class="options">
                <div class="col-lg-12 " style="margin-top:20px">
                    <div class="container box_orange">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-2">
                                <input type="radio" id="test1" name="radio-group" checked>
                            </div>
                            <div class="col-lg-5 col-md-5 col-10" style="text-align: center;    display: flex;">
                                <div class="box">
                                    <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                                </div>
                                <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Bussiness</h5>

                            </div>
                            <div class="col-lg-5 col-12" style="padding-top:20px; ">
                                <b style="float:right;">
                                    $
                                    34
                                    .99
                                    /month</b>
                            </div>

                            <div class="col-lg-12 col-12" style="padding-top:20px; ">
                                <ul>
                                    <li>Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit</li>
                                    <li>Unlimited use of the quoter and underwriter</li>
                                    <li>Unlimited use of all in-field sales tools</li>
                                    <li>Access to CRM</li>
                                    <li>Unlimited quotes per day on your shareable ‘Lite Link’. Every account comes with
                                        your
                                        own public URL that you can share with a colleague or bookmark on your phone.</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-12 " style="margin-top:20px">
                    <div class="container box_purple">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-2">
                                <input type="radio" id="test1" name="radio-group" checked>
                            </div>
                            <div class="col-lg-5 col-md-5 col-10" style="text-align: center;    display: flex;">
                                <div class="box1">
                                    <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                                </div>
                                <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Agency</h5>

                            </div>
                            <div class="col-lg-5 col-12" style="padding-top:20px; ">
                                <b style="float:right;">

                                    $
                                    99
                                    .99
                                    /month</b>
                            </div>

                            <div class="col-lg-12 col-12" style="padding-top:20px; ">
                                <center style="color: gray; padding-bottom:20px;">All the features of the Business Plan,
                                    plus..
                                </center>
                                <ul>
                                    <li>Create and remove agent accounts</li>
                                    <li>Includes 5 agent accounts. More accounts can be added at $24.99/account per month.
                                    </li>
                                    <li>Unlimited use of all in-field sales tools</li>

                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12" style="padding-top: 20px;">
                <h5 style="color: gray;">Payment</h5>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12" style="padding-top: 20px;">
                            <img src="{{ asset('images/credit-cards.png') }}" alt="" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12" style="padding-top: 20px;">
                <input type="text" class="form-control" placeholder="Name Or Card">
            </div>
            <div class="col-lg-12 col-12" style="padding-top: 20px;">
                <input type="text" class="form-control" placeholder="Card Number">
            </div>
            <div class="col-lg-6 col-12" style="padding-top: 20px;">
                <input type="text" class="form-control" placeholder="Exp Date">
            </div>
            <div class="col-lg-6 col-12" style="padding-top: 20px;">
                <input type="text" class="form-control" placeholder="CVC">
            </div>
            <div class="col-lg-6 col-md-6 col-12" style="padding-top: 20px;">
                <button class="btn btn-primary">Start 14 Days Free Trail</button>
            </div>
            <div class="col-lg-6 col-md-6 col-12" style="padding-top: 20px;">
                <p><span style="font-size: 19px; font-weight:bold">Total:
                        $
                        34
                        .99</span>/month</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12" style="padding-top: 20px;">
                <p>By signing up you agree to our <a href="#" style="color: indigo">Terms of Service</a></p>
            </div>
            <div class="col-lg-12 col-md-12 col-12" style="padding-top: 20px; display:flex;">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
                <p class="p-1">Receive occasional email updates from InsuranceToolkits</p>
            </div>

        </div>
    </div>

@endsection
