@extends('MainLayout.header')
@section('title')
<title>Fex</title>
@endsection
<style>
    .table {
        margin-top: 80px;
    }

    .header {
        background-color: #340856;
        color: white;
        padding: 25px;
        text-align: center;
        border-radius: 10px;
    }

    .data {
        margin-top: 40px;
        box-shadow: 0 3px 15px 0 rgb(5 5 5 / 5%);
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #c9c6c6;

    }

    .center {
        text-align: center;
    }

    .v_class {
        padding-top: 10px;
        vertical-align: middle;
        margin: auto;
    }


    .show {
        display: block !important;
    }

    .company {
        box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        border-radius: 10px;
    }


    /* toggle_button */
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
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    @media only screen and (max-width: 768px) {
        .header {
            display: none !important;
        }

        .div_hide {
            display: block !important;
        }

        .fa-chevron-down {
            display: none !important;
        }


    }

    .dropdown-item {
        cursor: pointer;
        padding: 0.5em 0.8em !important;
        border: 1px solid #e8e7e7 !important;

    }

    .dropdown-container {
        margin: 0 1em;
        border-radius: 0 0 3px 3px;
        overflow: hidden;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@section('content')
<div class="toast mt-3" style="position: fixed;width: 100%;right: 0;background-color: #e57b7b;top: 0;z-index: 999">
    <div class="toast-body" style="color: white">
    </div>
</div>
<div class="container-fluid" style="min-height: 500px;padding-bottom:100px;">
    @include('Logged_pages.fex.layout.layout')
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane  active" id="Quoter" style="border-bottom:none;">
            <div class="container-fluid" style="padding-top: 50px;">
                <form id="form1">
                    <center>
                        <!-- <h3 style="color: rgb(52, 8, 86)">{{__('profile.Get a Final Expense Quote')}}</h3> -->
                        <h4 style="color: #6B5EFF;">{{__('profile.Drug and Health Information')}}</h4><br>
                    </center>
                    <div class="container">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-lg-12 col-12">
                                <!-- <h4>{{__('profile.Drug and Health Information')}}</h4><br> -->

                                <div class="row" style="justify-content: space-between;">
                                    <div class="col-lg-6">
                                        <label for="">Health Condition</label>
                                        <input type="text" style="padding:20px;background-color:#ECECEC" class="form-control condition" placeholder="Enter Health Condition">
                                        <div class="dropdown-container condition_result" style="">
                                        </div>
                                        <div class="condition_qa_result">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Medication</label>
                                        <input type="text" style="padding:20px;background-color:#ECECEC" class="form-control medication" placeholder="Enter Medication">
                                        <div class="dropdown-container medication_result" style="">
                                        </div>
                                        <div class="medication_qa_result">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <!-- <div class="col-lg-6 col-12">
                        </div> -->
                            <div class="col-lg-12 col-12">
                                <h5>{{__('Coverage Options.TERM')}}</h5>
                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-lg-4">
                                        <p style="margin: 0;">{{'Face Amount'}}</p>
                                        <input type="number" class="form-control input-background" id="face_amount1" name="face_amount" placeholder="Face Amount">
                                    </div>
                                    <!-- <div class="col-lg-5"></div> -->
                                    <div class="col-lg-4" style="">
                                        <label for="" style="margin:0">{{__('profile.Coverage Type:')}}</label>
                                        <select name="type" class="form-control input-background">
                                            <option selected value="levels">Level</option>
                                            <option value="modifieds">Graded/Modified</option>
                                            <option value="guaranteeds">Guaranteed</option>
                                            {{-- <option value="limiteds">Limited Pay</option>--}}
                                        </select>
                                    </div>


                                    <!-- <br> -->
                                    <input type="hidden" id="gender" name="gender" value="male">
                                    <!-- <div class="row my-5"> -->
                                    <!-- <div class="col-lg-2 col-2">
                                  
                                </div> -->

                                    <div class="col-lg-2  text-center">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer;">
                                            <p class="m-0">{{__('profile.Sex:')}}</p>
                                            <p class="p-2 gender blue-color" data="male" style=" border-radius: 10px;color: white;">
                                                Male</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center " style="">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer; margin-top:22px">
                                            <p class="p-2 gender pink-color" data="female" style="border-radius: 10px  ">
                                                Female
                                            </p>
                                        </div>
                                    </div>
                                    <!-- </div> -->


                                </div>
                                <!-- <br>
                                <input type="hidden" id="gender" name="gender" value="male">
                                <div class="row my-5">
                                    <div class="col-lg-1 col-2">
                                        <p>{{__('profile.Sex:')}}</p>
                                    </div>
                                    <div class="col-5 text-center ">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="male" style="border: 1px solid #22339e;border-radius: 10px;color: white;background-color:#22339e  ">
                                                Male</p>
                                        </div>
                                    </div>
                                    <div class="col-5 text-center">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="female" style=" border: 1px solid #22339e;border-radius: 10px  ">
                                                Female
                                            </p>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-lg-4">
                                        <label for="cars">{{__('profile.State:')}}</label>
                                        <select name="state" class="form-control input-background">
                                            <option value="Graded/Modified">UnitedKingdom</option>
                                            <option value="Guaranteed">UnitedKingdom</option>
                                            <option value="Limited Pay">UnitedKingdom</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <!-- <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                       
                                        </div> -->
                                        <label style="margin:0">{{__('profile.Birthday:')}}</label>
                                        <div class="row">

                                            <div class="col-lg-3 col-3  p-1 c" style="">
                                                <input type="number" value="07" class="form-control input-background" placeholder="dd">
                                            </div>
                                            <div class="col-lg-3 col-3 p-1" style="">
                                                <input type="number" value="12" class="form-control input-background" placeholder="mm">
                                            </div>
                                            <div class="col-lg-3 col-3 p-1" style="">
                                                <input type="number" style="text-align: center" id="year" name="year" value="1999" class="form-control input-background" placeholder="yy">
                                            </div>
                                            <div class="col-lg-3 col-3 p-1" style="">
                                                <p class="mt-2" id="age_text" style="color: grey;font-size:11px"><span class="pink-colorr">Age</span><br>22</p>
                                            </div>
                                            <input type="hidden" name="age" id="age" value="22">
                                        </div>

                                    </div>
                                    <div class="col-lg-4" style="">
                                        <label class="m-0">{{__('profile.Height/Weight (optional):')}}</label>
                                        <div class="row">
                                            <!-- <div class="col-lg-4 pt-1" style="margin-top: 20px;">
                                            
                                        </div> -->

                                            <div class="col-lg-4 col-4 p-1" style="">
                                                <input type="text" class="form-control input-background" placeholder="ft">
                                            </div>
                                            <div class="col-lg-4 col-4 p-1" style="">
                                                <input type="text" class="form-control input-background" placeholder="in">
                                            </div>
                                            <div class="col-lg-4 col-4 p-1" style="">
                                                <input type="text" class="form-control input-background" placeholder="lbs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top: 40px;">
                                        <label for="cars">{{__('profile.Nicotine Use:')}}</label>
                                        <select name="cigrate" class="form-control input-background">
                                            <option selected value="not_smoker">None</option>
                                            <option value="smoker">Smoking + Nicotine</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 40px;">
                                        <label for="cars">{{__('profile.Payment Type:')}}</label>

                                        <select name="payment" class="form-control input-background">
                                            <option selected value="Bank">Bank</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-12" style="text-align: center;margin-top:68px;">
                                        <button id="get_quote_fex" type="button" style="" class="btn btn-dark quote">{{__('profile.Get Quote')}}</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





</div>

<div class="container mb-5 ">
    <div class="row header dark-blue">
        <div class="col-lg-3">
            <b>{{__('profile.Company Name')}}</b>
        </div>
        <div class="col-lg-3">
            <b>{{__('profile.Monthly')}}</b>
        </div>
        <div class="col-lg-3">
            <b>{{__('profile.Coverage Type')}}</b>
        </div>
        <div class="col-lg-3">
            <b>{{__('profile.Actions')}}</b>
        </div>
    </div>
    <div class=" result ">

    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('assets/js/fexcustom.js')}}"></script>

@endsection