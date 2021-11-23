@extends('Admin_asstes.layouts.main')

@section('coupan')
    active
@endsection
@section('heading')

    Coupan
@endsection

@section('content')


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Coupan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
             <form method="post" action="{{url('admin/coupan/add')}}">
                 @csrf

                 <div class="form-group">
                     <label for="exampleInputEmail1">Coupan Title</label>
                     <input type="text" name="title" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                 </div>


                 <div class="form-group">
                     <label for="exampleInputEmail1">Discount in %</label>
                     <input type="number" required name="discount" min="1" max="100" value="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                 </div>


                 <div class="form-group">
                     <label for="exampleInputEmail1">Valid until</label>
                     <input type="date" required name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                 </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="w-100 text-right mb-1">

                <input data-toggle="modal" data-target="#exampleModal" type="button" value="ADD"  class="btn btn-primary">

            </div>
            <div class="card">
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Valid until</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=1; @endphp
                            @foreach($coupan as $co)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$co->title}}</td>
                                    <td>{{$co->discount}}%</td>
                                    <td>{{\Carbon\Carbon::parse($co->date)->format('Y-m-d')}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#exampleModal{{$co->id}}" style="color: white"
                                           class="btn btn-primary">Edit</a>

                                        <a href="{{url('admin/coupan/del/'.$co->id.'')}}"
                                           onclick="return confirm('Are you sure you want to delete this coupan?');">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>



                                <div class="modal fade" id="exampleModal{{$co->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Coupan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{url('admin/coupan/edit/'.$co->id.'')}}">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Coupan Title</label>
                                                        <input type="text" name="title" value="{{$co->title}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Discount in %</label>
                                                        <input type="number" required name="discount" min="1" max="100" value="{{$co->discount}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Valid until</label>
                                                        <input type="date" value="{{\Carbon\Carbon::parse($co->date)->format('Y-m-d')}}" required name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                    </div>





                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>





@endsection

