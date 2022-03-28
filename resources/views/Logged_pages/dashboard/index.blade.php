@extends('MainLayout.header')
@section('title')
    <title>Dashboard</title>
@endsection


@section('content')

    <style>
        /*tbody tr td {*/
        /*    border: 1px solid #dcd8d8;*/
        /*    padding: 10px;*/
        /*}*/

        body {
            background-color: #f3f3fb;
        }

        .dataTables_filter {
            color: #6053fa;
        }

        .header {
            background-color: #6053fa;
            color: white;
            text-align: center;
        }

        #example  {
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        table tr:last-child td:first-child, table tr:last-child th:first-child {
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;

        }

        table tr:last-child td:last-child, table tr:last-child th:last-child {
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;

        }


        .result {
            background-color: white;
            text-align: center;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 20px 0px;
            border-radius: 20px;
        }


        .result2 {

            width: 100%;
            background-color: white;
            text-align: center;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 20px 0px;
            border-radius: 20px;
        }



        .result td {
            padding: 15px;
        }
        .result2 td {
            padding: 10px;
        }

        .header th {
            padding: 15px;
        }

        .main-card1 {
            background: linear-gradient(95.83deg, #6B5EFF -0.59%, #3222E8 98.36%);
            box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            color: white;
        }


        .main-card2 {
            background: linear-gradient(95.22deg, #41E5DB 2.57%, #08A79D 101.71%);
            box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            color: white;

        }
    </style>
    <div class="container-fluid" style="">

        <div class="container">

            <div class="card mt-5 p-3" style="border-radius: 8px">
                <div class="card-body">

                    <div class="row ">

                        <div class="col-lg-12 text-center my-2">
                            <h2 class="" style="color: #6B5EFF;font-weight: bold">Dashboard</h2>
                        </div>

                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card1" style="">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">Served Customers</p>
                                        <p style="font-size: 20px">{{$customer->coustomer}}</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card1">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">Amount Sold</p>
                                        <p style="font-size: 20px">${{$customer->total_price}}K</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card1">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">Amount Earned</p>
                                        <p style="font-size: 20px">${{$customer->total_earned_price}}K</p>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card2">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">0-8 Months Policy</p>
                                        <p style="font-size: 20px">{{$eight}}</p>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card2">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">9 Months Policy</p>
                                        <p style="font-size: 20px">{{$nine}}</p>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-lg-4  col-12 mb-3">
                            <div class="card p-3 main-card2">
                                <div class=" d-flex">
                                    <div class="mr-3 w-25">

                                        <img src="{{asset('images/Ellipse.png')}}" style="width: 100%" alt="">
                                    </div>

                                    <div class="">

                                        <p class="mb-0 mt-2" style="font-size: 20px">12 Months Policy</p>
                                        <p style="font-size: 20px">{{$twelwe}}</p>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="pushtocrm" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <form action="{{url('user/pushToCrm/manual')}}" method="post">
                                @csrf



                                <div class="row">

                                    <div class="col-lg-12 mb-3 text-center">

                                        <h2 class="" style="color: #6B5EFF;font-weight: bold">Add Customer</h2>
                                    </div>

                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">CUSTOMER NAME</lable>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">CUSTOMER EMAIL</lable>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">DATE ADDED</lable>
                                        <input type="date" name="created" value="{{date('Y-m-d')}}"
                                               class="form-control">
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;" >MONTHLY PREMIUM</lable>
                                        <input type="text"  name="price" id="pricedata" class="form-control">
                                    </div>




                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">COMPANY TYPE</lable>
                                        <select name="companytype" id="companytype" class="form-control">
                                            <option value="fex" selected>FEX</option>
                                            <option value="term" >TERM</option>
                                        </select>
                                    </div>



                                    <div class="col-lg-6 mb-3" id="fexcompany">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">FEX COMPANY</lable>
                                        <select type="text" name="fexcompany" id="" class="form-control">
                                        @foreach($fex as $fex)
                                                <option value="{{$fex->id}}">{{$fex->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-6 mb-3 " id="termcompany" style="display: none">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">TERM COMPANY</lable>
                                        <select type="text" name="termcompany" id="" class="form-control">
                                            @foreach($term as $term)
                                                <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">PRODUCT NAME</lable>
                                        <input type="text" required name="tagline" id="taglinedata" class="form-control">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">DATE OF BIRTH</lable>
                                        <input type="date" name="dob" class="form-control">
                                    </div>

                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">ADDRESS</lable>
                                        <input type="text" name="addreess" class="form-control">
                                    </div>

                                    <div class="col-lg-6 mb-3 ">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">PHONE</lable>
                                        <input type="text" name="phone" class="form-control">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <lable class="d-block font-weight-bold mr-2" style="white-space: pre;">NOTES</lable>
                                        <input type="text" name="notes" class="form-control">
                                    </div>




                                </div>
                                <div class="modal-footer" style="border-top: none">
                                    <button type="submit" class="btn btn-primary w-100"  style="background-color: #6053fa;border: none;padding: 15px">Save</button>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>





        <div class="card my-5">
            <div class="card-body">
                <div class="col-lg-12 text-center my-2">
                    <h2 class="" style="color: #6B5EFF;font-weight: bold">CRM</h2>
                </div>

                <div class="col-lg-6">
                    <button class="btn btn-primary" data-target="#pushtocrm" data-toggle="modal"
                            style="background-color: #6053fa;border: none;padding: 15px"><i class="fa fa-plus"></i> Add
                        Customer
                    </button>
                </div>
                <form id="form1" action="">
                    <select name="q" id="filter" style="float:right;">
                        <option value="" {{isset($_GET['q']) ?  $_GET['q']=='' ? 'selected' : null : null}}>All</option>
                        <option value="day" {{isset($_GET['q']) ?  $_GET['q']=='day' ? 'selected' : null : null}}>Day</option>
                        <option value="week" {{isset($_GET['q']) ?  $_GET['q']=='week' ? 'selected' : null : null}}>Week</option>
                        <option value="month" {{isset($_GET['q']) ?  $_GET['q']=='month' ? 'selected' : null : null}}>Month</option>
                        <option value="year" {{isset($_GET['q']) ?  $_GET['q']=='year' ? 'selected' : null : null}}>Year</option>
                    </select>
                </form>

                <div style="" class="my-1 table-responsive">
                    <table id="example" class="display w-100" style="width:100%;padding:10px">

                        <thead>
                        <tr class="header">
                            <th>Customer Name</th>

                            <th>Policy Type</th>
                            <th>Amount</th>
                            <th>0-8 Months</th>
                            <th>9 Months</th>
                            <th>12 Months</th>
                            <th>12+ Months</th>

                        </tr>
                        </thead>

                        <tbody class="">

                        <tr class="result2">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="color:white;background: linear-gradient(93.43deg, #FF3366 6.57%, #E71D36 22.27%);border-radius: 6px 0px 0px 6px;">{{$eight}} Policies</td>
                            <td style="color:white;background: linear-gradient(93.11deg, #FFBC11 6.6%, #FF7A00 29.42%);">{{$nine}} Policies</td>
                            <td style="color:white;background: linear-gradient(93.43deg, #9CDB4C 6.57%, #81C728 52.83%);">{{$twelwe}} Policies</td>
                            <td style="color:white;background: linear-gradient(92.09deg, #27A861 6.72%, #198A4B 101.29%);border-radius:0px 6px 6px 0px;">{{$twelwePlus}} Policies</td>
                        </tr>
                        @foreach($crm as $crm)
                            <tr class="result">
                                <td>{{$crm->name}}</td>
                                <td>{{$crm->tagline}}</td>
                                <td>${{$crm->total_price}}</td>

                                <td>{{$crm->eightMonth>=\Carbon\Carbon::now() ? "YES" : "NO"}}</td>
                                <td>{{($crm->eightMonth<\Carbon\Carbon::now() && $crm->NineMonth>=\Carbon\Carbon::now()) ? "YES" : "NO"}}</td>
                                <td>{{($crm->NineMonth<\Carbon\Carbon::now() && $crm->twelveMonth>=\Carbon\Carbon::now()) ? "YES" : "NO"}}</td>
                                <td>{{( \Carbon\Carbon::now()>=$crm->twelveMonth) ? "YES" : "NO"}}</td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
    </div>


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "paging": false,
                "ordering": false,
                "info": false
            });

            $("#companytype").change(function(){
              if($(this).val()=='fex')
              {
                  $('#fexcompany').show();
                  $('#termcompany').hide();
              }
              else {
                  $('#fexcompany').hide();
                  $('#termcompany').show();
              }
            });

            $('#filter').change(function () {
                $('#form1').submit();
            })
        });
    </script>

@endsection

