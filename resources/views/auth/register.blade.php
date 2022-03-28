@extends('MainLayout.header')
@section('title')
    <title>SignUp</title>
@endsection
<style>
    .con {
        text-align: center;
        padding: 20px;
        color: darkblue;
    }
    .hide{
        display: none;
    }

    .con1 {
        /* padding: 50px 30px 50px 30px !important; */
        padding-left: 20px !important;
        padding-right: 20px !important;

        padding-bottom: 20px;
        border: 1px solid white;
        margin-bottom: 40px;
        border-radius: 10px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        max-width: 790px !important;

    }

    .box {
        background-color: orange;
        text-align: center;
        border-radius: 11px;
        width: 70px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .box1 {
        background-color: purple;
        text-align: center;
        border-radius: 11px;
        width: 70px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .box_orange {
        margin-top: 20px;
        border: 1px solid orange;
        padding: 20px;
        border-radius: 10px;
    }

    .box_purple {
        margin-top: 20px;
        border: 1px solid purple;
        padding: 20px;
        border-radius: 10px;
    }

    /* togglebutton */

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
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: orange;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px orange;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
        height: 30px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    @media only screen and (max-width: 320px) {

        .heading {
            margin-left: 5px !important;
            font-size: 13px !important;
        }
    }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')
    <div class="containerfluid con">
        <h2>Sign Up</h2>
    </div>
    <div class="container con1">
        <h5 style="color: gray; margin-top:20px">{{__('profile.Personal Information')}}</h5>
        <form role="form" action="{{ url('register_user') }}" method="post" class="require-validation"
              data-cc-on-file="false"
              data-stripe-publishable-key="{{ env('STRIPE_KEY')}}"
              id="payment-form">
            @csrf

            @if(isset($_GET['referral']))
                @php $refral=$_GET['referral']; @endphp

            @else
                @php $refral=0; @endphp

                @endif



            <input type="hidden" name="refral" value="{{$refral}}">
            <input type="hidden" name="f_price" id="f_price" value="{{$price->p_cost}}">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <input type="text" name="f_name" value="{{old('f_name')}}" class="form-control" style="margin-top:20px" required
                           placeholder="First Name">
                </div>
                <div class="col-lg-6 col-12">
                    <input type="text" name="l_name" value="{{old('l_name')}}" class="form-control" required style="margin-top:20px"
                           placeholder="Last Name">
                </div>
                <div class="col-lg-12 col-12" style="margin-top:20px">
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" required placeholder="Email">

                    @if($errors->has('email'))

                        <span style="color: red">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-lg-12 col-12" style="margin-top:20px">
                    <input type="password" name="password" class="form-control" required placeholder="Password">

                    @if($errors->has('password'))

                        <span style="color: red">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                    @endif

                </div>
                <div class="col-lg-12 col-12" style="margin-top:20px">
                    <textarea  name="about" class="form-control" id="" required
                              placeholder="How did you hear about us?" cols="2" rows="5"></textarea>

                    @if($errors->has('about'))

                        <span style="color: red">
                                        <strong>{{$errors->first('about')}}</strong>
                                    </span>
                    @endif

                </div>
                <div class="col-lg-12" style="margin-top:20px">
                    <h5 style="color: gray; margin-top:20px">Promo</h5>


                </div>
                <div class="col-lg-3 col-md-3 col-12" style="margin-top:20px">
                    <input type="text" placeholder="Promo Code" name="promo" id="promo_code" class="form-control">
                    <span style="color: red" id="promo_code_msg">

                                    </span>
                    <span style="color: green" id="promo_code_msg2">

                                    </span>

                    @if($errors->has('promo'))

                        <span style="color: red">
                                        <strong>{{$errors->first('promo')}}</strong>
                                    </span>
                    @endif

                </div>
                <div class="col-lg-12" style="margin-top:20px">
                    <h5 style="color: gray">Choose Your Plan</h5>
                </div>


                <div class="options">

                    <div class="col-lg-12 " style="margin-top:20px">
                        <div class="container box_purple">
                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-10" style="text-align: center;    display: flex;">
                                    <div class="box1">
                                        {{-- <i class="fas fa-briefcase" style="font-size: 40px; color:white"></i> --}}
                                        <i class="fas fa-clipboard-list" style="font-size: 40px; color:white"></i>

                                    </div>
                                    <h5 class="heading" style="margin-top: 20px;margin-left: 16px;">{{$price->p_name}}</h5>

                                </div>
                                <div class="col-lg-5 col-12" style="padding-top:20px; ">
                                    <b style="float:right;">

                                       ${{$price->p_cost}} / {{$price->p_days}} days</b>
                                </div>

                                <div class="col-lg-12 col-12" style="padding-top:20px; ">

                                    <ul>
                                        <li>14 days free trail</li>
                                        <li>Create and remove agent accounts</li>
                                        <li>Includes 5 agent accounts. More accounts can be added at $24.99/account per
                                            month.
                                        </li>
                                        <li>Unlimited use of all in-field sales tools</li>

                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-12 mb-3" style="padding-top: 20px;">
                    <h5 style="color: gray;">Payment</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12" style="padding-top: 20px;">
                                <img src="{{ asset('images/credit-cards.png') }}" alt="" style="width:100%;">
                            </div>
                        </div>
                    </div>
                </div>



                    <div class='col-lg-6 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                            class='form-control' size='4' type='text'>
                    </div>



                    <div class='col-lg-6 form-group  required'>
                        <label class='control-label'>Card Number</label> <input
                            autocomplete='off' class='form-control card-number' size='20'
                            type='text'>
                    </div>



                    <div class=' col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                        type='text'>
                    </div>
                    <div class=' col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                            class='form-control card-expiry-month' placeholder='MM' size='2'
                            type='text'>
                    </div>
                    <div class=' col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                            type='text'>
                    </div>



                    <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try
                            again.</div>
                    </div>





                <div class="col-lg-6 col-md-6 col-12" style="padding-top: 20px;">
                    <button type="submit" class="btn btn-primary">{{__('profile.Register Now')}}</button>
                </div>
                <div class="col-lg-6 col-md-6 col-12" style="padding-top: 20px;">
                    <p><span style="font-size: 19px; font-weight:bold">Total:
                        $<span id="total_bill">{{$price->p_cost}}</span>



                        </span>/{{$price->p_days}} days</p>
                </div>

            </div>


        </form>
    </div>


    <script>
        $(document).ready(function(){

            $("#promo_code").change(function(){
var promo=$(this).val();

                $.ajax({
                    type: 'get',
                    url: "promo",
                    data: {'promo': promo, },


                    success: function (response) {

if(response['success']!=true)
{
$('#promo_code_msg').text(response['message']);
$('#promo_code_msg2').text('');
    $('#total_bill').text(response['price']);
    $('#f_price').val(response['price']);

}
else {
    $('#promo_code_msg').text();
    $('#total_bill').text(response['price']);
    $('#f_price').val(response['price']);
    $('#promo_code_msg2').text(response['message']);
    $('#promo_code_msg').text('');


}

                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

@endsection
