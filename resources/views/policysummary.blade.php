@extends('MainLayout.header')
@section('title')
<title>Policy Summary</title>
@endsection



@section('content')
<div class="policy-summary p-lg-5 p-md-4 p-3">
    <div class="container-fluid">
        <section class="ps-page-creator px-4 py-4">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Policy Summary Page Creator</h3>
                    <form action="">
                        <div class="row flex-lg-row-reverse">
                            <div class="col-lg-4 col-12 mt-3">
                                <div class="image-upload mx-auto">
                                    <img src="{{asset('images/user-img.png')}}" alt="hello" >
                                </div>
                            </div>
                            <div class="col-lg-8 col-12">
                                <div class="row align-items-end justify-content-end">
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Name</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Email</label>
                                            <input type="email" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Content No</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn sub-btn w-75 py-2">Add Agent Business Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Policy Information</h3>
                    <form action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-6 col-12 mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Customer Name</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Type </label>
                                            <!-- <input type="email" class="form-control py-2"  placeholder="Type Here"> -->
                                            <select class="custom-select form-control" id="inputGroupSelect01">
                                                <option selected>Seleect</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Company Name</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Amount</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Monthly Payment</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Number</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Date</label>
                                            <input type="date" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Agent Social Media Links</h3>
                    <form action="">
                        <div class="row"> 
                            <div class="col-12">
                                <div class="row align-items-end justify-content-end">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Facebook</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >LinkedIn</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Twitter</label>
                                            <input type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 col-12 mt-3">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn sub-btn w-75 py-2">+ Add More</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">
                    <form action="">
                        <div class="row"> 
                            <div class="col-12">
                                <div class="row align-items-end justify-content-end">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label >NOTES</label>
                                            <textarea class="form-control"  rows="5" placeholder="Type Here"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="mt-lg-5 mt-3">
                    <button class=" w-100 form-control mx-auto sub-btn py-2">Create</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
