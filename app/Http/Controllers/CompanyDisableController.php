<?php

namespace App\Http\Controllers;

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

   return back()->with('success','Setting updating successfully');



    }
}
