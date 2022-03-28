@extends('MainLayout.header')
@section('title')
<title>Policy Summary</title>
@endsection

@section('content')

<div class="policy-summary p-lg-5 p-md-4 px-0 py-3">
    <div class="container-fluid">

        <section class="ps-page-creator px-4 py-4">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Term / How Much Insurance You Need!</h3>
                    <form action="">
                        <div class="row">
                            <div class=" col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >1st Person Annual Income ($)</label>
                                            <input type="number" step="0.01" class="form-control py-2 income1" value="0"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >2nd Person Annual Income ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 income2"  value="0" placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Number od years to replace income</label>
                                            <input type="number" step="0.01"  class="form-control py-2 years" value="1"  placeholder="4">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Mortgage balance ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 mortage" value="0"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Credit card debt ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 credit" value="0" placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Car loans ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 car" value="0" placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Student Loans ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 student"  value="0" placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Other expenses ($)</label>
                                            <input type="number" step="0.01"  class="form-control py-2 expense" value="0"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3 d-flex align-items-end pb-2">
                                        <div class="d-flex justify-content-between w-100">
                                            <h5><span>Results</span> <br> How Much Insurance you need?</h5>
                                            <h2 id="result1">$0</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-3">
                                        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                                            <button id="calculation1" type="button" class="w-100 py-3 sub-btn">
                                            Get Insurance Quote
                                            </button>
                                        </div>


                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="ps-page-creator px-4 py-4 mt-3 mt-lg-4">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Fax Policy Affordability</h3>
                    <form action="">
                        <div class="row">
                            <div class=" col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Monthly Income ($)</label>
                                            <input type="number" step="0.01" class="form-control py-2 monthly"  placeholder="$0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row appenddata">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Expenses</label>
                                            <input type="number" step="0.01" class="form-control py-2 allexpense"  placeholder="Rent">
                                        </div>
                                    </div>


                                </div>

                                <div class="row d-flex justify-content-end" >
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3 d-flex align-items-end justify-content-end">
                                        <button class="w-50 py-2 mb-2 add-exp-btn" type="button" id="moreRow">
                                            + Add More
                                        </button>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12 col-md-6 col-lg-3 mt-0 mt-md-3">
                                            <button class="w-100  py-2 sub-btn" type="button" id="calculate2">
                                                Calculate
                                            </button>
                                    </div>

                                    <div class="col-lg-9 col-12 d-md-flex result-div w-100 p-0 mt-2 mt-md-0 justify-content-center">
                                           <span class="py-md-4 py-2 px-3 px-0 ">Results</span>
                                           <div>
                                           <ul class="list-inline mt-2">
                                                <li class="list-inline-item"><button type="button">1%</button> </li>
                                                <li class="list-inline-item"><button type="button">2%</button> </li>
                                                <li class="list-inline-item"><button type="button">3%</button> </li>
                                                <li class="list-inline-item"><button type="button">4%</button> </li>
                                                <li class="list-inline-item"><button type="button">5%</button> </li>
                                            </ul>

                                            <ul class="list-inline mt-2 d-flex">
                                                <li class="list-inline-item "><button type="button" class="btn2 res1">1%</button> </li>
                                                <li class="list-inline-item "><button type="button" class="btn2 res2">2%</button> </li>
                                                <li class="list-inline-item "><button type="button" class="btn2 res2">3%</button> </li>
                                                <li class="list-inline-item "><button type="button" class="btn2 res2">4%</button> </li>
                                                <li class="list-inline-item "><button type="button" class="btn2 res2">5%</button> </li>
                                            </ul>
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $("#calculation1").click(function(){

            var income1=parseFloat($('.income1').val());
            var income2=parseFloat($('.income2').val());
            var years=parseFloat($('.years').val());
            var mortage=parseFloat($('.mortage').val());
            var credit=parseFloat($('.credit').val());
            var car=parseFloat($('.car').val());
            var student=parseFloat($('.student').val());
            var expense=parseFloat($('.expense').val());
         var result=(income1 +income2) * (years) + (mortage + credit + car + student +expense);
         $('#result1').empty().append('$'+ result);
        });
        $("#calculate2").click(function(){

            var totalPrice = 0;
            $('.allexpense').each( function(  ) {
                totalPrice += parseFloat($(this).val());

            });
           var monthly= $('.monthly').val();
        var cal1=((monthly - totalPrice) * (1/100));
        var cal2=((monthly - totalPrice) * (2/100));
        var cal3=((monthly - totalPrice) * (3/100));
        var cal4=((monthly - totalPrice) * (4/100));
        var cal5=((monthly - totalPrice) * (5/100));

            $('.res1').empty().append(cal1);
            $('.res2').empty().append(cal2);
            $('.res3').empty().append(cal3);
            $('.res4').empty().append(cal4);
            $('.res5').empty().append(cal5);

     //    var result=(income1 +income2) * (years) + (mortage + credit + car + student +expense);
      //   $('#result1').empty().append('$'+ result);
        });

        $("#moreRow").click(function () {

            var html=  `    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Expenses</label>
                                            <input type="number" step="0.01" class="form-control py-2 allexpense"  placeholder="Rent">
                                        </div>
                                    </div>`;

            $('.appenddata').append(html);


        })
    });
</script>
@endsection
