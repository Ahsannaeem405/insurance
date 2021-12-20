<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;

class FexController extends Controller
{
 public function quoter(Request $request)
 {

$gender=$request->gender;
$cigrate=$request->cigrate;
$type=$request->type;

$table=$gender.'_'.$cigrate.'_'.$type;

$data=array();
$datanot=array();
$companies=companies::all();

foreach ($companies as $com)
    {
        $rec=\DB::table($table)->where('Age',$request->age)->where('Amount',$request->face_amount)->where('company_id',$com->id)->first();
        if($rec)
        {
            $data[]=array(

                'data'=>$rec
            );
        }
        else{
            $datanot[]=array(

                'data'=>$com
            );
        }

    }




return view('Logged_pages.response.fex.quoter',compact('data','datanot'));
 }
}
