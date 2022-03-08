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
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >2nd Person Annual Income ($)</label>
                                            <input type="email" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Number od years to replace income</label>
                                            <input type="text" class="form-control py-2"  placeholder="4">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Mortgage balance ($)</label>
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Credit card debt ($)</label>
                                            <input type="email" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Car loans ($)</label>
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Student Loans ($)</label>
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Other expenses ($)</label>
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3 d-flex align-items-end pb-2">
                                        <div class="d-flex justify-content-between w-100">
                                            <h5><span>Results</span> <br> How Much Insurance you need?</h5>
                                            <h2>$ 0</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-3">
                                        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                                            <button class="w-100 py-3 sub-btn">
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
                                            <input type="text" class="form-control py-2"  placeholder="$0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Expenses</label>
                                            <input type="text" class="form-control py-2"  placeholder="Rent">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Expenses</label>
                                            <input type="text" class="form-control py-2"  placeholder="Other Expenses">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3 d-flex align-items-end justify-content-end">
                                        <button class="w-50 py-2 mb-2 add-exp-btn">
                                            + Add More
                                        </button>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12 col-md-6 col-lg-3 mt-0 mt-md-3">
                                            <button class="w-100 py-2 sub-btn">
                                                Calculate
                                            </button>
                                    </div>

                                    <div class="col-lg-9 col-12 d-md-flex result-div w-100 p-0 mt-2 mt-md-0 justify-content-center">
                                           <span class="py-md-4 py-2 px-3 px-0 ">Results</span>
                                           <div> 
                                           <ul class="list-inline mt-2">
                                                <li class="list-inline-item"><button>1%</button> </li>
                                                <li class="list-inline-item"><button>2%</button> </li>
                                                <li class="list-inline-item"><button>3%</button> </li>
                                                <li class="list-inline-item"><button>4%</button> </li>
                                                <li class="list-inline-item"><button>5%</button> </li>
                                            </ul>

                                            <ul class="list-inline mt-2">
                                                <li class="list-inline-item"><button class="btn2">1%</button> </li>
                                                <li class="list-inline-item"><button class="btn2">2%</button> </li>
                                                <li class="list-inline-item"><button class="btn2">3%</button> </li>
                                                <li class="list-inline-item"><button class="btn2">4%</button> </li>
                                                <li class="list-inline-item"><button class="btn2">5%</button> </li>
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
@endsection
