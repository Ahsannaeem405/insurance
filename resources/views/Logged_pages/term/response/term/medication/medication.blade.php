@php $medication='medication_'.$language.'' @endphp
@foreach($rec as $data)
    <div class="dropdown-item med_data" con="{{$data->medication_e}}" id="{{$data->medication_id}}">{{$data->$medication}}</div>
@endforeach
