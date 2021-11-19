@extends('MainLayout.header')
@section('title')
 <title>Fex</title>
 @endsection
 <link rel="stylesheet" href="{{asset('css/pricing.css')}}">
 <style>
     .con{
         margin-top: 30px;
         margin-bottom: 30px;
         padding: 50px 40px 50px 40px !important;
         border-radius: 10px;
         /* padding-left: 20px ;
        padding-top: 50px;
        padding-bottom: 50px; */
        background-color: #F6F8FA;

     }
     .con1{
         padding-bottom: 20px;
     }
     .con2{
        /* background-color: #F5F5F6; */
        padding:50px 50px 50px 50px !important;
        border-radius:10px;
        margin-top: 20px;
     }
     .con3{
        padding:50px 50px 50px 50px !important;
        text-align: center;
        -webkit-box-shadow: 0 0px 34px 0 rgba(0, 0, 0, 0.3);
        margin-top: 30px;
        border-radius: 10px;

     }
     .carousel{
        height: 500px;
     }
     @media only screen and (max-width: 425px)  {
        .carousel{
        height: 250px;
     }
     .carousel-item img {
       min-height: 250px;

     }

     }
     .carousel-item img{
         width: 100%;
         max-height: 500px;
     }
     .div_data{
        padding-top: 20px;
  /* -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3); */
  border-radius: 10px;


     }
     .login{
        padding: 20px;
        background-color: #F5F5F6;
        text-align: center;
        border-radius: 5px;
    }
    .row1{
        padding: 10px;
    }
    .btn-submit{
        text-decoration: none;
        background-color: #FFD84D !important;
        color: white !important;
        border: none !important;
        box-shadow: none !important;

    }

    .image_div{
        padding-left: 20px !important;
        padding-right: 20px !important;

    }




      .box{
        background-color: orange;
    text-align: center;
    border-radius: 11px;
    width: 70px;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .box1{
        background-color: purple;
    text-align: center;
    border-radius: 11px;
    width: 70px;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .box_orange{
        margin-top: 20px;
    border: 1px solid orange;
    padding: 20px;
    border-radius: 10px;
    height: 100%;
    }
    .box_purple{
        margin-top: 20px;
    border: 1px solid purple;
    padding: 20px;
    border-radius: 10px;
    height: 100% !important;

    }
    .btn-primary{
        position: absolute;
    right: 40%;
    bottom: -8px;
    box-shadow: none !important;
    border: none !important;
    }
    .row_space{
        margin-top: 90px;
    }

 </style>
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('images/Slider2.jpg')}}" alt="First slide">
        {{-- <div class="carousel-caption">
            <h3 style="color: purple"><i class="fas fa-clinic-medical"></i> MedSupp Insurance</h3><br>
            <div style="display: inline-flex">
                <button style="background-color: purple" class="btn btn-dark">Start Free Trail</button>
                <button style="margin-left: 20px;"  class="btn btn-dark">Demo</button>

            </div>

          </div> --}}



      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/slider3.jpg')}}" alt="Second slide">
        {{-- <div class="carousel-caption">
            <h3 style="color: purple"><i class="fas fa-hourglass-end"></i> Term Insurance</h3><br>

            <div style="display: inline-flex">
                <button style="background-color: purple" class="btn btn-dark">Start Free Trail</button>
                <button style="margin-left: 20px;"  class="btn btn-dark">Demo</button>

            </div>
          </div> --}}

      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/slider4.jpg')}}" alt="Third slide">
        {{-- <div class="carousel-caption">
            <h3 style="color: purple"><i class="fas fa-briefcase-medical"></i> Fex Insurance</h3><br>

            <div style="display: inline-flex">
                <button style="background-color: purple" class="btn btn-dark">Start Free Trail</button>
                <button style="margin-left: 20px;"  class="btn btn-dark">Demo</button>

            </div>
          </div> --}}
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



   <div class="container con2">
    <div class="row ">
        <div class="col-lg-6 col-12" style="margin-top:30px; ">
            <h3 style="color: #340856">FexToolkit</h3>
            <p>Put many years of deals and endorsing experience in your pocket. Being specialists ourselves, we've managed everything previously, so we put it into FexToolkit so you don't need to. We work with endless individual specialists and offices to convey devices that permit you to maintain your business all the more proficiently while diminishing superfluous mistake and cerebral pain. Regardless of whether you have an association or are an independent person, FexToolkit is intended to improve your business.</p>
            <button class="btn btn-dark" style="background-color: #340856">Learn More</button>
        </div>
        <div class="col-lg-6  col-12" style="margin-top:30px; ">
            <img src="{{asset('images/slider4.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
        </div>
    </div>
    <div class="row row_space">

        <div class="col-lg-6 col-12" style="margin-top:30px; ">
            <img src="{{asset('images/slider4.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
        </div>
        <div class="col-lg-6 col-12" style="margin-top:30px; ">
            <h3 style="color: #340856">TermToolkit</h3>
            <p>We made it our main goal to smooth out the endorsing + citing process for term items. You can feel better prepared to deal with a wide range of circumstances and customers when you have the assets held inside TermToolkit available to you. Both TermToolkit and FexToolkit meet up on one stage so you can be certain about dealing with whatever gets tossed your direction.</p>
            <button class="btn btn-dark" style="background-color: #340856">Learn More</button>

        </div>
    </div>
    <div class="row row_space">
        <div class="col-lg-6 col-12" style="margin-top:30px; ">
            <h3 style="color: #340856;">Medicare Supplement Toolkit (BETA)</h3>
            <p>Your customers treat their medical coverage in a serious way - and we realize you do likewise. Position yourself to prevail in one of the quickest developing business sectors in the country with our arrangement of Medicare Supplement transporters and instruments. Decide the best fit for your customers by citing, guaranteeing, and putting away your cases on a stage not accessible elsewhere in the business. Government medical care Supplement Toolkit permits you or your representatives to go into any circumstance unhesitatingly with the goal that you can pick the right arrangement, without fail.</p>
            <button class="btn btn-dark" style="background-color: #340856">Learn More</button>
        </div>
        <div class="col-lg-6  col-12" style="margin-top:30px; ">
            <img src="{{asset('images/slider4.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
        </div>
    </div>
   </div>

<div class="container con3" >
<h3 style="color: #340856">Additional Features</h3><br>
<div class="row">
    <div class="col-lg-6 col-12">
        <h4 style="color: #340856;">CRM</h4>
        <p style=" text-align: justify;">Store and deal with your book of business with our HIPAA agreeable CRM arrangement. Incorporated straightforwardly into your Fex + TermToolkit account, our foundation permits you to flawlessly sort and store your book of both dynamic and possible customers.</p>
    </div>
    <div class="col-lg-6 col-12">
       <img src="{{asset('images/form.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
    </div>

</div>
</div>
<div class="container row_space" style="text-align: center;">
    {{-- <h3 style="color: #340856;">Pricing</h3>
    <div class="row">


         <div class=" offset-lg-2 offset-md-2 col-lg-8 col-md-8 col-12 " style="margin-top:20px;">
            <div class="box_purple">
                <div class="row">

                    <div class="col-lg-6  col-12" style="text-align: center;    display: flex;">
                        <div class="box1">
                            <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i>

                        </div>
                        <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">Bussiness</h5>

                    </div>

                    <div class="col-lg-6 col-12" style="padding-top:20px; ">
                        <b style="float:right;">
                            $
                            34
                            .99
                            /month</b>
                    </div>

                    <div class="col-lg-12 col-12" style="padding-top:20px; text-align:left; ">
                <center><b>All the features of the Agency Plan, plus..</b></center>


                <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit</p>
                <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Unlimited use of the quoter and underwriter</p>
                <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Unlimited use of all in-field sales tools</p>
                <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Access to CRM</p>
                <p><i class="fas fa-check" style="color: purple;font-size:25px;"></i> Unlimited quotes per day on your shareable ‘Lite Link’. Every account comes with your own public URL that you can share with a colleague or bookmark on your phone.</p>


                    </div>
                </div>

                <center><button class="btn btn-primary" style="background-color: purple">Start Free Trail</button></center>

            </div>
        </div>
    </div> --}}

    <div class="demo">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h3 class="title">Bussiness</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">$10</span>
                    </div>
                    <span class="time">Per Month</span>
                    <ul class="pricing-content">
                        <li> Unlimited use of FexToolkit, TermToolkit, and MedSuppToolkit</li>
                        <li>Unlimited use of the quoter and underwriter</li>
                        <li>Unlimited use of all in-field sales tools</li>
                        <li>Access to CRM</li>

                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#">Start Free Trail</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <h3 class="title">Business</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">$20</span>
                    </div>
                    <span class="time">Per Month</span>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>15 Subdomains</li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="open_grepper_editor" title="Edit & Save To Grepper"></div>
</div><br>






<div class="container con1 row_space" >
    <div class="row row1">
        <div class="col-lg-8 col-md-6 col-12">
            {{-- <img src="{{asset('images/message.jpg')}}" alt="" style="max-height: 460px; width:100%;"> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.5227719268473!2d74.33887921428163!3d31.5097988813731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919045c800b7a65%3A0x9bfe5a537cfceea4!2sMonal%20Restaurant!5e0!3m2!1sen!2s!4v1637134261216!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-lg-4 col-md-6 login">
            <h4 style="color: darkblue;" >Message Us</h4>
            <input type="text" class="form-control" placeholder="Name" style="margin-top:20px;">

            <input type="email" class="form-control" placeholder="Enter Your Email" style="margin-top:20px;">
            <input type="text" class="form-control" placeholder="Number" style="margin-top:20px;">
            <textarea name="" id="" class="form-control" rows="3" placeholder="Message" style="margin-top:20px;"></textarea>
            <button class="form-control btn-submit"  style="margin-top:20px;">Submit</button><br>

        </div>
    </div>

</div>

@endsection
