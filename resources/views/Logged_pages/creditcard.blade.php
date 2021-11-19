@extends('MainLayout.logged_header')
@section('title')
    <title>Subscription</title>
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
        box-shadow: 0 3px 10px 0 rgb(0 0 0 / 10%);
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
                    <a href="{{url('/user/account')}}" style="background-color: white; color:black;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Overview</a>

                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/invoice')}}" style="background-color: white;color:black;" class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Invoice</a>
                </div>
                <div class="col-lg-1 col-md-3 col-12 ">
                    <a href="{{url('/user/creditcard')}}" style="background-color: #340856; color:white; " class="btn btn-dark mt-2 mt-lg-0 mt-md-0">Credit Card</a>
                </div>



            </div><br>
            <center>  <h4 style="color: #340856;">
                Credit Cards
            </h4></center>
            <div class="container">
                <div class="row" style="margin-top: 30px;">

                    <div class="col-lg-7 col-12 status">
                        <h6 style="color: #340856;">Next Payment</h6>
                        <h4 style="color: #340856;">
                            Agency (Monthly)
                        </h4><br>
                        <input type="text " value="Visa XXXX-XXXX-XXXX-7353" class="form-control" readonly>
                        <br>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" style="background-color: #340856; float: right;">Add Card</button>
                    </div>
                    <div class="col-lg-7 col-12 mt-lg-5 status">
                        <h6 style="color: #340856;">Cards on file</h6>
                        <h4 style="color: #340856;">
                            Default Card
                        </h4><br>
                        <input type="text " value="Visa XXXX-XXXX-XXXX-7353" class="form-control" readonly>
                        <br>
                        {{-- <button class="btn btn-dark" style="background-color: #340856; float: right;">Add Card</button> --}}
                    </div>


                </div>
            </div>

        </div>

    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Card</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container" style="text-align: center;">
              <img src="{{asset('images/credit-cards.png')}}" class="mb-5" style="width: 80%;" alt="">

              <input type="text" placeholder="Name on card" class="form-control"><br>
              <input type="text" placeholder="Card Number" class="form-control"><br>
              <input type="text" placeholder="Exp Date" class="form-control"><br>
              <input type="text" placeholder="CVC" class="form-control"><br>



          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" style="background-color: #340856;">Add Card</button>
        </div>
      </div>
    </div>
  </div>


@endsection
