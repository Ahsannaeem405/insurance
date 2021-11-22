@extends('Admin_asstes.layouts.main')

@section('setting')
    active
    @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')
        <div class="card">

            <div class="card-content">
            <h3 class="m-2" style="color:#7367F0">Profile</h3>


                <form action="#">

                 <div class="row p-2">

                    <div class="col-lg-12 col-12 mt-2">
                        <input name="file1" type="file" class="dropify" data-height="100" />
                    </div>
                     <div class="col-lg-6 col-12 mt-2">
                         <label class="mb-1">First Name :</label>
                         <input type="text" class="form-control" placeholder="First Name">
                     </div>
                     <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Last Name :</label>

                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Number :</label>

                        <input type="text" class="form-control" placeholder="Number">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Email :</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Password :</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-lg-6 col-12 mt-2">
                        <label class="mb-1">Confirm Password :</label>
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <button class="btn btn-dark" style="float: right;">Update</button>
                    </div>

                 </div>
                </form>




            </div>
        </div>

        <div class="card">
            <h3 class="m-2" style="color:#7367F0">Setting</h3>


            <div class="card-content">
                <form action="#">
                    <div class="row p-2">


                        <div class="col-lg-12 col-12 mt-2">

                        </div>
                         <div class="col-lg-6 col-12 mt-2">
                            <label class="mb-1">Package Name :</label>
                             <input type="text" class="form-control" placeholder="Package Name">
                         </div>
                         <div class="col-lg-6 col-12 mt-2">
                            <label class="mb-1">Package Cost :</label>
                            <input type="text" class="form-control" placeholder="Package Cost/Month">
                        </div>
                        <div class="col-lg-6 col-12 mt-2">
                            <label class="mb-1">Number Of Days :</label>
                            <input type="number" class="form-control" name="days" min="1" max="30">
                        </div>



                        <div class="col-lg-12 col-12 mt-2">
                            <button class="btn btn-dark" style="float: right;">Update Setting</button>
                        </div>

                     </div>
                </form>
            </div>
        </div>






<script>
    $('.dropify').dropify();
</script>
@endsection
