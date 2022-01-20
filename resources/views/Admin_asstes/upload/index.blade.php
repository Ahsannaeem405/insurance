@extends('Admin_asstes.layouts.main')

@section('upload')
    active
@endsection
@section('heading')

    upload data
@endsection

@section('content')



    <div class="row">


        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="w-100 text-right mb-1">


            </div>
            <div class="card">
                <div class="card-content p-3">
                    <form action="{{url("admin/upload/data")}}" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <p class="font-weight-bold">Companies</p>
                            <input type="file" name="companies">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Conditions</p>
                            <input type="file" name="conditions">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Conditions Questions</p>
                            <input type="file" name="conditions_questions">

                        </div>


                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Medications</p>
                            <input type="file" name="medications">

                        </div>

                        <div class="col-lg-12 text-center mb-2">
                            <h3 >Coverage Type: Level</h3>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male smoker Level</p>
                            <input type="file" name="male_smoker_level">

                        </div>


                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male Not smoker Level</p>
                            <input type="file" name="male_not_smoker_level">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female smoker Level</p>
                            <input type="file" name="female_smoker_level">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female Not smoker Level</p>
                            <input type="file" name="female_not_smoker_level">

                        </div>



                        <div class="col-lg-12 text-center mb-2">
                            <h3 > Coverage Type: Graded/Modified </h3>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male smoker Graded</p>
                            <input type="file" name="male_smoker_graded">

                        </div>


                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male Not smoker Graded</p>
                            <input type="file" name="male_not_smoker_graded">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female smoker Graded</p>
                            <input type="file" name="female_smoker_graded">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female Not smoker Graded</p>
                            <input type="file" name="female_not_smoker_graded">

                        </div>



                        <div class="col-lg-12 text-center mb-2">
                            <h3 > Coverage Type: Guaranteed </h3>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male smoker Guaranteed</p>
                            <input type="file" name="male_smoker_guaranted">

                        </div>


                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Male Not smoker Guaranteed</p>
                            <input type="file" name="male_not_smoker_guaranted">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female smoker Guaranteed</p>
                            <input type="file" name="female_smoker_guaranted">

                        </div>

                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Female Not smoker Guaranteed</p>
                            <input type="file" name="female_not_smoker_guaranted">

                        </div>



                    </div>


                        <div class="row my-4">
                            <Button class="btn btn-primary m-auto">Submit</Button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>





@endsection

