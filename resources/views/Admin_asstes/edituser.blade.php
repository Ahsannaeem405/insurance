@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

        <div class="card">
            <div class="card-content">
                <form action="#">

                 <div class="row p-3">

                    <div class="col-lg-12 col-12 mt-2">
                        <input name="file1" type="file" class="dropify" data-height="100" />
                    </div>
                     <div class="col-lg-6 col-12 mt-2">
                         <input type="text" class="form-control" placeholder="First Name">
                     </div>
                     <div class="col-lg-6 col-12 mt-2">
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="col-lg-6 col-12 mt-2">
                        <input type="text" class="form-control" placeholder="Number">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <button class="btn btn-dark" style="float: right;">Update User</button>
                    </div>

                 </div>
                </form>

            </div>
        </div>






<script>
    $('.dropify').dropify();
</script>
@endsection
