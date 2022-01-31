@if(count($rec)!=0)
    @php
        $rand = random_int(100000, 999999);
        $i = 1;
    @endphp
    @php $medication='medication_'.$language.'' @endphp
    @php $condition='condition_'.$language.'' @endphp

    <div id="con_div_{{$rand}}" class="mt-3">
        <div class="dropdown-container-fluid treatment-div mb-5"
             style="background-color: white;   box-shadow: 0 3px 15px 0 rgb(0 0 0 / 20%);padding:1rem;  ">
            <div>
            <div style="border:none;"class="dropdown">
            {{$rec[0]->$medication}}
            <i style="float: right;color: red;cursor: pointer" id_data="{{$rand}}"
               class="fa fa-trash p-1 con_remove"> </i>
            <i style="float: right;color: purple;cursor: pointer" id_data="{{$rand}}" status="show"
               class="fa fa-edit p-1 con_edit"> </i>
            </div>
                <div class="current_ques_{{$rand}}_{{$i}} all_ques_{{$rand}} medication_Con" conidtion_id="{{$rec[0]->id}}" rand={{$rand}} jump="1" i="{{$i}}">
                    <h3 class="text-center mt-2" style="color: #6B5EFF;">Please select condition</h3>
                    @foreach($rec as $data)
                        <p><input value="{{$data->condition_id}}" name="selec_condition{{$rand}}" type="radio"> {{$data->$condition}}</p>
                    @endforeach
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="m-auto">
                    <input type="button" id="back_ques_med" class="btn btn-secondary back_ques_med{{$rand}} btn-style" style="border-radius:22px"
                           current="1" rand="{{$rand}}" total="{{1}}"
                           value="BACK">
                    <span class="start_status_med{{$rand}}">1</span> / <span
                        class="end_status_med{{$rand}}">{{1}}</span>
                    <input type="button" value="NEXT" class="next_ques_med{{$rand}} btn btn-primary  btn-style" style="border-radius:22px"
                           id="next_ques_med" current="1" rand="{{$rand}}"
                           total="{{1}}"
                           style="background-color: #8b8be1;border: #8282cb">
                </div>
            </div>
        </div>
    </div>

@else


    <script>
        var message = 'No condition Question found.'


        $('.toast-body').empty();
        $('.toast-body').text(message);

        $('.toast').toast({

            delay: 3000
        });
        $('.toast').toast('show');
    </script>

@endif
