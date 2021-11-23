@extends('Admin_asstes.layouts.main')

@section('setting')
    active
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

    <div class="card">
        <h3 class="m-2" style="color:#7367F0">Setting</h3>


        <div class="card-content">
            <form action="{{url('admin/update/setting')}}" method="post">
                <div class="row p-2">



                        @csrf

                    <div class="col-lg-6 col-12 ">
                        <label class="mb-1">Package Name :</label>
                        <input type="text" required name="p_name" class="form-control" placeholder="Package Name" value="{{$setting->p_name}}">
                    </div>
                    <div class="col-lg-6 col-12 ">
                        <label class="mb-1">Package Cost :</label>
                        <input type="text req" required name="p_cost" class="form-control" value="{{$setting->p_cost}}" placeholder="Package Cost/Month">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Number Of Days :</label>
                        <input type="number" required class="form-control" value="{{$setting->p_days}}" name="p_days" min="1" >
                    </div>


                    <div class="col-lg-12 col-12 mt-2">
                        <button type="submit" class="btn btn-dark" style="float: right;">Update Setting</button>
                    </div>


                </div>
            </form>
        </div>
    </div>






    <script>
        $('.dropify').dropify();
    </script>
@endsection
