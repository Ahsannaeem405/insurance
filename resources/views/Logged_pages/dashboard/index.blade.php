@extends('MainLayout.header')
@section('title')
    <title>Dashboard</title>
@endsection


@section('content')

    <style>
        tbody tr td{
            border: 1px solid #dcd8d8;
            padding: 10px;
        }
    </style>


    <div class="container">
        <div class="row my-5 mb-4">
            <div class="col-lg-4 col-sm-4 col-12" >
                <div class="card" style="background-color: #8b8be1;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">{{$customer->coustomer}}</h2>
                        <h1 class="mb-0"><i class="fa fa-user mr-2"></i>Customers</h1>
                    </div>

                </div>
            </div>


            <div class="col-lg-4 col-sm-4 col-12 mb-4" >
                <div class="card" style="background-color: #bb3a3a;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">${{$customer->total_price}}</h2>
                        <h1 class="mb-0"><i class="fa fa-money mr-2"></i>Amount Sold</h1>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-12 mb-4" >
                <div class="card" style="background-color: #c2846a;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">${{$customer->total_earned_price}}</h2>
                        <h1 class="mb-0"><i class="fa fa-tachometer mr-2"></i>Amount Earned</h1>
                    </div>

                </div>
            </div>



            <div class="col-lg-4 col-sm-4 col-12" >
                <div class="card" style="background-color: #d5ce51;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">1</h2>
                        <h1 class="mb-0"><i class="fa fa-rub mr-2"></i>Policies</h1>
                    </div>

                </div>
            </div>


            <div class="col-lg-4 col-sm-4 col-12" >
                <div class="card" style="background-color: #85cc4e;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">1</h2>
                        <h1 class="mb-0"><i class="fa fa-money mr-2"></i>Amount</h1>
                    </div>

                </div>
            </div>


            <div class="col-lg-4 col-sm-4 col-12" >
                <div class="card" style="background-color: #adeaa8;color: white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">1</h2>
                        <h1 class="mb-0"><i class="fa fa-calendar mr-2"></i>12 Months</h1>
                    </div>

                </div>
            </div>






        </div>

<div style="border: 1px solid #d2cece;border-radius: 25px;padding: 20px" class="my-5">
        <table id="example" class="display" style="width:100%;padding:20px;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Monthly price</th>
                <th>Total Price</th>
                <th>Total Earned Price</th>

            </tr>
            </thead>
            <tbody>

           @foreach($crm as $crm)
               <tr>
                   <td>{{$crm->name}}</td>
                   <td>{{$crm->email}}</td>
                   <td>${{$crm->monthly_price}}</td>
                   <td>${{$crm->total_price}}</td>
                   <td>${{$crm->total_earned_price}}</td>

               </tr>
           @endforeach



            </tbody>
        </table>

</div>




    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection

