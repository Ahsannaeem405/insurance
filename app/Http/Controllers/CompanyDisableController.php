<?php

namespace App\Http\Controllers;

use App\Models\commision;
use App\Models\companies;
use App\Models\companyDisable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDisableController extends Controller
{
    public function setting_update(Request $request)
    {
   $company=companies::all();
   $del=companyDisable::where('user_id',Auth::user()->id)->where('type','fex')->delete();
   $del=commision::where('user_id',Auth::user()->id)->where('type','fex')->delete();
   if($request->company)
   {
       foreach ($request->company as $com)
       {

           $disable=new companyDisable();
           $disable->user_id=Auth::user()->id;
           $disable->company_id=intval($com);
           $disable->type='fex';
           $disable->save();
       }
   }

   foreach ($company as $com)
   {
       $comm="commition$com->id";

     $commision=new commision();
     $commision->user_id=Auth::user()->id;
     $commision->company_id=$com->id;

     $commision->commision=$request->$comm;
     $commision->type='fex';
     $commision->save();
   }

   return back()->with('success','Setting updating successfully');



    }


    public function setting_update_term(Request $request)
    {
        $company=companies::all();
        $del=companyDisable::where('user_id',Auth::user()->id)->where('type','term')->delete();
        $del=commision::where('user_id',Auth::user()->id)->where('type','term')->delete();
        if($request->company)
        {
            foreach ($request->company as $com)
            {

                $disable=new companyDisable();
                $disable->user_id=Auth::user()->id;
                $disable->company_id=intval($com);
                $disable->type='term';
                $disable->save();
            }
        }


        foreach ($company as $com)
        {
            $comm="commition$com->id";

            $commision=new commision();
            $commision->user_id=Auth::user()->id;
            $commision->company_id=$com->id;

            $commision->commision=$request->$comm;
            $commision->type='term';
            $commision->save();
        }

        return back()->with('success','Setting updating successfully');



    }
}
