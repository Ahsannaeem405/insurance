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
        box-shadow: none !important;

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
                <img src="{{asset('images/20944573.jpg')}}" alt="" style="max-height: 500px; width:100%;">
            </div>
            <div class="col-lg-4 login">
                <h4 style="color: darkblue;" >{{__('profile.signIn')}}</h4>
               <form action="{{url('login')}}" method="post">
                   @csrf
                <input type="email" value="{{old('email')}}" required name="email" class="form-control" placeholder="Enter Your Email" style="margin-top:20px;">

                   @if($errors->has('email'))

                       <span style="color: red">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                   @endif
                <input type="password" required name="password" class="form-control" placeholder="Enter Your Password" style="margin-top:20px;">


                <button class="form-control btn-submit"  style="margin-top:20px;">{{__('profile.submit')}}</button><br>
               </form>
                <a href="#" >{{__('profile.Forgot Password')}}</a>

            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.nav-item').removeClass("active1");
            $('#login').addClass("active1");

        });
    </script>
@endsection
