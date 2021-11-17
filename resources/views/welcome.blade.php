@extends('MainLayout.header')
@section('title')
 <title>Fex</title>
 @endsection
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
        background-color: #F5F5F6;
        padding:50px 50px 50px 50px !important;
        border-radius:10px;
     }
     .con3{
        padding:50px 50px 50px 50px !important;
        text-align: center;
     }
     .carousel{
        height: 500px;
     }
     @media only screen and (max-width: 425px)  {
        .carousel{
        height: 250px;
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
/* card */
.baseBlock {
	margin: 0px 0px 35px 0px;
	padding: 0 0 15px 0px;
	border-radius: 5px;
	overflow: hidden;
	min-height: 390px;
	background: #fff;
	-moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	-o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.baseBlock:hover {
	-webkit-transform: translate(0, -8px);
	-moz-transform: translate(0, -8px);
	-ms-transform: translate(0, -8px);
	-o-transform: translate(0, -8px);
	transform: translate(0, -8px);
	box-shadow: 0 40px 40px rgba(0, 0, 0, 0.2);
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


      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/slider3.jpg')}}" alt="Second slide">

      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('images/slider4.jpg')}}" alt="Third slide">
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

  <div class="container" style="margin-top:40px;">
    <h4 style="color: #340856">Services</h4><br>

    <div class="row">
     <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/CRM.png')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">CRM</h4>
       <p class="card-text">Use our inherent CRM which permits you to handily save customer data, take notes, and view deals insights</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
        <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/drug.png')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">Drug Lookup</h4>
       <p class="card-text">Straightaway reference a medication or blend of medications without expecting to run a full statement</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
        <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/ultimate-insurance-cheat-sheet-0.png')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">Health Cheat Sheet</h4>
       <p class="card-text">The quickest method for checking endorsing boundaries on an assortment of medical issue</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
        <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/image(1).jpg')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">Quoter</h4>
       <p class="card-text">Enter your prospect's information and let FexToolkit take care of the rest</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
        <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/images (2).png')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">Quote Compare</h4>
       <p class="card-text">Need to run numerous statements on the double? With Quote Compare you can immediately run three statements one next to the other</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
        <div class="col-lg-4 col-sm-6 col-12">
      <div class="card baseBlock">
     <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="{{asset('images/Healthcare_terms_word_cloud.png')}}" data-holder-rendered="true">
     <div class="card-body">
       <h4 class="card-title">Insurance Lite</h4>
       <p class="card-text">A personal URL that you can bookmark, share with a colleague, or even integrate directly into your website</p>
       {{-- <a href="#" class="btn btn-primary">View</a> --}}
     </div>
   </div>
     </div>
    </div>
   </div>

   <div class="container con2">
    <div class="row">
        <div class="col-lg-6 col-12">
            <h3 style="color: #340856">Why do we need Insurance?</h3>
            <p>Insurance is a way of managing risks. When you buy insurance, you transfer the cost of a potential loss to the insurance company in exchange for a fee, known as the premium. Insurance companies invest the funds securely, so it can grow, and pay out when there’s a claim.</p>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <img src="{{asset('images/slider4.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
        </div>
    </div><br><br>
    <div class="row">

        <div class="col-lg-6 col-12">
            <img src="{{asset('images/slider4.jpg')}}" style="width: 100%;border-radius:10px;" alt="">
        </div>
        <div class="col-lg-6 col-12">
            <h3 style="color: #340856">Why do we need Insurance?</h3>
            <p>Insurance is a way of managing risks. When you buy insurance, you transfer the cost of a potential loss to the insurance company in exchange for a fee, known as the premium. Insurance companies invest the funds securely, so it can grow, and pay out when there’s a claim.</p>
        </div>
    </div>
   </div>

<div class="container con3" >
    <h3 style="color: #340856">Carriers We Support</h3><br>
    <div class="row row1">
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
<div class="col-lg-3 col-6">
    <p style="color: gray">AIG (Guaranteed Issue)</p>
</div>
    </div>
</div>





<div class="container con1" style="margin-top: 30px;">
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
