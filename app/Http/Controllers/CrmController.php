<?php

namespace App\Http\Controllers;

use App\Models\commision;
use App\Models\companies;
use App\Models\crm;
use App\Models\termCompany;
use Illuminate\Http\Request;
use DB;
class CrmController extends Controller
{
    public function push(Request $request)
    {
        if ($request->typedata=='fex')
        {
            $company=companies::find($request->company);
        }
        else{
            $company=termCompany::find($request->company);
        }
        $per=commision::where('user_id',\Auth::user()->id)->where('company_id',$company->id)->first();
        if ($per)
        {
            $per=$per->commision;
        }
        else{
            $per=20;
        }


        $price = floatval(str_replace('$', '', $request->price));

        $earn = ($price * 12) * (floatval($per) / 100);
        $crm = new crm();
        $crm->name = $request->name;
        $crm->email = $request->email;
        $crm->tagline = $request->tagline;
        $crm->company =$company->name;
        $crm->percntage = floatval($per);
        $crm->monthly_price = $price;
        $crm->total_price = $price * 12;
        $crm->total_earned_price = $earn;
        $crm->user_id = \Auth::user()->id;
        $crm->save();

        return redirect('user/dashboard')->with('success', 'user push to crm successfully');
    }

    public function dashboard()
    {

        $customer=crm::where('user_id',\Auth::user()->id)
            ->select(

                DB::raw('sum(total_price) as total_price'),
                DB::raw('sum(total_earned_price) as total_earned_price'),
                DB::raw('COUNT(id) as coustomer')
            )
            ->first();

        $crm=crm::where('user_id',\Auth::user()->id)->get();





        return view('Logged_pages.dashboard.index',compact('customer','crm'));
    }
}
