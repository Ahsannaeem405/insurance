<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/images2.png')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" integrity="sha512-CB+XYxRC7cXZqO/8cP3V+ve2+6g6ynOnvJD6p4E4y3+wwkScH9qEOla+BTHzcwB4xKgvWn816Iv0io5l3rAOBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js">
    </script>
    @section('title')
        <title>Insurance</title>
    @show

</head>
<style>
    .policy-summary input{
        background-color: white;
       color: black;
    }
    .gender_border{
        box-shadow: rgb(66, 229, 219) 0px 7px 20px 0px;
    }

    .dropdown:nth-child(1){
        font-size: 1.75rem;
    }

    nav {
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
    }

    body {
        font-family: "Times New Roman", Times, serif;
    }

    .nav-link {
        font-weight: 700;
        color: darkblue !important;
    }

    .nav-link,
    .dropdown {
        text-align: center;
    }

    .nav-item {
        padding: 0px 7px 0px 7px;

    }

    .margin-class {
        margin-right: -380px;
        background-color: rgba(107, 94, 255, 0.2);
        border-radius: 10px;
        padding: 4px;
        font-family: Inter;
    }

    .lsit-style {
        background-color: #6B5EFF;
        border-radius: 10px;
        padding-right: 10px;
    }
    .lsit-style a{
        color: white !important;
    }

    /* .nav-item:hover{
          border-bottom: 1px solid darkblue;
          color: #00004b !important;


        } */
    .active1 {
        border-bottom: 2px solid darkblue;
    }

    .sign {
        color: #0000A8 !important;
    }

    .sign_tag:hover {
        border-bottom: 1px solid darkblue;

    }

    .logo {
        width: 60px;
    }

    .page-footer {
        background-color: #6B5EFF;
        color: white;
        /* position: absolute;
              bottom:0;
              width: 100%; */
        position: relative;
        left: 0px;
        bottom: 0px;
        width: 100%;
        border-radius: 82px 0px 0px 0px;
    }

    .icons {
        font-size: 17px;
        color: white;
        margin-right: 15px;
    }

    .icon_div {
        text-align: center;
    }

    .icon_row {
        padding: 20px 50px 30px 0px;
    }

    .list-unstyled {
        text-align: left;
    }

    .list-unstyled li a {
        color: white;
    }
    /* .nav-itemz:active{
      color: red !important;
    } */
    .active{
        border-bottom: 5px  solid #6B5EFF;
    }





    @media only screen and (max-width: 425px) {
        .navbar-toggler {
            margin-top: -10px;
        }
    }

    @media only screen and (max-width: 768px) {
        .active1 {
            border: none;
        }

    }

    @media only screen and (max-width: 768px) and (min-width: 768px) {
        .text-uppercase {
            font-size: 15px;
        }
    }

    @media only screen and (max-width: 320px) {
        .text-uppercase {
            font-size: 14px;
        }

    }

    .dropdown-toggle::after {
        content: none;
    }

    .dropdown-menu {
        /*left: -130px*/
    }

    /*@media screen and (max-width: 990px) {*/
    /*  .margin-class {*/
    /*    margin-right: 0px;*/
    /*    color: black;*/
    /*    background-color: white;*/
    /*  }*/




</style>

<body>

@include('partials.component')

    <!-- Footer -->


    <div class="policy-summary p-lg-5 p-md-4 p-3">
        <div class="container-fluid">



            <form action="{{url('user/policy/create')}}" method="post">
                @csrf
                <section class="ps-page-creator px-4 py-4">
                    <div class="row">
                        <div class="col-12 pt-3">
                            <h3>Policy Summary</h3>

                            <div class="row flex-lg-row-reverse">
                                <div class="col-lg-4 col-12 mt-3">
                                    <div class="image-upload mx-auto">
                                        <img src="{{asset("businesscard/$user->businessCard")}}" alt="hello" >
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="row align-items-end ">
                                        <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Agent Name</label>
                                                <input value="{{$user->name}}"  type="text" class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Agent Email</label>
                                                <input type="email"  value="{{$user->email}}"  class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Agent Content No</label>
                                                <input  value="{{$user->phone}}"  type="text" class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        {{--                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">--}}
                                        {{--                                        <div class="form-group text-right">--}}
                                        {{--                                            <button type="submit" class="btn sub-btn w-75 py-2">Add Agent Business Card</button>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </section>
                <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
                    <div class="row">
                        <div class="col-12 pt-3">
                            <h3>Policy Information</h3>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-6 col-12 mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Customer Name</label>
                                                <input type="text" required name="name" class="form-control py-2" value="{{$policy->name}}"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Policy Type </label>
                                                <!-- <input type="email" class="form-control py-2"  placeholder="Type Here"> -->
                                                <input type="text" required name="name" class="form-control py-2" value="{{$policy->type}}"  placeholder="Type Here">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Company Name</label>
                                                <input type="text" required name="name" class="form-control py-2" value="{{$policy->company}}"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Policy Amount</label>
                                                <input type="text" value="{{$policy->amount}}" name="amount" class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Monthly Payment</label>
                                                <input type="text" name="monthly" value="{{$policy->monthly}}" class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Policy Number</label>
                                                <input type="text" name="number" value="{{$policy->number}}" required class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Date</label>
                                                <input type="date" name="date" value="{{$policy->date}}" class="form-control py-2" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
                    <div class="row">
                        <div class="col-12 pt-3">
                            <h3>Agent Social Media Links</h3>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="row align-items-end ">
                                        <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                            <div class="form-group text-center">
                                                <a href="{{$user->fb}}" target="_blank">
                                                    <img src="{{asset('social/fb.png')}}" width="100" height="100" alt="">

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                            <div class="form-group text-center">

                                                <a href="{{$user->linkin}}" target="_blank">
                                                    <img src="{{asset('social/Linkedin.png')}}" width="100" height="100" alt="">

                                                </a>


                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                            <div class="form-group text-center">


                                                <a href="{{$user->twitter}}" target="_blank">
                                                    <img src="{{asset('social/twitter.png')}}" width="100" height="100" alt="">

                                                </a>

                                            </div>
                                        </div>


                                        @foreach($links as $link)
                                            <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                                <div class="form-group text-center">

                                                    <a href="{{$link->link}}" target="_blank">
                                                        <img src="{{asset('social/social.webp')}}" width="100" height="100" alt="">

                                                    </a>


                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--                        <div class="row justify-content-end">--}}
                            {{--                            <div class="col-lg-4 col-12 mt-3">--}}
                            {{--                                <div class="form-group text-right">--}}
                            {{--                                    <button type="submit" class="btn sub-btn w-75 py-2">+ Add More</button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                        </div>
                    </div>
                </section>

                <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
                    <div class="row">
                        <div class="col-12 pt-3">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label >NOTES</label>
                                                <textarea class="form-control"  name="notes" rows="5" placeholder="Type Here">{{$policy->notes}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </form>
        </div>
    </div>



    <footer class="page-footer font-small pt-4 footer-s">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row" style="">

                <!-- Grid column -->
                <!-- <div class="col-md-1 col-12 mt-md-0 mt-3">

                </div> -->
                <div class="col-12 col-md-3 mt-3 d-flex justify-content-center">
                    <div>
                        <div class="">
                            <img src="{{asset('images/footerlogo.png')}}" alt="" class="logo" style="height:62px; width:142px;margin-top:-28px">
                        </div>
                        <div class="" style="margin-top: 10px;">
                            <p>P: +121 342 45 5645</p>
                        </div>
                        <div class="">
                            <p>
                                E: example@gmail.com
                            </p>
                        </div>
                        <div class="input-container" style="background-color: white;border-radius:10px">
                            <input class="input-field" type="text" placeholder="Enter Email To Subscribe..." name="psw" style="height: 37px;border:none;border-radius:7px;width:208px;padding:12px"> <i class="fas fa-arrow-right icon" style="color: black;font-size:20px;padding-right:7px;"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    {{-- <h5 class="text-uppercase">Footer Content</h5> --}}
                    {{-- <p>Copyright © Insurance Toolkits, LLC.</p> --}}
                </div>
                <!-- Grid column -->

                <!-- <hr class="clearfix w-100 d-md-none pb-3"> -->

                <!-- Grid column -->
                <div class=" col-12 col-md-3 d-flex justify-content-center" style="text-align: left;">
                    <div>


                        <!-- Links -->
                        <b class="text-uppercase">
                            {{__('profile.Navigation')}}</b>

                        <ul class="list-unstyled">
                            <li>
                                <a href="{{url('#')}}">{{__('profile.Fex')}}</a>
                            </li>
                            <li>
                                <a href="{{url('#')}}">{{__('profile.Term')}}</a>
                            </li>
                            <li>
                                <a href="{{url('#')}}">{{__('profile.Legal Checker Term')}}</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-12 col-md-3 d-flex justify-content-center" style="text-align: left;">
                    <div>


                        <!-- Links -->
                        <b class="text-uppercase">{{__('profile.About')}}</b>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">{{__('profile.Contact Us')}}</a>
                            </li>
                            <li>
                                <a href="#!">{{__('profile.Privacy & Policy')}}</a>
                            </li>
                            {{-- <li>
                            <a href="#!">FexToolkit Lite</a>
                          </li> --}}
                            <li>
                                <a href="#!">{{__('profile.Terms and Conditions')}}</a>
                            </li>
                            <li>
                                <a href="#!">{{__('profile.Faq')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-12 col-md-3 d-flex justify-content-center" style="text-align: left;">
                    <div>


                        <!-- Links -->
                        <b class="text-uppercase">{{__('profile.Stay Connected')}}</b>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!"><i class="fab fa-facebook-square icons"></i>{{__('profile.Facebook')}}</a>
                            </li>
                            <li>

                                <a href="#!"><i class="fab fa-twitter-square icons"></i>{{__('profile.Twitter')}}</a>
                            </li>
                            <li>
                                <a href="#!"><i class="fab fa-instagram-square icons"></i>{{__('profile.Instagram')}}</a>
                            </li>
                        {{-- <li>
                          <a href="#!">CRM</a>
                        </li> --}}
                        <!-- <li>
              <a href="#!">{{__('profile.Health Cheat Sheet')}}</a>
            </li>
            <li>
              <a href="#!">{{__('profile.Drug Lookup')}}</a>
            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="{{url('/')}}">Insurance.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}

</body>

</html>
