<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    @section('title')
  <title>Insurance</title>
  @show

  </head>
  <style>
      .nav-link{
          font-weight: 700;
          color: darkblue !important;
      }
      .nav-link{
          text-align: right;
      }
      .nav-item{
        padding: 0px 7px 0px 7px;
      }
      .active{
          border-bottom: 2px solid darkblue;
      }
      .sign{
          color: #FF7036 !important;
      }
      .sign_tag:hover{
        border-bottom: 2px solid darkblue;

      }
      .logo{
          width: 25%;
      }
      .page-footer{
          background-color:#340856;
          color: white;
          /* position: absolute;
          bottom:0;
          width: 100%; */
          position: fixed;
    left: 0px;
    bottom: 0px;
    width: 100%;
      }
      .icons{
          font-size: 40px;
          color: white;
      }
      .icon_div{
          text-align: center;
      }
      .icon_row{
          padding: 20px 50px 30px 0px;
      }
      .list-unstyled li a{
          color: white;
      }
      @media only screen and (max-width: 768px) and (min-width: 768px)  {
        .text-uppercase{
            font-size: 12px;
        }
      }
  </style>
  <body>
    @section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="{{asset('images/logo1.png')}}" alt="" class="logo"></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">FEX </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">TERM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">MED SUPP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/pricing')}}">PRICING</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{url('/login')}}">LOGIN</a>
              </li>
              <li class="nav-item sign_tag">
                <a class="nav-link sign" href="{{url('/signup')}}">SIGN UP</a>
              </li>

          </ul>
        </div>
      </nav>


    @show

    @yield('content')


    @section('footer')
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row" style="padding: 10px">

        <!-- Grid column -->
        <div class="col-md-4 col-12 mt-md-0 mt-3">
            <div class="row icon_row">
                <div class="col-lg-3 col-3 icon_div ">
                 <a href="#"><i class="fab fa-facebook-square icons"></i></a>
                </div>
                <div class="col-lg-3 col-3 icon_div">
                    <a href="#"><i class="fab fa-linkedin icons"></i></a>
                   </div>
                   <div class="col-lg-3 col-3 icon_div">
                    <a href="#"><i class="fab fa-twitter-square icons"></i></a>
                   </div>
                   <div class="col-lg-3 col-3 icon_div">
                    <a href="#"><i class="fab fa-youtube icons"></i></a>
                   </div>
            </div>

          <!-- Content -->
          {{-- <h5 class="text-uppercase">Footer Content</h5> --}}
          <p>Copyright © Insurance Toolkits, LLC.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-2 col-6 mb-md-0 mb-3">

          <!-- Links -->
          <b class="text-uppercase">
            InsuranceToolkits</b>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Pricing</a>
            </li>
            <li>
              <a href="#!">Login</a>
            </li>
            <li>
              <a href="#!">Sign Up</a>
            </li>

          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-6 mb-md-0 mb-3">

          <!-- Links -->
          <b class="text-uppercase">FexToolkit Tools</b>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Quotes</a>
            </li>
            <li>
              <a href="#!">Quotes Compare</a>
            </li>
            <li>
              <a href="#!">FexToolkit Lite</a>
            </li>
            <li>
              <a href="#!">CRM</a>
            </li>
            <li>
                <a href="#!">Health Cheat Sheet</a>
              </li>
              <li>
                <a href="#!">Drug Lookup</a>
              </li>
          </ul>

        </div>
        <!-- Grid column -->
        <div class="col-md-2 col-6 mb-md-0 mb-3">

            <!-- Links -->
            <b class="text-uppercase">TermToolkit Tools</b>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Quotes</a>
              </li>
              <li>
                <a href="#!">Quotes Compare</a>
              </li>
              <li>
                <a href="#!">TermToolkit Lite</a>
              </li>
              <li>
                <a href="#!">CRM</a>
              </li>
              <li>
                  <a href="#!">Health Cheat Sheet</a>
                </li>
                <li>
                  <a href="#!">Drug Lookup</a>
                </li>
            </ul>

          </div>
          <!-- Grid column -->
          <div class="col-md-2 col-6 mb-md-0 mb-3">

            <!-- Links -->
            <b class="text-uppercase">Legal</b>




            <ul class="list-unstyled">
              <li>
                <a href="#!">Contact</a>
              </li>
              <li>
                <a href="#!">Terms of Service</a>
              </li>
              <li>
                <a href="#!">Privacy</a>
              </li>

            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="#">Insurance.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

    @show

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
