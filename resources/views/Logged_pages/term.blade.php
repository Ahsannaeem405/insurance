@extends('MainLayout.logged_header')
@section('title')
    <title>Fex</title>
@endsection
<style>
.table{
    margin-top: 80px;
}
.header{
    background-color: #340856;
    color: white;
    padding: 25px;
    text-align: center;
    border-radius: 10px;
}
.data{
    margin-top: 40px;
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
padding: 10px;
border-radius: 10px;
}
.center{
    text-align: center;
}
.v_class{
    padding-top: 10px;
    vertical-align: middle;
    margin:auto;
}
.div_hide{
display: none;
}

.show{
    display: block;
}

.company{
    box-shadow: 0 0 11px rgba(33,33,33,.2);
    border-radius: 10px;
}
/* toggle_button */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



@media only screen and (max-width: 768px) {
.header{
    display: none !important;
}
.div_hide{
display: block;
}
.fa-chevron-down{
    display: none !important;
}


}

</style>
@section('content')
    <div class="container-fluid" style="min-height: 500px;padding-bottom:100px;">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#Quoter" role="tab" data-toggle="tab">Quoter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Quotecompare" role="tab" data-toggle="tab">Quote Compare</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#drug" role="tab" data-toggle="tab">Drug Lookup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#setting" role="tab" data-toggle="tab">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Customize" role="tab" data-toggle="tab">Customize Carriers</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane  active" id="Quoter">
                <div class="container-fluid" style="padding-top: 50px;">
                    <center>
                        <h3 style="color: rgb(52, 8, 86)">Get a Term Quote</h3>
                    </center>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-6 col-12" style="border-right: 1px solid lightgray ">
                            <h5>Coverage Options</h5>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-1" style="padding-top: 5px;">
                                    Or
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-6" style="margin-top: 20px;">
                                    <label for="cars">Coverage Type:</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">Graded/Modified</option>
                                        <option value="Guaranteed">Guaranteed</option>
                                        <option value="Limited Pay">Limited Pay</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <h5>About the client</h5><br>
                            <p>Sex:</p>
                            <input type="radio" name="gender" value="male">
                            <label for="Male">Male</label><br>
                            <input type="radio" id="css" name="gender" value="female">
                            <label for="Female">Female</label><br><br>

                            <label for="cars">State:</label>

                            <select name="type" class="form-control">
                                <option value="Graded/Modified">UnitedKingdom</option>
                                <option value="Guaranteed">UnitedKingdom</option>
                                <option value="Limited Pay">UnitedKingdom</option>
                            </select>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                    <p>Birthday:</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="dd">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="mm">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="yy">
                                </div>
                                <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                                    <p>Or</p>
                                </div>
                                <div class="col-lg-3" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="Ages">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-4 pt-1" style="margin-top: 20px;">
                                    <p>Height/Weight
                                        (optional):</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="ft">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="in">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="lbs">
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">Nicotine Use:</label>

                                    <select name="type" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Cigerette">Cigerette</option>
                                        <option value="Alcohol">Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">Payment Type:</label>

                                    <select name="type" class="form-control">
                                        <option value="Bank">Bank</option>
                                        <option value="Direct">Direct</option>
                                        <option value="Credit Card">Credit Card</option>
                                    </select>
                                </div>



                            </div>





                        </div>
                        <div class="col-lg-6 col-12">
                            <h4>Drug and Health Information</h4><br>
                            <input type="text" class="form-control" placeholder="Enter Health Condition"><br>
                            <input type="text" class="form-control" placeholder="Enter Medication"><br>


                        </div>
                        <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                            <button style="background-color: #340856" class="btn btn-dark">Get Quote</button><br><br>

                        </div>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="Quotecompare">
                <div class="container-fluid" style="padding-top: 50px;">
                    <center>
                        <h3 style="color: rgb(52, 8, 86)">Compare Final Expense Quotes</h3>
                    </center>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-6 col-12" style="border-right: 1px solid lightgray ">
                            <h5>Coverage Options</h5>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Face Amount">
                                </div>


                                <div class="col-lg-7" style="margin-top: 20px;">
                                    <label for="cars">Company:</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">AIG</option>
                                        <option value="Guaranteed">CFG</option>
                                        <option value="Limited Pay">Americo</option>
                                    </select>
                                </div>
                                <div class="col-lg-7" style="margin-top: 20px;">
                                    <label for="cars">Coverage Type:</label>

                                    <select name="type" class="form-control">
                                        <option value="Graded/Modified">Graded/Modified</option>
                                        <option value="Guaranteed">Guaranteed</option>
                                        <option value="Limited Pay">Limited Pay</option>
                                    </select>
                                </div>
                            </div><br><br>







                        </div>
                        <div class="col-lg-6 col-12">
                            <h5>About the client</h5><br>
                            <p>Sex:</p>
                            <input type="radio" name="gender" value="male">
                            <label for="Male">Male</label><br>
                            <input type="radio" id="css" name="gender" value="female">
                            <label for="Female">Female</label><br>

                            <label for="cars">State:</label>

                            <select name="type" class="form-control">
                                <option value="Graded/Modified">UnitedKingdom</option>
                                <option value="Guaranteed">UnitedKingdom</option>
                                <option value="Limited Pay">UnitedKingdom</option>
                            </select>
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                    <p>Birthday:</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="dd">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="mm">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="yy">
                                </div>
                                <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                                    <p>Or</p>
                                </div>
                                <div class="col-lg-3" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="Ages">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 40px;">
                                <div class="col-lg-4 pt-1" style="margin-top: 20px;">
                                    <p>Height/Weight
                                        (optional):</p>
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="ft">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="in">
                                </div>
                                <div class="col-lg-2" style="margin-top: 20px;">
                                    <input type="text" class="form-control" placeholder="lbs">
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">Nicotine Use:</label>

                                    <select name="type" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Cigerette">Cigerette</option>
                                        <option value="Alcohol">Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-lg-7" style="margin-top: 40px;">
                                    <label for="cars">Payment Type:</label>

                                    <select name="type" class="form-control">
                                        <option value="Bank">Bank</option>
                                        <option value="Direct">Direct</option>
                                        <option value="Credit Card">Credit Card</option>
                                    </select>
                                </div>



                            </div>


                        </div>
                        <div class="col-lg-12 col-12" style="text-align: center;margin-top:50px;">
                            <button style="background-color: #340856" class="btn btn-dark">Compare Quote</button>
                        </div>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="drug">
                <div class="container" style="text-align: center;width:50%;padding-top:50px;">
                    <h3 style="color: rgb(52, 8, 86)">Fex Drug Lookup</h3>

                    <label for="cars" style="float: left">State:</label>

                    <select name="type" class="form-control">
                        <option value="Graded/Modified">UnitedKingdom</option>
                        <option value="Guaranteed">UnitedKingdom</option>
                        <option value="Limited Pay">UnitedKingdom</option>
                    </select>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                            <p>Birthday:</p>
                        </div>
                        <div class="col-lg-2" style="margin-top: 20px;">
                            <input type="text" class="form-control" placeholder="dd">
                        </div>
                        <div class="col-lg-2" style="margin-top: 20px;">
                            <input type="text" class="form-control" placeholder="mm">
                        </div>
                        <div class="col-lg-2" style="margin-top: 20px;">
                            <input type="text" class="form-control" placeholder="yy">
                        </div>
                        <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                            <p>Or</p>
                        </div>
                        <div class="col-lg-3" style="margin-top: 20px;">
                            <input type="text" class="form-control" placeholder="Ages">
                        </div>
                    </div><br>

                    <input type="text" class="form-control" placeholder="Enter Medication"><br>
                    <button class="btn btn-dark" style="background-color: #340856">Lookup</button>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="setting">
                <div class="container p-3">
                    <h3 style="color: #340856;" class="text-center">Insurance Toolkit</h3>
                    <div class="row">
                      <div class="col-lg-6 col-12 p-2">
                          <h3 class="">Your Link</h3>
                          <input type="text" class="form-control" value="https://insurancetoolkits.com/fex/lite/?token=wfuXPwcxBHjk5lzx0OI8zd7oF-xQ7RPVqIMtTEC5" readonly>
                      <p>This is your personal FexToolkit link, which allows anyone with the URL to run a basic quote.
                          You can share it with a colleague, bookmark it on your phone or computer, or otherwise share it around as you see fit.</p>
                      <h3 class="mt-5">Your Widget HTML Code</h3>
                      <input type="text" value="link" class="form-control mt-3" readonly>
                      <p>Copy the code above to your website to allow people to run quotes directly from your website.</p>
                      </div>
                      <div class="col-lg-6 col-12 p-5">
                          <h5>Final Expense Quoter</h5>
                          <div class="row" style="margin-top: 40px;">
                              <div class="col-lg-5">
                                  <input type="text" class="form-control" placeholder="Face Amount">
                              </div>
                              <div class="col-lg-1" style="padding-top: 5px;">
                                  Or
                              </div>
                              <div class="col-lg-5">
                                  <input type="text" class="form-control" placeholder="Face Amount">
                              </div>
                              <div class="col-lg-6" style="margin-top: 20px;">
                                  <label for="cars">Coverage Type:</label>

                                  <select name="type" class="form-control">
                                      <option value="Graded/Modified">Graded/Modified</option>
                                      <option value="Guaranteed">Guaranteed</option>
                                      <option value="Limited Pay">Limited Pay</option>
                                  </select>
                              </div>
                          </div><br><br>
                          <h5>About the client</h5><br>
                          <p>Sex:</p>
                          <input type="radio" name="gender" value="male">
                          <label for="Male">Male</label><br>
                          <input type="radio" id="css" name="gender" value="female">
                          <label for="Female">Female</label><br><br>

                          <label for="cars">State:</label>

                          <select name="type" class="form-control">
                              <option value="Graded/Modified">UnitedKingdom</option>
                              <option value="Guaranteed">UnitedKingdom</option>
                              <option value="Limited Pay">UnitedKingdom</option>
                          </select>
                          <div class="row" style="margin-top: 40px;">
                              <div class="col-lg-2 pt-1" style="margin-top: 20px;">
                                  <p>Birthday:</p>
                              </div>
                              <div class="col-lg-2" style="margin-top: 20px;">
                                  <input type="text" class="form-control" placeholder="dd">
                              </div>
                              <div class="col-lg-2" style="margin-top: 20px;">
                                  <input type="text" class="form-control" placeholder="mm">
                              </div>
                              <div class="col-lg-2" style="margin-top: 20px;">
                                  <input type="text" class="form-control" placeholder="yy">
                              </div>
                              <div class="col-lg-1 pt-1" style="margin-top: 20px;">
                                  <p>Or</p>
                              </div>
                              <div class="col-lg-3" style="margin-top: 20px;">
                                  <input type="text" class="form-control" placeholder="Ages">
                              </div>
                          </div>

                          <div class="row" style="margin-top: 40px;">

                              <div class="col-lg-7" style="margin-top: 40px;">
                                  <label for="cars">Nicotine Use:</label>

                                  <select name="type" class="form-control">
                                      <option value="None">None</option>
                                      <option value="Cigerette">Cigerette</option>
                                      <option value="Alcohol">Alcohol</option>
                                  </select>
                              </div>


                              <div class="col-lg-12" style="margin-top: 40px;">

                                  <input type="text" class="form-control" placeholder="Email">
                               </div>
                               <div class="col-lg-12" style="margin-top: 40px;">

                                  <input type="text" class="form-control" placeholder="Phone">
                               </div>

                               <div class="col-lg-12" style="margin-top: 40px;">

                                  <button class="btn btn-primary text-center">Get a Quote</button>
                               </div>




                          </div>





                      </div>
                    </div>

                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="Customize">
                  <div class="container-fluid " style="padding: 50px;">
                      <h3 class="text-center" style="color: #340856;">Insurance Customization</h3>
                      <div class="row">
                          <div class="col-lg-5 col-12 mt-3  p-3 company" style="display: inline-flex;">
                              <h5>AIG</h5>
                              <label class="switch ml-auto">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                          </div>
                          <div class=" offset-lg-2 col-lg-5 col-12 mt-3 p-3 company" style="display: inline-flex;">
                              <h5>AIG</h5>
                              <label class="switch ml-auto">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                          </div>
                          <div class="col-lg-5 col-12 mt-3 p-3 company" style="display: inline-flex;">
                              <h5>AIG</h5>
                              <label class="switch ml-auto">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                          </div>
                          <div class="offset-lg-2  col-lg-5 col-12 mt-3 p-3 company" style="display: inline-flex;">
                              <h5>AIG</h5>
                              <label class="switch ml-auto">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                          </div>
                      </div>
                  </div>
              </div>
        </div>

        <div class="container table">
          <div class="row header" >
            <div class="col-lg-3">
                <b>Company Name</b>
            </div>
            <div class="col-lg-3">
                <b>Monthly</b>
            </div>
            <div class="col-lg-3">
                <b>Coverage Type</b>
            </div>
            <div class="col-lg-3">
                <b>Actions</b>
            </div>
          </div>
          <div class="row data">
            <div class="col-lg-3  col-12 center">
               <img src="{{asset('images/transam.png')}}" style="width: 220px;" alt="">
            </div>
            <div class="col-lg-3  col-12 center v_class" style="">
              <p>$14.80</p>
            </div>
            <div class="col-lg-3  col-12 center v_class" >
               <p>Family Choice Immediate</p>
            </div>
            <div class="col-lg-3  col-12 center v_class" >
              <button class="btn btn-dark">Compare</button> &nbsp;<i class="fas fa-chevron-down"></i>
            </div>

             <div class="col-lg-6 col-12 center div_show div_hide" style="padding:10px">
                <p>Annual Rate: $168.20</p>
                <p>+Accidental Death Monthly Rate: $16.12</p>
                <p>+Accidental Death Annual Rate: $183.20</p>
            </div>
            <div class="col-lg-6 col-12 center div_show v_class div_hide" style="padding:10px">
               <button class="btn btn-dark" style="background-color: #340856"><i class="fas fa-plus"></i> Push To CRM</button>
            </div>
          </div>
          {{-- <div class="row div">
            <div class="col-lg-6 col-12 center" style="padding:10px">
                <p>Annual Rate: $168.20</p>
                <p>+Accidental Death Monthly Rate: $16.12</p>
                <p>+Accidental Death Annual Rate: $183.20</p>
            </div>
            <div class="col-lg-6 col-12 center  v_class " style="padding:10px">
               <button class="btn btn-dark" style="background-color: #340856"><i class="fas fa-plus"></i> Push To CRM</button>
            </div>
          </div> --}}

        </div>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
  $(".fa-chevron-down").click(function(){
    $(".div_show").toggleClass("show");
    // $(".div").fadeIn();
  });

});
    </script>
@endsection
