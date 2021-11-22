@extends('MainLayout.header')
@section('title')
    <title>Profile</title>
@endsection
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
        <a class="nav-link " href="#info" role="tab" data-toggle="tab">Personal Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#Subscription" role="tab" data-toggle="tab">Subscription</a>
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
    <div role="tabpanel" class="tab-pane  " id="info">
        <div class="container account">
            <h3 style="color: #340856">Personal Information</h3>
            <div class="row account">
                <div class="col-lg-6 col-12">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Example@gmail.com"><br>
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="First Name"><br>
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name"><br>
                    <label>Password</label>
                    <input type="text" class="form-control" placeholder="Password"><br>
                    <label>Confirm Password</label>
                    <input type="password" class="form-control"><br>
                    <button style="background-color: #340856;float: right;" class="btn btn-dark">Update</button>
                </div>
                <div class="col-lg-6 col-12">
                    <h5>Referral Link</h5><br>
                    <input type="text" value="https://insurancetoolkits.com/signup/?referral=4192" class="form-control" readonly><br>
                    <b style="color: #340856">*Special Offer</b><br>
                    <p style="color: gray">Get a $20 credit for every person you refer that successfully signs up and pays for Insurance Toolkits using your link.</p>
                </div>
                <div class="col-lg-6 col-12">
                    <h3 style="color: #340856">Preference</h3><br>
                    <label>State</label>
                    <select name="state" class="form-control" id="">
                        <option value="Florida">Florida</option>
                        <option value="Florida">Florida</option>

                    </select>
                </div>

            </div>

        </div>
    </div>
    <div role="tabpanel" class="tab-pane active" id="Subscription">
        <div class="container-fluid" style="padding: 50px;">
            <div class="row">
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/overview')}}" style="background-color: white; color:black;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Overview</a>

                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/invoice')}}" style="background-color: #340856;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Invoice</a>
                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/creditcard')}}" style="background-color: white; color:black; " class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Credit Card</a>
                </div>



            </div><br>
            <center>  <h4 style="color: #340856;">
                Invoices
            </h4></center>
            <div class="row" style="margin-top: 30px;">

                <div class="col-lg-12 col-12 status" style="display: inline-flex">
                    <i class="far fa-file-pdf" style="font-size: 25px;"></i>
                    <a href="#" style="margin-left: 30px;font-size:17px">Invoice</a>

                </div>


            </div>
        </div>

    </div>

</div>


@endsection
