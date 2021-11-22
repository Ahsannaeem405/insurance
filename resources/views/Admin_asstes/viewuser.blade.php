@extends('Admin_asstes.layouts.main')




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
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=1; @endphp
                            @foreach($user as $user)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{url('/admin/edituser')}}" class="btn btn-primary">Edit</a>

                                        <a href="{{url('admin/delete/user/'.$user->id.'')}}"
                                           onclick="return confirm('Are you sure you want to delete this user?');">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--
        <div class="contents">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div> --}}





@endsection
