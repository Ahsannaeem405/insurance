@foreach($companies as $company)
    @if(!$company->disable)
        <option value="{{$company->id}}">{{$company->name}}</option>
    @endif
@endforeach
