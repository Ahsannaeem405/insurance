<div class="row">

    @if($rec1)
    <div class="col-lg-4">


        <div class="quote-result auto-center mx-1 mt-3 col p-1 py-2 relative" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
{{--            <div class="absolute top-0 left-2 pxw-30">--}}

{{--                    <div class="relative cursor"><img src="{{asset('images/info.png')}}" class="pxw-30 pxmt-5"> <!----></div>--}}

{{--            </div>--}}

            <div class="text-center pb-1 font-0p9">{{$rec1->Tagline}}</div>
            <div class="text-center font-weight-bold" style="font-size: 28px">{{$rec1->price}}<span class="font-0p9">/mo</span></div>
            <div class="text-center pt-2 pb-1 font-1p2">Face Amount</div>
            <div class="text-center font-weight-bold" style="font-size: 28px">${{$rec1->Amount}}</div> <!---->
            <div class="col w-100 auto-center mt-5 pb-3">

            </div>
        </div>

    </div>

        @endif

        @if($rec2)
            <div class="col-lg-4">


                <div class="quote-result auto-center mx-1 mt-3 col p-1 py-2 relative" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    {{--            <div class="absolute top-0 left-2 pxw-30">--}}

                    {{--                    <div class="relative cursor"><img src="{{asset('images/info.png')}}" class="pxw-30 pxmt-5"> <!----></div>--}}

                    {{--            </div>--}}

                    <div class="text-center pb-1 font-0p9">{{$rec2->Tagline}}</div>
                    <div class="text-center font-weight-bold" style="font-size: 28px">{{$rec2->price}}<span class="font-0p9">/mo</span></div>
                    <div class="text-center pt-2 pb-1 font-1p2">Face Amount</div>
                    <div class="text-center font-weight-bold" style="font-size: 28px">${{$rec2->Amount}}</div> <!---->
                    <div class="col w-100 auto-center mt-5 pb-3">

                    </div>
                </div>

            </div>

        @endif


        @if($rec3)
            <div class="col-lg-4">


                <div class="quote-result auto-center mx-1 mt-3 col p-1 py-2 relative" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    {{--            <div class="absolute top-0 left-2 pxw-30">--}}

                    {{--                    <div class="relative cursor"><img src="{{asset('images/info.png')}}" class="pxw-30 pxmt-5"> <!----></div>--}}

                    {{--            </div>--}}

                    <div class="text-center pb-1 font-0p9">{{$rec3->Tagline}}</div>
                    <div class="text-center font-weight-bold" style="font-size: 28px">{{$rec3->price}}<span class="font-0p9">/mo</span></div>
                    <div class="text-center pt-2 pb-1 font-1p2">Face Amount</div>
                    <div class="text-center font-weight-bold" style="font-size: 28px">${{$rec3->Amount}}</div> <!---->
                    <div class="col w-100 auto-center mt-5 pb-3">

                    </div>
                </div>

            </div>

        @endif


</div>
