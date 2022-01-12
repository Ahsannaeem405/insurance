<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use App\Models\conditionQuestion;
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


 public function condition(Request $request)
 {

     $condition=$request->condition;
     $rec=condition::where('condition_e','like',"%$condition%")->limit(5)->get()->unique('condition_e');

     return view('Logged_pages.response.fex.condition',compact('rec'));

 }

 public function condition_qa(Request $request)
 {
     $rec=condition::with('conditionQuestions')->find($request->id);



     return view('Logged_pages.response.fex.condition_qa',compact('rec'));



 }

 public function condition_qa_next(Request $request)
 {


     $rec=conditionQuestion::where('question_id',$request->id)->first();

     return response($rec);
 }
}
