@extends('MainLayout.header')
@section('title')
    <title>Setting</title>
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

    @include('partials.component')

    <div class="container-fluid" style="min-height: 500px;padding-bottom:100px;">
    @include('Logged_pages.fex.layout.layout')

    <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane  active" id="Quoter">
                <div class="container" style="padding-top: 50px;">

                    <form id="form1" method="post" action="{{url("user/fex/setting/update")}}">
                        @csrf

                        <center>
                            <h3 style="color: rgb(52, 8, 86)">{{__('FexToolkit Customization')}}</h3>
                        </center>
                        <div class="row mt-5"
                             style="padding: 2rem;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            @foreach($companies as $company)

                                <div class="col-lg-6 p-2 d-flex justify-content-between">
                                <div>
                                    <p>     {{$company->name}}</p>
                                </div>

                                    <div class="d-flex ">
                                    <input type="number" class="form-control ml-5 w-75" name="commition{{$company->id}}" value="{{$company->commision!=null ? $company->commision->commision : null}}"  placeholder="Commission%">

                                    <label class="switch  ml-2">
                                        <input name="company[{{$company->id}}]" type="checkbox" @if(!$company->disable) checked
                                               @endif value="{{$company->id}}">
                                        <span class="slider round"></span>
                                    </label>
                                    </div>


                                </div>




                            @endforeach

                            <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                                <button id="" type="submit" style="background-color: #340856;padding: 20px"
                                        class="btn btn-dark">{{__('profile.Update')}}</button>


                            </div>

                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>





    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/fexcustom.js')}}"></script>

@endsection
