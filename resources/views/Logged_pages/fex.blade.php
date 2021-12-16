@extends('MainLayout.header')
@section('title')
    <title>Fex</title>
@endsection
<style>
    .table{
        margin-top: 80px;
    }
    .header{
        background-color: #340856;
        color: white;
        padding: 25px;
        text-align: center;
        border-radius: 10px;
    }
    .data{
        margin-top: 40px;
        box-shadow: 0 30px 60px 0 rgba(0,0,0,0.1);
        padding: 10px;
        border-radius: 10px;
    }
    .center{
        text-align: center;
    }
    .v_class{
        padding-top: 10px;
        vertical-align: middle;
        margin:auto;
    }


    .show{
        display: block !important;
    }
    .company{
        box-shadow: 0 0 11px rgba(33,33,33,.2);
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
        .header{
            display: none !important;
        }
        .div_hide{
            display: block !important;
        }
        .fa-chevron-down{
            display: none !important;
        }


    }

</style>
@section('content')
    <div class="container-fluid" style="min-height: 500px;padding-bottom:100px;">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#Quoter" role="tab" data-toggle="tab">Quoter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Quotecompare" role="tab" data-toggle="tab">Quote Compare</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#setting" role="tab" data-toggle="tab">Settings</a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane  active" id="Quoter">
                <div class="container-fluid" style="padding-top: 50px;">

                    <form  id="form1">



                        <center>
                            <h3 style="color: rgb(52, 8, 86)">{{__('profile.Get a Final Expense Quote')}}</h3>
                        </center>
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-lg-6 col-12" style="border-right: 1px solid lightgray ">
                                <h5>{{__('Coverage Options.TERM')}}</h5>
                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-lg-5">
                                        <p>{{'Face Amount'}}</p>
                                        <input type="number" class="form-control" name="face_amount" placeholder="Face Amount">
                                    </div>
                                    <div class="col-lg-5"></div>

                                    <div class="col-lg-5" style="margin-top: 20px;">
                                        <label for="">{{__('profile.Coverage Type:')}}</label>

                                        <select name="type" class="form-control">
                                            <option selected value="levels">Level</option>
                                            <option value="modified">Modified</option>
                                            <option value="Guaranteed">Guaranteed</option>
                                            <option value="Limited">Limited Pay</option>
                                        </select>
                                    </div>
                                </div><br>




                                <input type="hidden" id="gender" name="gender" value="male">
                                <div class="row my-5">
                                    <div class="col-lg-1 col-2">

                                        <p>{{__('profile.Sex:')}}</p>
                                    </div>

                                    <div class="col-5 text-center ">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="male"
                                               style="border: 1px solid #22339e;border-radius: 10px;color: white;background-color:#22339e  ">
                                                Male</p>
                                        </div>
                                    </div>

                                    <div class="col-5 text-center">
                                        <div class="col-sm-12 p-0" style="margin: auto;cursor: pointer">
                                            <p class="p-2 gender" data="female"
                                               style=" border: 1px solid #22339e;border-radius: 10px  ">
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
                                        <input type="number" style="text-align: center" id="year" value="1999" class="form-control" placeholder="yy">
                                    </div>

                                    <div class="col-lg-2 col-3 p-1" style="margin-top: 20px;">
                                        <p class="mt-2" id="age_text" style="color: grey">age(22)</p>
                                    </div>

                                    <input type="hidden" name="age" id="age" value="22">

                                </div>

                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-lg-4 pt-1" style="margin-top: 20px;">
                                        <p>{{__('profile.Height/Weight (optional):')}}</p>
                                    </div>
                                    <div class="col-lg-1 col-4 p-1" style="margin-top: 20px;">
                                        <input type="text" class="form-control" placeholder="ft">
                                    </div>
                                    <div class="col-lg-1 col-4 p-1" style="margin-top: 20px;">
                                        <input type="text" class="form-control" placeholder="in">
                                    </div>
                                    <div class="col-lg-1 col-4 p-1" style="margin-top: 20px;">
                                        <input type="text" class="form-control" placeholder="lbs">
                                    </div>
                                    <div class="col-lg-7" style="margin-top: 40px;">
                                        <label for="cars">{{__('profile.Nicotine Use:')}}</label>

                                        <select name="cigrate" class="form-control">
                                            <option selected value="non_smoker">None</option>
                                            <option value="smoker">Cigerette</option>

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
                            <div class="col-lg-6 col-12">
                                <h4>{{__('profile.Drug and Health Information')}}</h4><br>
                                <input type="text" class="form-control" placeholder="Enter Health Condition"><br>
                                <input type="text" class="form-control" placeholder="Enter Medication"><br>


                            </div>
                            <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                                <button id="get_quote_fex" type="button" style="background-color: #340856" class="btn btn-dark">{{__('profile.Get Quote')}}</button><br><br>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="Quotecompare">
                <div class="container-fluid" style="padding-top: 50px;">
                    <center>
                        <h3 style="color: rgb(52, 8, 86)">{{__('profile.Compare Final Expense Quotes')}}</h3>
                    </center>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-6 col-12" style="border-right: 1px solid lightgray ">
                            <h5>Coverage Options</h5>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>


                                <div class="col-lg-7" style="margin-top: 20px;">
                                    <label for="cars">{{__('profile.Company:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">AIG</option>
                                        <option value="Guaranteed">CFG</option>
                                        <option value="Limited Pay">Americo</option>
                                    </select>
                                </div>
                                <div class="col-lg-7" style="margin-top: 20px;">
                                    <label for="cars">{{__('profile.Coverage Type:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">Graded/Modified</option>
                                        <option value="Guaranteed">Guaranteed</option>
                                        <option value="Limited Pay">Limited Pay</option>
                                    </select>
                                </div>
                            </div><br><br>







                        </div>
                        <div class="col-lg-6 col-12">
                            <h5>{{__('profile.About the client')}}</h5><br>
                            <p>{{__('profile.Sex:')}}</p>
                            <input type="radio" name="gender" value="male">
                            <label for="{{__('profile.Male')}}">{{__('profile.Male')}}</label><br>
                            <input type="radio" id="css" name="gender" value="female">
                            <label for="{{__('profile.Female')}}">{{__('profile.Female')}}</label><br>

                            <label for="cars">{{__('profile.State:')}}</label>

                            <select name="type" class="form-control">
                                <option value="Graded/Modified">UnitedKingdom</option>
                                <option value="Guaranteed">UnitedKingdom</option>
                                <option value="Limited Pay">UnitedKingdom</option>
                            </select>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                    <p>{{__('profile.Birthday:')}}</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="dd">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="mm">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="yy">
                                </div>
                                <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                                    <p>Or</p>
                                </div>
                                <div class="col-lg-3" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="Ages">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-4 pt-1" style="margin-top: 20px;">
                                    <p>{{__('profile.Height/Weight (optional):')}}</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="ft">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="in">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="lbs">
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">{{__('profile.Nicotine Use:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Cigerette">Cigerette</option>
                                        <option value="Alcohol">Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">{{__('profile.Payment Type:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="Bank">Bank</option>
                                        <option value="Direct">Direct</option>
                                        <option value="Credit Card">Credit Card</option>
                                    </select>
                                </div>



                            </div>


                        </div>
                        <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                            <button style="background-color: #340856" class="btn btn-dark">{{__('profile.Compare Quote')}}</button>
                        </div>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="setting">
                <div class="container p-3">
                    <h3 style="color: #340856;" class="text-center">{{__('profile.Insurance Toolkit')}}</h3>
                    <div class="row">
                        <div class="col-lg-6 col-12 p-2">
                            <h3 class="">{{__('profile.Your Link')}}</h3>
                            <input type="text" class="form-control" value="https://insurancetoolkits.com/fex/lite/?token=wfuXPwcxBHjk5lzx0OI8zd7oF-xQ7RPVqIMtTEC5" readonly>
                            <p>This is your personal FexToolkit link, which allows anyone with the URL to run a basic quote.
                                You can share it with a colleague, bookmark it on your phone or computer, or otherwise share it around as you see fit.</p>
                            <h3 class="mt-5">{{__('profile.Your Widget HTML Code')}}</h3>
                            <input type="text" value="link" class="form-control mt-3" readonly>
                            <p>Copy the code above to your website to allow people to run quotes directly from your website.</p>
                        </div>
                        <div class="col-lg-6 col-12 p-5">
                            <h5>{{__('profile.Final Expense Quoter')}}</h5>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-1" style="padding-top: 5px;">
                                    Or
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-6" style="margin-top: 20px;">
                                    <label for="cars">{{__('profile.Coverage Type:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">Graded/Modified</option>
                                        <option value="Guaranteed">Guaranteed</option>
                                        <option value="Limited Pay">Limited Pay</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <h5>{{__('profile.About the client')}}</h5><br>
                            <p>{{__('profile.Sex:')}}</p>
                            <input type="radio" name="gender" value="male">
                            <label for="{{__('profile.Male')}}">{{__('profile.Male')}}</label><br>
                            <input type="radio" id="css" name="gender" value="female">
                            <label for="{{__('profile.Female')}}">{{__('profile.Female')}}</label><br><br>

                            <label for="cars">{{__('profile.State:')}}</label>

                            <select name="type" class="form-control">
                                <option value="Graded/Modified">UnitedKingdom</option>
                                <option value="Guaranteed">UnitedKingdom</option>
                                <option value="Limited Pay">UnitedKingdom</option>
                            </select>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                    <p>{{__('profile.Birthday:')}}</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="dd">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="mm">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="yy">
                                </div>
                                <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                                    <p>Or</p>
                                </div>
                                <div class="col-lg-3" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="Ages">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">{{__('profile.Nicotine Use:')}}</label>

                                    <select name="type" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Cigerette">Cigerette</option>
                                        <option value="Alcohol">Alcohol</option>
                                    </select>
                                </div>


                                <div class="col-lg-12" style="margin-top: 40px;">

                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-lg-12" style="margin-top: 40px;">

                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>

                                <div class="col-lg-12" style="margin-top: 40px;">

                                    <button  class="btn btn-primary text-center">{{__('profile.Get a Quote')}}</button>
                                </div>




                            </div>





                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>





    </div>

    <div class="container mb-5">
        <div class="row header" >
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
    <script>
        $(document).ready(function(){



            $(document).on('keyup','#year',function(){


var year=$(this).val();

                var date=   new Date().getFullYear()
                $('#age').val(date-year);

                var fina=date-year;
                $('#age_text').empty().append("age("+fina+")");

            });

            $(document).on('click','.fa-chevron-down',function(){

             var id=   $(this).attr('id');

                $(".div_show"+id).toggleClass('show');
            });


            $(".gender").click(function () {

                $(this).css('background-color', '#2A2C7F');
                $(this).css('color', 'white');

                $('.gender').not(this).css('color', '#2A2C7F');
                $('.gender').not(this).css('background-color', 'white');

                $('#gender').val($(this).attr('data'));
            });


            $("#get_quote_fex").click(function () {



                var formData = new FormData((document.getElementById('form1')));


                $.ajax({
                    type: 'POST',
                    url: "{{ url('user/get_quote_fex')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function (response) {

                        $('.result').empty().append(response);
                    }
                });
            });


        });
    </script>
@endsection
