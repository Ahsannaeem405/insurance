@extends('MainLayout.header')
@section('title')
    <title>Profile</title>
@endsection
<link rel="stylesheet" href="{{asset('css/pricing.css')}}">

<style>
    .account {
        padding: 50px;
        margin-top: 30px;
        /* -webkit-box-shadow: 0 30px 10px 0 rgba(0,0,0,0.2); */
        border-radius: 10px !important;
        box-shadow: 0 30px 10px 0 rgba(0, 0, 0, 0.1);


    }

    label {
        color: #340856;
        font-weight: bold;
    }

    .status {
        box-shadow: 0 15px 10px 0 rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;

    }

</style>
@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#info" role="tab"
               data-toggle="tab">{{__('profile.Personal Information')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Subscription" role="tab" data-toggle="tab">{{__('profile.Subscription')}}</a>
        </li>

    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane  active" id="info">
            <div class="container p-5">
                <form method="post" action="{{url('update/profile')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="card w-100 mb-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="card-body ">
                                <h3 class="text-center mb-5"
                                    style="color: #340856">{{__('profile.Personal Information')}}</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-12">

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

                                        <div class="col-lg-12 mb-3 text-center">
                                            <img src="{{asset('businesscard/'.Auth::user()->businessCard.'')}}"
                                                 id="my_image" class="d-block m-auto" style="width: 150px;height: 150px"
                                                 alt="">
                                            <input class="d-none" onchange="readURL(this);" type="file"
                                                   name="businessCard"
                                                   id="profile">
                                            <br>
                                            <button type="button" id="pofile_btn"
                                                    class="btn sub-btn w-50  d-block m-auto">Add Agent Business Card
                                            </button>

                                        </div>


                                        <label> Name</label>
                                        <input type="text" name="name" required value="{{Auth::user()->name}}"
                                               class="form-control" placeholder="First Name"><br>


                                        <label>Email</label>
                                        <input type="text" name="email" readonly required class="form-control"
                                               placeholder="Example@gmail.com" value="{{Auth::user()->email}}"><br>


                                        <label> Contact number</label>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}"
                                               class="form-control" placeholder="Contact number"><br>


                                        <label>old Password</label>
                                        <input type="password" name="old_password" class="form-control"
                                               placeholder="old password"><br>


                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="New password"><br>
                                        @if($errors->has('password'))

                                            <p style="color: red">
                                                <strong>{{$errors->first('password')}}</strong>
                                            </p>
                                        @endif

                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                               placeholder="Confirm password"><br>


                                    </div>
{{--                                    <div class="col-lg-6 col-12">--}}
{{--                                        <h5>Referral Link</h5><br>--}}
{{--                                        <input type="text"--}}
{{--                                               value="{{Request::root().'/register/?referral='.Auth::user()->id}}"--}}
{{--                                               class="form-control" readonly><br>--}}
{{--                                        <b style="color: #340856">*Special Offer</b><br>--}}
{{--                                        <p style="color: gray">Get a $20 credit for every person you refer that--}}
{{--                                            successfully signs up and pays for Insurance Toolkits using your link.</p>--}}
{{--                                    </div>--}}


                                </div>


                            </div>

                        </div>


                        <div class="card w-100 mb-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="card-body ">
                                <h3 class="text-center mb-5" style="color: #340856">{{'Agent Social Media Links'}}</h3>
                                <div class="row" >
                                    <div class="col-12">
                                        <div class="row align-items-end " id="socialmedia">
                                            <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" name="fb" value="{{Auth::user()->fb}}"
                                                           class="form-control py-2"
                                                           placeholder="Type Here">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                                <div class="form-group">
                                                    <label>LinkedIn</label>
                                                    <input type="text" name="linkin" value="{{Auth::user()->linkin}}"
                                                           class="form-control py-2"
                                                           placeholder="Type Here">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                                <div class="form-group">
                                                    <label>Twitter</label>
                                                    <input type="text" name="twitter" value="{{Auth::user()->twitter}}"
                                                           class="form-control py-2"
                                                           placeholder="Type Here">
                                                </div>
                                            </div>
                                            @foreach($links as $link)
                                                <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                                    <div class="form-group">
                                                        <label>Custom Link</label>
                                                        <input type="text" name="customlink[]"
                                                               value="{{$link->link}}"
                                                               class="form-control py-2"
                                                               placeholder="Type Here">
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-4 col-12 mt-3">
                                        <div class="form-group text-right">
                                            <button type="button" class="btn sub-btn w-75 py-2" id="addMoreLinks">+ Add
                                                More
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                        <div class="card w-100 mb-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="card-body ">
                                <div class="row">


                                    <div class="col-lg-12 text-center">

                                        <button type="submit" style="background-color: #340856;padding:20px"
                                                class="btn btn-dark">Update
                                        </button>

                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>
                </form>
            </div>


        </div>
        <div role="tabpanel" class="tab-pane fade" id="Subscription">
            <div class="container-fluid" style="padding: 50px;">


                <center><h4 class="my-5" style="color: #340856;">
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
                            Your subscription is valid until <span style="font-weight: bold">  {{\Carbon\Carbon::parse($date1)->format('Y-M-d')}}.
                        </span>
                        </p><br>
                        <a href="{{url('cancel/subscription')}}" onclick="return confirm('Are you sure you want cancel your subscription?');">
                            <button class="btn btn-danger" style="">
                                Cancel Subscription
                            </button>
                        </a>


                        <a href="{{url('pricing')}}">
                            <button class="btn btn-dark" style="background-color: #340856;float: right;">Resume
                                Subscription
                            </button>
                        </a>
                    </div>


                </div>


            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {

            var i = 1;
            $("#pofile_btn").click(function () {

                $('#profile').click();


            });
            $("#addMoreLinks").click(function () {


                var html = '<div class="col-lg-4 col-12  mt-0 mt-md-3">'
                    + '<div class="form-group">'
                    + ' <label >Custom  Link ' + i++ + '</label>'
                    + '<input type="text" name="customlink[]" class="form-control py-2"  placeholder="Type Here">'
                    + '</div>'
                    + '</div>';

                $('#socialmedia').append(html);
            });

        });
    </script>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#my_image')
                        .attr('src', e.target.result);
                };


                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
