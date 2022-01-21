@extends('MainLayout.header')
@section('title')
    <title>Fex Compare</title>
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

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
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
            <div role="tabpanel" class="tab-pane  active" id="Quoter">
                <div class="container-fluid" style="padding-top: 50px;">

                    <form id="form1">


                        <center>
                            <h3 style="color: rgb(52, 8, 86)">{{__('profile.Compare Final Expense Quotes')}}</h3>
                        </center>
                        <div class="row" style="margin-top: 40px;">

                            <div class="col-lg-6 col-12">
                                <h4>{{__('profile.Drug and Health Information')}}</h4><br>


                                <div class="row" style="margin-top: 40px;">


                                    <div class="col-lg-3 ml-lg-5">

                                        <input type="number" class="form-control" value="{{$request->face}}" id="face_amount1" name="face_amount1"
                                               placeholder="Face Amount">

                                    </div>
                                    <span class="text-center">or</span>
                                    <div class="col-lg-3">

                                        <input type="number" class="form-control" id="face_amount2" name="face_amount2"
                                               placeholder="Face Amount">
                                    </div>
                                    <span>or</span>
                                    <div class="col-lg-3">

                                        <input type="number" class="form-control" id="face_amount3" name="face_amount3"
                                               placeholder="Face Amount">
                                    </div>

                                    <br>
                                    <br>
                                    <br>


                                    <div class="col-lg-5" style="margin-top: 20px;display: block">
                                        <label for="">{{__('profile.Coverage Type:')}}</label>

                                        <select name="type" class="form-control">
                                            <option @if($request->type=="levels") selected @endif value="levels">Level</option>
                                            <option @if($request->type=="modifieds") selected @endif value="modifieds">Graded/Modified</option>
                                            <option @if($request->type=="guaranteeds") selected @endif value="guaranteeds">Guaranteed</option>
                                            {{--                                            <option value="limiteds">Limited Pay</option>--}}
                                        </select>
                                    </div>


                                    <div class="col-lg-5" style="margin-top: 20px;">
                                        <label for="">{{__('profile.Company:')}}</label>

                                        <select name="company" class="form-control">
                                            @foreach($companies as $company)


                                            <option @if($request->company==$company->id) selected @endif  value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                            {{--                                            <option value="limiteds">Limited Pay</option>--}}
                                        </select>
                                    </div>
                                </div>
                                <br>


                            </div>
                            <div class="col-lg-6 col-12" >
                                <h5>{{__('profile.About the client')}}</h5>



                                <input type="hidden" id="gender" name="gender" value="{{$gender}}">
                                <div class="row my-5">
                                    <div class="col-lg-1 col-2">

                                        <p>{{__('profile.Sex:')}}</p>
                                    </div>

                                    <div class="col-5 text-center ">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="male"
                                               style="@if($gender=='male') border: 1px solid #22339e;border-radius: 10px;color: white;background-color:#22339e @else  border: 1px solid #22339e;border-radius: 10px  @endif ">
                                                Male</p>
                                        </div>
                                    </div>

                                    <div class="col-5 text-center">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="female"
                                               style="  @if($gender=='female') border: 1px solid #22339e;border-radius: 10px;color: white;background-color:#22339e @else  border: 1px solid #22339e;border-radius: 10px  @endif ">
                                                Female
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <label for="cars">{{__('profile.State:')}}</label>

                                <select name="state" class="form-control">
                                    <option value="Graded/Modified">UnitedKingdom</option>
                                    <option value="Guaranteed">UnitedKingdom</option>
                                    <option value="Limited Pay">UnitedKingdom</option>
                                </select>
                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                        <p>{{__('profile.Birthday:')}}</p>
                                    </div>
                                    <div class="col-lg-1 col-3  p-1 c" style="margin-top: 20px;">
                                        <input type="number" value="07" class="form-control" placeholder="dd">
                                    </div>
                                    <div class="col-lg-1 col-3 p-1" style="margin-top: 20px;">
                                        <input type="number" value="12" class="form-control" placeholder="mm">
                                    </div>
                                    <div class="col-lg-2 col-3 p-1" style="margin-top: 20px;">
                                        <input type="number" style="text-align: center" id="year" value="{{$year}}"
                                               class="form-control" placeholder="yy">
                                    </div>

                                    <div class="col-lg-2 col-3 p-1" style="margin-top: 20px;">
                                        <p class="mt-2" id="age_text" style="color: grey">age({{$age}})</p>
                                    </div>

                                    <input type="hidden" name="age" id="age" value="{{$age}}">

                                </div>

                                <div class="row" style="margin-top: 10px;">

                                    <div class="col-lg-7" style="margin-top: 10px;">
                                        <label for="cars">{{__('profile.Nicotine Use:')}}</label>

                                        <select name="cigrate" class="form-control">
                                            <option @if($request->company=='not_smoker') selected @endif value="not_smoker">None</option>
                                            <option @if($request->company=="smoker") selected @endif value="smoker">Smoking + Nicotine</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-7" style="margin-top: 40px;">
                                        <label for="cars">{{__('profile.Payment Type:')}}</label>

                                        <select name="payment" class="form-control">
                                            <option selected value="Bank">Bank</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select>
                                    </div>


                                </div>


                            </div>

                            <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                                <button id="get_quote_compare_fex" type="button" style="background-color: #340856;padding: 20px"
                                        class="btn btn-dark">{{__('profile.Get Quote')}}</button>
                                <br><br>

                            </div>

                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>





    </div>

    <div class="container mb-5">
        <div class="row header">
            <div class="col-lg-12">
                <b>{{__('Options')}}</b>
            </div>

        </div>
        <div class=" result ">

        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/fexcustom.js')}}"></script>

@endsection
