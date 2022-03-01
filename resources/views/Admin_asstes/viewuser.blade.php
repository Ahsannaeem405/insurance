@extends('Admin_asstes.layouts.main')

@section('user')
    active
@endsection
@section('heading')

    user
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
                                <th scope="col">Status</th>
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
                                        @if($user->enable==0)
                                            <a class="btn btn-danger text-white">Disabled</a>
                                        @else
                                            <a
                                               class="btn btn-primary text-white">Enabled</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->enable==1)
                                            <a href="{{url('/admin/enable/user/'.$user->id.'/disable')}}"
                                               class="btn btn-danger">Disable Now</a>
                                        @else
                                            <a href="{{url('/admin/enable/user/'.$user->id.'/enable')}}"
                                               class="btn btn-primary">Enable Now</a>
                                        @endif

                                        <a href="{{url('/admin/edit/user/'.$user->id.'')}}"
                                           class="btn btn-primary">Edit</a>

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





@endsection
