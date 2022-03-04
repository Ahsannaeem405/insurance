<?php

namespace App\Http\Controllers;

use App\Models\commision;
use App\Models\companies;
use App\Models\crm;
use App\Models\termCompany;
use Carbon\Carbon;
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
            $per=$per->commision!=null ? $per->commision : 20;
        }
        else{
            $per=20;
        }


        $price = floatval(str_replace('$', '', $request->price));
        $startDate=Carbon::createFromFormat('Y-m-d',$request->created);
        $earn = ($price * 9) * (floatval($per) / 100);
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
        $crm->dob = $request->dob;
        $crm->addreess = $request->addreess;
        $crm->phone = $request->phone;
        $crm->notes = $request->notes;
        $crm->created = $request->created;
        $crm->eightMonth = $startDate->addMonths(8);
        $crm->NineMonth = $startDate->addMonths(9);
        $crm->twelveMonth = $startDate->addMonths(12);

        $crm->save();

        return redirect('user/dashboard')->with('success', 'USER PUSH TO CRM SUCCESSFULLY');
    }

    public function pushManual(Request $request)
    {
        if ($request->companytype=='fex')
        {
            $company=companies::find($request->fexcompany);
        }
        else{
            $company=termCompany::find($request->termcompany);
        }
        $per=commision::where('user_id',\Auth::user()->id)->where('company_id',$company->id)->first();
        if ($per)
        {
            $per=$per->commision!=null ? $per->commision : 20;
        }
        else{
            $per=20;
        }


        $price = floatval($request->price);
        $startDate=Carbon::createFromFormat('Y-m-d',$request->created);
        $earn = ($price * 9) * (floatval($per) / 100);
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
        $crm->dob = $request->dob;
        $crm->addreess = $request->addreess;
        $crm->phone = $request->phone;
        $crm->notes = $request->notes;
        $crm->created = $request->created;
        $crm->eightMonth = $startDate->addMonths(8);
        $crm->NineMonth = $startDate->addMonths(9);
        $crm->twelveMonth = $startDate->addMonths(12);

        $crm->save();

        return back()->with('success', 'USER PUSH TO CRM SUCCESSFULLY');
    }

    public function dashboard()
    {
        $fex=companies::all();
        $term=termCompany::all();

        $customer=crm::where('user_id',\Auth::user()->id)
            ->select(

                DB::raw('sum(total_price) as total_price'),
                DB::raw('sum(total_earned_price) as total_earned_price'),
                DB::raw('COUNT(id) as coustomer')
            )
            ->first();

        $crm=crm::where('user_id',\Auth::user()->id)->where('twelveMonth','>=',Carbon::now())->get();

        $eight=crm::where('user_id',\Auth::user()->id)
          -> where('eightMonth','>=',Carbon::now())
            ->count();

        $nine=crm::where('user_id',\Auth::user()->id)
            -> where('eightMonth','<',Carbon::now())
            -> where('NineMonth','>=',Carbon::now())
            ->count();


        $twelwe=crm::where('user_id',\Auth::user()->id)
            -> where('NineMonth','<',Carbon::now())
            -> where('twelveMonth','>=',Carbon::now())
            ->count();




        return view('Logged_pages.dashboard.index',compact('customer','crm','eight','nine','twelwe','fex','term'));
    }
}
