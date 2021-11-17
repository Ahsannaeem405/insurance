@extends('MainLayout.header')
@section('title')
 <title>Pricing</title>
 @endsection
 <style>
     .con1{
         padding:50px;
         text-align: center;
     }
      .box{
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
     <h3>Pricing</h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 " style="margin-top:20px;">
            <div class="box_orange" >
                <div class="row">

                    <div class="col-lg-6  col-12" style="text-align: center;    display: flex;">
                        <div class="box">
                            <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                        </div>
                        <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Bussiness</h5>

                    </div>
                    <div class="col-lg-6 col-md-6 col-12" style="padding-top:20px; ">
                        <b style="float:right;">
                            $
                            34
                            .99
                            /month</b>
                    </div>

                    <div class="col-lg-12 col-12" style="padding-top:20px; text-align:left; ">

                            <p><i class="fas fa-check" style="color: orange;font-size:25px;"></i> Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit</p>
                            <p><i class="fas fa-check" style="color: orange;font-size:25px;"></i> Unlimited use of the quoter and underwriter</p>
                            <p><i class="fas fa-check" style="color: orange;font-size:25px;"></i> Unlimited use of all in-field sales tools</p>
                            <p><i class="fas fa-check" style="color: orange;font-size:25px;"></i> Access to CRM</p>
                            <p><i class="fas fa-check" style="color: orange;font-size:25px;"></i> Unlimited quotes per day on your shareable ‘Lite Link’. Every account comes with your own public URL that you can share with a colleague or bookmark on your phone.</p>

                    </div>
                </div>


                <center><button class="btn btn-primary" style="background-color: orange">Start Free Trail</button></center>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 " style="margin-top:20px;">
            <div class="box_purple" style="height:390px;">
                <div class="row">

                    <div class="col-lg-6  col-12" style="text-align: center;    display: flex;">
                        <div class="box1">
                            <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                        </div>
                        <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Bussiness</h5>

                    </div>
                    <div class="col-lg-6 col-md-6 col-12" style="padding-top:20px; ">
                        <b style="float:right;">
                            $
                            34
                            .99
                            /month</b>
                    </div>

                    <div class="col-lg-12 col-12" style="padding-top:20px; text-align:left; ">

                            <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i>Create and remove agent accounts</p>
                            <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Includes 5 agent accounts. More accounts can be added at $24.99/account per month.</p>


                    </div>
                </div>

                <center><button class="btn btn-primary" style="background-color: purple">Start Free Trail</button></center>

            </div>
        </div>
         <div class=" offset-lg-2 offset-md-2 col-lg-8 col-md-8 col-12 " style="margin-top:20px;">
            <div class="box_purple">
                <div class="row">

                    <div class="col-lg-6  col-12" style="text-align: center;    display: flex;">
                        <div class="box1">
                            <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                        </div>
                        <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Bussiness</h5>

                    </div>

                    <div class="col-lg-6 col-12" style="padding-top:20px; ">
                        <b style="float:right;">
                            $
                            34
                            .99
                            /month</b>
                    </div>

                    <div class="col-lg-12 col-12" style="padding-top:20px; text-align:left; ">
                <center><b>All the features of the Agency Plan, plus..</b></center>


                            <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i>Create and remove agent accounts</p>
                            <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Includes 5 agent accounts. More accounts can be added at $24.99/account per month.</p>


                    </div>
                </div>

                <center><button class="btn btn-primary" style="background-color: purple">Start Free Trail</button></center>

            </div>
        </div>
    </div>

 </div>
@endsection
