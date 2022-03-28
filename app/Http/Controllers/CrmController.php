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
        $eight=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(8);
        $nine=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(9);
        $twelve=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(12);

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
        $crm->eightMonth = $eight;
        $crm->NineMonth = $nine;
        $crm->twelveMonth = $twelve;

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
        $eight=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(8);
        $nine=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(9);
        $twelve=Carbon::createFromFormat('Y-m-d',$request->created)->addMonths(12);
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
        $crm->eightMonth = $eight;
        $crm->NineMonth = $nine;
        $crm->twelveMonth = $twelve;

        $crm->save();
        return back()->with('success', 'USER PUSH TO CRM SUCCESSFULLY');
    }

    public function dashboard(Request $request)
    {
//        $data=crm::select(
//
//            '*',
//                DB::raw('date_add(`created`, interval 8 month ) AS eight'),
//                DB::raw('date_add(`created`, interval 9 month ) AS nine'),
//                DB::raw('date_add(`created`, interval 1 year ) AS twelve'),
//        )->get();
//        dd($data);

        $search =  $request->input('q');


        $fex=companies::all();
        $term=termCompany::all();

        $customer=crm::where('user_id',\Auth::user()->id)
            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })

            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })

            ->select(

                DB::raw('sum(total_price) as total_price'),
                DB::raw('sum(total_earned_price) as total_earned_price'),
                DB::raw('COUNT(*) as coustomer')
            )
            ->first();

        $crm=crm::where('user_id',\Auth::user()->id)
            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })
            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })


            ->get();

        $eight=crm::where('user_id',\Auth::user()->id)

            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })

            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })

          -> where('eightMonth','>=',Carbon::now())
            ->count();

        $nine=crm::where('user_id',\Auth::user()->id)

            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })

            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })

            -> where('eightMonth','<',Carbon::now())
            -> where('NineMonth','>=',Carbon::now())
            ->count();


        $twelwe=crm::where('user_id',\Auth::user()->id)
            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })
            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })

            -> where('NineMonth','<',Carbon::now())
            -> where('twelveMonth','>=',Carbon::now())
            ->count();


        $twelwePlus=crm::where('user_id',\Auth::user()->id)
            ->when($search=='day', function ($query) use ($search) {
                $query->whereDate('created_at', Carbon::today());
            })
            ->when($search=='week', function ($query) use ($search) {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            })
            ->when($search=='month', function ($query) use ($search) {
                $query->whereMonth('created_at', date('m'))
                    ->whereYear('created_at', date('Y'));
            })
            ->when($search=='year', function ($query) use ($search) {
                $query->whereYear('created_at', date('Y'));
            })

            -> where('twelveMonth','<',Carbon::now())
            ->count();



        return view('Logged_pages.dashboard.index',compact('customer','crm','eight','nine','twelwe','twelwePlus','fex','term'));
    }
}
