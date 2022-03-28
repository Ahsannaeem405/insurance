@extends('MainLayout.header')
@section('title')
<title>Policy Summary</title>
@endsection



@section('content')
<div class="policy-summary p-lg-5 p-md-4 p-3">
    <div class="container-fluid">

                                            <div class="col-lg-12 col-12  mt-0 mt-md-3">
                                                <div class="form-group text-right">
                                                    <a href="{{url('user/policy/index')}}">   <button type="button" class="btn sub-btn w-25 py-2">View all policies</button></a>
                                                </div>
                                            </div>

        <form action="{{url('user/policy/create')}}" method="post">
            @csrf
        <section class="ps-page-creator px-4 py-4">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Policy Summary Page Creator</h3>

                        <div class="row flex-lg-row-reverse">
                            <div class="col-lg-4 col-12 mt-3">
                                <div class="image-upload mx-auto">
                                    <img src="{{asset("businesscard/$user->businessCard")}}" alt="hello" >
                                </div>
                            </div>
                            <div class="col-lg-8 col-12">
                                <div class="row align-items-end ">
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Name</label>
                                            <input value="{{$user->name}}" readonly type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Email</label>
                                            <input type="email"  value="{{$user->email}}" readonly class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Agent Content No</label>
                                            <input  value="{{$user->phone}}" readonly type="text" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
{{--                                    <div class="col-lg-6 col-12  mt-0 mt-md-3">--}}
{{--                                        <div class="form-group text-right">--}}
{{--                                            <button type="submit" class="btn sub-btn w-75 py-2">Add Agent Business Card</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>


                        </div>

                </div>
            </div>
        </section>
        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Policy Information</h3>

                        <div class="row">
                            <div class="col-12">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-6 col-12 mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Customer Name</label>
                                            <input type="text" required name="name" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Type </label>
                                            <!-- <input type="email" class="form-control py-2"  placeholder="Type Here"> -->
                                            <select class="custom-select form-control" name="type" required id="inputGroupSelect01">
                                                <option selected>select policy type</option>
                                              @foreach($company as $com)
                                                    <option value="{{$com->tagline}}">{{$com->tagline}}</option>
                                              @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Company Name</label>
                                            <select class="custom-select form-control" name="company" required
                                                    id="inputGroupSelect01">
                                                <option selected>select policy type</option>
                                                @foreach($company as $com)
                                                    <option value="{{$com->name}}">{{$com->name}}</option>
                                                @endforeach


                                            </select>                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Amount</label>
                                            <input type="text" name="amount" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Monthly Payment</label>
                                            <input type="text" name="monthly" class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Policy Number</label>
                                            <input type="text" name="number" required class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Date</label>
                                            <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control py-2" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>

        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">
                    <h3>Agent Social Media Links</h3>

                        <div class="row">
                            <div class="col-12">
                                <div class="row align-items-end ">
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Facebook</label>
                                            <input type="text" value="{{$user->fb}}" readonly class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >LinkedIn</label>
                                            <input type="text" value="{{$user->linkin}}" readonly class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                        <div class="form-group">
                                            <label >Twitter</label>
                                            <input type="text" value="{{$user->twitter}}" readonly class="form-control py-2"  placeholder="Type Here">
                                        </div>
                                    </div>


                                    @foreach($links as $link)
                                        <div class="col-lg-4 col-12  mt-0 mt-md-3">
                                            <div class="form-group">
                                                <label >Custom Link</label>
                                                <input type="text" value="{{$link->link}}" readonly class="form-control py-2"  placeholder="Type Here">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
{{--                        <div class="row justify-content-end">--}}
{{--                            <div class="col-lg-4 col-12 mt-3">--}}
{{--                                <div class="form-group text-right">--}}
{{--                                    <button type="submit" class="btn sub-btn w-75 py-2">+ Add More</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                </div>
            </div>
        </section>

        <section class="ps-page-creator px-4 py-4 mt-lg-5 mt-3">
            <div class="row">
                <div class="col-12 pt-3">

                        <div class="row">
                            <div class="col-12">
                                <div class="row align-items-end justify-content-end">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label >NOTES</label>
                                            <textarea class="form-control"  name="notes" rows="5" placeholder="Type Here"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="mt-lg-5 mt-3">
                    <button type="submit" class=" w-100 form-control mx-auto sub-btn py-2">Create</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
