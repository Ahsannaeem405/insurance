@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

    <div class="card">
        <div class="card-content">
            <form action="{{url('admin/update/profile/'.$user->id.'')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row p-3">

                    <div class="col-lg-12 col-12 mt-2">
                        <input name="profile"  type="file" data-default-file="{{asset('upload/images/'.$user->profile.'')}}" class="dropify"  data-height="100" />
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="text" required class="form-control" name="name" value="{{$user->name}}" placeholder=" Name">
                    </div>


                    <div class="col-lg-6 col-12 mt-2">
                        <input type="text" required class="form-control" name="number" value="{{$user->number}}" placeholder="Number">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="email" required class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password"  class="form-control" placeholder="Password">
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <textarea  class="form-control" name="about" required  placeholder="About"> {{$user->about}}</textarea>
                    </div>


                    <div class="col-lg-12 col-12 mt-2">
                        <button type="submit" class="btn btn-dark" style="float: right;">Update Profile</button>
                    </div>

                </div>
            </form>

        </div>
    </div>






    <script>
        $('.dropify').dropify();
    </script>
@endsection
