@foreach($data as $record)

    <div class="row w-100 data mr-0 ml-0">
        <div class="col-lg-3  col-12 center">
            <p>{{$record->Company}}</p>
{{--            <img src="{{asset('images/transam.png')}}" style="width: 220px;" alt="">--}}
        </div>
        <div class="col-lg-3  col-12 center v_class" style="">
            <p>{{$record->price}}</p>
        </div>
        <div class="col-lg-3  col-12 center v_class" >
            <p>{{$record->Tagline}}</p>
        </div>
        <div class="col-lg-3  col-12 center v_class" >
           &nbsp;<i class="fas fa-chevron-down" id="{{$record->id}}"></i>
        </div>

       <div class="row div_show{{$record->id}} div_hide  w-100" style="display:none;" >
        <div class="col-lg-12 text-center" style="padding:10px">
            <p>Annual Rate: $168.20</p>
            <p>+Accidental Death Monthly Rate: $16.12</p>
            <p>+Accidental Death Annual Rate: $183.20</p>
        </div>

       </div>
    </div>

    @endforeach
