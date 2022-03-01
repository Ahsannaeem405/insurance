<style>
   .popup{
       z-index: 1000;
       display: none;
       width: 200px;
       margin-left: -75px;
       background-color: white;
       box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
       padding: 10px;
   }

</style>




<!-- Modal -->
<div class="modal fade" id="pushtocrm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('user/pushToCrm')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Client Name</lable>
                            <input type="text"  name="name" class="form-control" required>
                        </div>
                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Client Email</lable>
                            <input type="email"  name="email" class="form-control" >
                        </div>
                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Date Added</lable>
                            <input type="date"  name="created" value="{{date('Y-m-d')}}" class="form-control" >
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Product Name</lable>
                            <input type="text"  name="tagline" id="taglinedata" class="form-control" >
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Monthly Premium</lable>
                            <input type="text"  name="price" id="pricedata" class="form-control">
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Date of Birth</lable>
                            <input type="date"  name="dob"  class="form-control">
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Address</lable>
                            <input type="text"  name="addreess"  class="form-control">
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Phone</lable>
                            <input type="text"  name="phone"  class="form-control">
                        </div>

                        <div class="col-lg-12 mb-3 d-flex">
                            <lable class="d-block mr-2" style="white-space: pre;" >Notes</lable>
                            <input type="text"  name="notes"  class="form-control">
                        </div>



                            <input type="hidden"  name="company" id="companydata" class="form-control" >
                            <input type="hidden"  name="typedata" id="typedata" value="fex" class="form-control">

                    </div>
                    <div class="modal-footer" style="border-top: none">
                        <button type="submit" class="btn btn-primary ">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@foreach($data as $record)

@if(!$record['disable'])
    <div class="row w-100 data mr-0 ml-0">
        <div class="col-lg-3  col-12 center">
            <p>{{$record['data']->Company}}</p>
            {{--            <img src="{{asset('images/transam.png')}}" style="width: 220px;" alt="">--}}
        </div>
        <div class="col-lg-3  col-12 center v_class" style="">
            <p>{{$record['data']->price}}</p>
        </div>
        <div class="col-lg-3  col-12 center v_class">
            <p>{{$record['data']->Tagline}}</p>
        </div>
        <div class="col-lg-3  col-12 center v_class d-flex">

@if(isset($record['conditiondata']))

                @if($record['conditiondata']->$agent!="")
                    <div class="position-relative p-1 pt-0">

                        <span class="infoplan"  alt="" style="cursor: pointer;font-size: 18px;color: green">$</span>

                        <div class="text-center position-absolute popup">
                            <div class="">
                                <div class="font-1p2 semi-bold black font-weight-bold ">Why?</div>
                                <div class="mt-1"><p>{{$record['conditiondata']->$agent}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

    @if($record['conditiondata']->$plan!="")
            <div class="position-relative p-1">

                <img class="infoplan" src="{{asset('images/info.png')}}" alt="" style="cursor: pointer;width: 18px">

                <div class="text-center position-absolute popup"
                     style="">
                    <div class="">
                        <div class="font-1p2 semi-bold black font-weight-bold">Plan Info</div>
                        <div class="mt-1"><p>{{$record['conditiondata']->$plan}} </p>
                           </div>
                    </div>
                </div>
            </div>
            @endif

        @if($record['conditiondata']->$reason!="")
            <div class="position-relative p-1">

                <img class="infoplan" src="{{asset('images/question-mark.png')}}" alt="" style="cursor: pointer;width: 18px">

                <div class="text-center position-absolute popup"
                     style="">
                    <div class="">
                        <div class="font-1p2 semi-bold black font-weight-bold ">Why?</div>
                        <div class="mt-1"><p>{{$record['conditiondata']->$reason}} </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif




            @endif


{{--            &nbsp;<i class="fas fa-chevron-down p-2" id="{{$record['data']->id}}"></i>--}}
    <a target="_blank" href="{{url('user/fex/quote/compare?company='.$record['data']->company_id.'&age='.$age.'&gender='.$gender.'&face='.$face_amount.'&cigrate='.$cigrate.'&type='.$type.'&year='.$year_data.'')}}">    <button class="btn btn-warning m-auto" style="color: white">compare</button>
    </a>

    <a class="ml-1">
        <button  data-toggle="modal" price="{{$record['data']->price}}" tagline="{{$record['data']->Tagline}}" company="{{$record['data']->company_id}}" data-target="#pushtocrm" class="btn btn-warning m-auto pushtocrm" style="color: white">push to crm</button>
    </a>



        </div>

        <div class="row div_show{{$record['data']->id}} div_hide  w-100" style="display:none;">
{{--            <div class="col-lg-12 text-center" style="padding:10px">--}}
{{--                <p>Annual Rate: $168.20</p>--}}
{{--                <p>+Accidental Death Monthly Rate: $16.12</p>--}}
{{--                <p>+Accidental Death Annual Rate: $183.20</p>--}}
{{--            </div>--}}

        </div>
    </div>
@endif
@endforeach




@foreach($datanot as $record)
    @if(!$record['disable'])
    <div class="row w-100 data mr-0 ml-0">
        <div class="col-lg-12  col-12 ">
            <p style="color:lightgray;">{{$record['data']->name}}</p>

            @if(isset($record['conditiondata']))

                @if($record['conditiondata']->$reason!="")
                    <div class="position-relative p-2">
                        <img class="" src="{{asset('images/question-mark.png')}}" alt="" style="width: 22px">

<span style="color:lightgray;">{{$record['conditiondata']->$reason}} {{', Decline'}}</span>

                    </div>
                @endif






            @endif
        </div>

    </div>
@endif
@endforeach


