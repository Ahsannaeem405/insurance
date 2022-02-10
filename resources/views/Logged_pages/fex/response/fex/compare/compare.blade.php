@if($rec1 || $rec2 || $rec3 || $rec4 || $rec5 || $rec6)


@if($rec1 || $rec2 || $rec3)
    <div class="row">
    <div class="col-lg-3 d-flex justify-content-center align-items-center">
        <h4 style="color:#6B5EFF">{{$company1->name}} </h4>
    </div>
    @if($rec1)
    <div class="col-lg-3 mb-4">
        <div class="promise-level text-center p-1">
            <p style="padding-top:15px">{{$rec1->Tagline}}</p>
            <div class="package-price text-center">
                <p style="padding-top: 8px;">{{$rec1->price}}/mo</p>
                <div class="face-amount">
                    <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                        Face Amount
                    </p>
                    <p style="padding:0px;padding-bottom:12px"class="text-center">
                        ${{$rec1->Amount}}
                    </p>
                </div>
            </div>
        </div>
    </div>
        @endif


    @if($rec2)
        <div class="col-lg-3 mb-4">
            <div class="promise-level text-center p-1">
                <p style="padding-top:15px">{{$rec2->Tagline}}</p>
                <div class="package-price text-center">
                    <p style="padding-top: 8px;">{{$rec2->price}}/mo</p>
                    <div class="face-amount">
                        <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                            Face Amount
                        </p>
                        <p style="padding:0px;padding-bottom:12px"class="text-center">${{$rec2->Amount}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($rec3)
        <div class="col-lg-3 mb-4">
            <div class="promise-level text-center p-1">
                <p style="padding-top:15px">{{$rec3->Tagline}}</p>
                <div class="package-price text-center">
                    <p style="padding-top: 8px;">{{$rec3->price}}/mo</p>
                    <div class="face-amount">
                        <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                            Face Amount
                        </p>
                        <p style="padding:0px;padding-bottom:12px"class="text-center">
                            ${{$rec3->Amount}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

@else

    <div class="row">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
            <h4 style="color:#6B5EFF">{{$company1->name}} </h4>
        </div>

        <div class="col-lg-9">
            <span  style="color: red;font-size: 25px">No Record Found</span>
        </div>

    </div>
@endif


@if($rec4 || $rec5 || $rec6)
<div class="row">
    <div class="col-lg-3 d-flex justify-content-center align-items-center">
        <h4 style="color:#6B5EFF">{{$company2->name}} </h4>
    </div>
    @if($rec4)
        <div class="col-lg-3 mb-4">
            <div class="promise-level text-center p-1">
                <p style="padding-top:15px">{{$rec4->Tagline}}</p>
                <div class="package-price text-center">
                    <p style="padding-top: 8px;">{{$rec4->price}}/mo</p>
                    <div class="face-amount">
                        <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                            Face Amount
                        </p>
                        <p style="padding:0px;padding-bottom:12px"class="text-center">
                            ${{$rec4->Amount}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($rec5)
        <div class="col-lg-3 mb-4">
            <div class="promise-level text-center p-1">
                <p style="padding-top:15px">{{$rec5->Tagline}}</p>
                <div class="package-price text-center">
                    <p style="padding-top: 8px;">{{$rec5->price}}/mo</p>
                    <div class="face-amount">
                        <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                            Face Amount
                        </p>
                        <p style="padding:0px;padding-bottom:12px"class="text-center">
                            ${{$rec5->Amount}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($rec6)
        <div class="col-lg-3 mb-4">
            <div class="promise-level text-center p-1">
                <p style="padding-top:15px">{{$rec6->Tagline}}</p>
                <div class="package-price text-center">
                    <p style="padding-top: 8px;">{{$rec6->price}}/mo</p>
                    <div class="face-amount">
                        <p style="color: #6B5EFF;padding-top:10px" class="text-center">
                            Face Amount
                        </p>
                        <p style="padding:0px;padding-bottom:12px"class="text-center">
                            ${{$rec6->Amount}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>


@else

    <div class="row">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
            <h4 style="color:#6B5EFF">{{$company1->name}} </h4>
        </div>

        <div class="col-lg-9">
            <span  style="color: red;font-size: 25px">No Record Found</span>
        </div>


    </div>

@endif

@else
<div class="row text-center">
    <div class="col-lg-12">
    <span  style="color: red;font-size: 25px">No Record Found</span>
    </div>
</div>



        @endif



