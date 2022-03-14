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
  @section('header')

  @if(!Auth::check())
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/images2.png')}}" alt="" class="logo"></a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">

          <a class="nav-link " id="fex" href="{{url('/fex')}}">{{__('profile.FEX')}} </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="term" href="{{url('/term')}}">{{__('profile.TERM')}}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pricing" href="{{url('/pricing')}}">{{__('profile.PRICING')}}</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" id="login" href="{{url('/login')}}">{{__('profile.LOGIN')}}</a>
        </li>
        <li class="nav-item sign_tag">
          <a class="nav-link sign" href="{{url('/register')}}">{{__('profile.SIGN UP')}}</a>
        </li>
        <li class="nav-item sign_tag">
          <div class="dropdown">
            <i style="font-size: 25px" class="fas fa-globe-americas dropdown-toggle mt-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div style="margin-left: -130px" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
              <a class="dropdown-item" href="{{url('lang/sp')}}">Spanish</a>
            </div>
          </div>
        </li>

      </ul>
    </div>
  </nav>


  @else


  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/sitelogo.png')}}" alt="" class="logo" style="height:62px; width:175px;margin-left:20px"></a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <div class="collapse navbar-collapse " id="navbarNavDropdown" style="margin-right: -380px;">

    </div> -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav m-auto margin-class" style="">
          <li class="nav-item {{ (request()->is('user/dashboard')) ? 'lsit-style' : '' }}" style="padding-right: 10px;">
              <a class="nav-link" id="term" href="{{url('/user/dashboard')}}">{{('Dashboard')}}</a>
          </li>


        <li class="nav-item  {{ ((request()->is('user/fex'))  ||  (request()->is('user/fex/quote/compare')) || (request()->is('user/fex/setting')))  ? 'lsit-style' : '' }}">
          <a class="nav-link "  id="fex" href="{{url('/user/fex')}}">{{__('profile.FEX')}} </a>
        </li>
        <li class="nav-item {{ ((request()->is('user/term'))  ||  (request()->is('user/term/quote/compare')) || (request()->is('user/term/setting')))  ? 'lsit-style' : ''}}" style="padding-right: 10px;">
          <a class="nav-link " id="term" href="{{url('/user/term')}}">{{__('profile.TERM')}}</a>
        </li>
        <li class="nav-item {{ (request()->is('user/legeal/checker/term')) ? 'lsit-style' : '' }}" style="padding-right: 10px;">
          <a class="nav-link" id="term" href="{{url('/user/legeal/checker/term')}}">{{__('profile.Legeal checker term')}}</a>
        </li>
          <li class="nav-item {{ (request()->is('user/legeal/checker/fex')) ? 'lsit-style' : '' }}" style="padding-right: 10px;">
              <a class="nav-link" id="term" href="{{url('/user/legeal/checker/fex')}}">{{('Legal Fex')}}</a>
          </li>

          <li class="nav-item {{ (request()->is('user/policy')) || (request()->is('user/policy/index')) ? 'lsit-style' : '' }}" style="padding-right: 10px;">
              <a class="nav-link" id="term" href="{{url('/user/policy')}}">{{('Policy')}}</a>
          </li>


      </ul>
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" id="login" href="{{url('/user/account')}}">{{__('profile.Accounts')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">Logout</a>
        </li>
        <li class="nav-item sign_tag">
          <div class="dropdown">
            <i style="font-size: 25px" class="fas fa-globe-americas dropdown-toggle mt-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div style="margin-left: -130px" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
              <a class="dropdown-item" href="{{url('lang/sp')}}">Spanish</a>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </nav>
  <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-md-1 d-flex jsutify-content-center">
       Quoter
        </div>
        <div class="col-md-2 d-flex jsutify-content-center">
      Quote Compare
        </div>
        <div class="col-md-2 d-flex jsutify-content-center">
        Settings
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div> -->
  @endif
  @show
  @yield('content')
  @section('footer')
  <!-- Footer -->
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

  @show

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}

</body>

</html>
