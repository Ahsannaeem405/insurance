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
                        <div class="row text-center" >

                            <div class="col-lg-12 mb-2">
                                <h1 style="color: #8b8be1">FEX</h1>
                            </div>

                        </div>

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



                        <div class="col-lg-6 mb-3">
                            <p class="font-weight-bold">Combo Conditions</p>
                            <input type="file" name="combocondition">

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


                        <div class="row text-center" >

                            <div class="col-lg-12 mb-2">
                                <h1 style="color: #8b8be1">TERM</h1>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">TERM Companies</p>
                                <input type="file" name="termcompanies">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">TERM Conditions</p>
                                <input type="file" name="termcondition">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">TERM Medications</p>
                                <input type="file" name="termmedication">

                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">TERM Condition Questions</p>
                                <input type="file" name="termconditionquestion">

                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">TERM Combo Conditions</p>
                                <input type="file" name="termcombocondition">

                            </div>


                            <div class="col-lg-12 mb-2">
                                <h5 style="text-align: center">Female Smoker</h5>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Smoker 10 year</p>
                                <input type="file" name="femalesmoker10">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Smoker 15 year</p>
                                <input type="file" name="femalesmoker15">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Smoker 20 year</p>
                                <input type="file" name="femalesmoker20">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Smoker 25 year</p>
                                <input type="file" name="femalesmoker25">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Smoker 30 year</p>
                                <input type="file" name="femalesmoker30">
                            </div>


                            <div class="col-lg-12 mb-2">
                                <h5 style="text-align: center">Female Not Smoker</h5>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Not Smoker 10 year</p>
                                <input type="file" name="femalenotsmoker10">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Not Smoker 15 year</p>
                                <input type="file" name="femalenotsmoker15">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Not Smoker 20 year</p>
                                <input type="file" name="femalenotsmoker20">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Not Smoker 25 year</p>
                                <input type="file" name="femalenotsmoker25">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Female Not Smoker 30 year</p>
                                <input type="file" name="femalenotsmoker30">
                            </div>


                            <div class="col-lg-12 mb-2">
                                <h5 style="text-align: center">Male Smoker</h5>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Smoker 10 year</p>
                                <input type="file" name="malesmoker10">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Smoker 15 year</p>
                                <input type="file" name="malesmoker15">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Smoker 20 year</p>
                                <input type="file" name="malesmoker20">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Smoker 25 year</p>
                                <input type="file" name="malesmoker25">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Smoker 30 year</p>
                                <input type="file" name="malesmoker30">
                            </div>

                            <div class="col-lg-12 mb-2">
                                <h5 style="text-align: center">Male Not Smoker</h5>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Not Smoker 10 year</p>
                                <input type="file" name="malenotsmoker10">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Not Smoker 15 year</p>
                                <input type="file" name="malenotsmoker15">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Not Smoker 20 year</p>
                                <input type="file" name="malenotsmoker20">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Not Smoker 25 year</p>
                                <input type="file" name="malenotsmoker25">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <p class="font-weight-bold">Male Not Smoker 30 year</p>
                                <input type="file" name="malenotsmoker30">
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

