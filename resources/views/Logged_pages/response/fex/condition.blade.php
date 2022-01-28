@php $condition='condition_'.$language.'' @endphp
@foreach($rec as $data)
    <div class="dropdown-item con_data" con="{{$data->condition_e}}" id="{{$data->id}}">{{$data->$condition}}</div>
    

@endforeach
