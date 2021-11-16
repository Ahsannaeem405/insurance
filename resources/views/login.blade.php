@extends('MainLayout.header')
@section('title')
 <title>Login</title>
 @endsection
<style>
    .con1{
        padding: 30px;
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
    }
    .image_div{
        padding-left: 20px !important;
        padding-right: 20px !important;

    }
    @media only screen and (max-width: 768px)  {
        .image_div{
            display: none;
        }
        .login{
            margin-left: auto;
            margin-right: auto;
            padding-left:50px !important;
            padding-right:50px !important;

        }

    }
</style>

@section('content')
<div class="container con1">
    <div class="row row1">
        <div class="col lg-8 image_div">
            <img src="{{asset('images/login.jpg')}}" alt="" style="max-height: 460px; width:100%;">
        </div>
        <div class="col-lg-4 login">
            <h4 style="color: darkblue;" >Login</h4>
            <input type="email" class="form-control" placeholder="Enter Your Email" style="margin-top:20px;">
            <input type="password" class="form-control" placeholder="Enter Your Password" style="margin-top:20px;">
            <button class="form-control btn-submit"  style="margin-top:20px;">Submit</button><br>
            <a href="#" >Forgot Password</a>

        </div>
    </div>

</div>
@endsection
