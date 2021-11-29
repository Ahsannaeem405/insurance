@extends('Admin_asstes.layouts.main')
@section('dashboard')
    active
@endsection

@section('content')
<section id="dashboard-ecommerce">
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{\App\Models\User::count()}}</h2>
                    <p class="mb-0">Users</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-1"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{\App\Models\Subsription::whereMonth('created_at', date('m'))->count()}}</h2>
                    <p class="mb-0">Monthly Subscribers</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-package text-warning font-medium-5"></i>
                        </div>
                    </div>

                    <h2 class="text-bold-700 mt-1">$ {{\App\Models\Subsription::whereMonth('created_at', date('m'))->sum('price')}}</h2>
                    <p class="mb-0">{{date('M')}} revenue</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-4"></div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{\App\Models\User::where('role','user')->where('status',1)->count()}}/{{\App\Models\User::where('role','user')->count()}}</h2>
                    <p class="mb-0"> Subscribers</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-5"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Recent Users</h4>

                </div>
                <div class="card-content">
                    <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user)
                              <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->number}}</td>
                              </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

@endsection
