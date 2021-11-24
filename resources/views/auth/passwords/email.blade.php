@extends('MainLayout.header')
@section('title')
    <title>Reset password</title>
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
            <div class="col-lg-4 login" style="height: 300px">
                <h4 style="color: darkblue;" >{{__('profile.Forgot Password')}}</h4>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="post" class="p-3 mb-3 "  >
                    @csrf

                    <input  type="email" name="email" style="height: 50px" required placeholder="Email" class="form-control mb-2" value="{{ old('email') }}">

                    @if($errors->has('email'))

                        <span style="color: red">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                    @endif








                    <hr>

                    <button  type="submit"  class="btn btn-success font-weight-bold"  style="border:none;height:50px;background-color: #42b72a"> {{ __('Send Password Reset Link') }}
                    </button>

                </form>

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
