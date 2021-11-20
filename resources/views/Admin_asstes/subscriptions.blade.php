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
                                <th scope="col">Amount</th>

                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Mark@gmail.com</td>
                                    <td>$ 120</td>

                                    <td>
                                       12-2-2021
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Mark@gmail.com</td>
                                    <td>$ 120</td>

                                    <td>
                                       12-2-2021
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>Mark@gmail.com</td>
                                    <td>$ 120</td>

                                    <td>
                                       12-2-2021
                                    </td>
                                  </tr>
                            </tbody>
                          </table>
                    </div>

            </div>
        </div>
    </div>
</div>






@endsection
