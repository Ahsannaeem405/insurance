@extends('Admin_asstes.layouts.main')
@section('subsription')
    active
@endsection



@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                    <div class="table-responsive">
                        <table class="table" style="text-align: center">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Amount</th>

                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            @php $count=1; @endphp
                            @foreach($subsription as $sub)
                                <tr>

                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$sub->user->name}}</td>
                                    <td>{{$sub->user->email}}</td>
                                    <td>$ {{$sub->price}}</td>
                                    <td>{{$sub->created_at}}</td>


                                  </tr>
                                
                            @endforeach

                            </tbody>
                          </table>
                    </div>

            </div>
        </div>
    </div>
</div>






@endsection
