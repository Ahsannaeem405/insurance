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

        #example {
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

        .result td {
            padding: 15px;
        }

        .header th {
            padding: 15px;
        }

        .main-card1 {
            background-image: linear-gradient(90deg, #6053fa, #3a2beb);
            color: white;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 10px
        }

        .main-card2 {
            background-image: linear-gradient(90deg, #3ee0d6, #14b3a9);
            color: white;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 10px
        }
    </style>

    @include('partials.component2')

    <div class="container-fluid" style="">
        <div class="card my-5">
            <div class="card-body">
                <div class="col-lg-12 text-center my-2">
                    <h2 class="" style="color: #6B5EFF;font-weight: bold">Policies</h2>
                </div>



                <div style=""
                     class="my-1 table-responsive">
                    <table id="example" class="display w-100" style="width:100%;padding:10px">
                        <thead>
                        <tr class="header">
                            <th>Customer Name</th>
                            <th>Company Name</th>
                            <th> Policy Number</th>
                            <th>Policy Type</th>
                            <th>Total Amount</th>
                            <th>Monthly Amount</th>
                            <th>URL</th>

                        </tr>
                        </thead>

                        <tbody class="">

                        @foreach($policy as $policy)
                            <tr class="result">
                                <td>{{$policy->name}}</td>
                                <td>{{$policy->company}}</td>
                                <td>{{$policy->number}}</td>
                                <td>{{$policy->type}}</td>
                                <td>${{$policy->amount}}</td>
                                <td>${{$policy->monthly}}</td>
                                <td><button class="btn btn-primary copy" link="{{url("/policy-report/$policy->id")}}">COPY URL</button></td>



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


        });
    </script>


    <script>
        $(".copy").click(function () {


            var link=  $(this).attr('link');


            /* Copy the text inside the text field */
            navigator.clipboard.writeText(link);
            swal("Link Copied successfully", "", "success", {
                button: "Close",

            });
        });

    </script>

@endsection

