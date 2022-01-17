<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use App\Models\conditionQuestion;
use App\Models\Medication;
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
     $rec=condition::with(['conditionQuestions' => function ($q){
         $q->with('ifyes');
         $q->with('ifno');
     }])->find($request->id);


    // dd($rec->conditionQuestions[1]);

     return view('Logged_pages.response.fex.condition_qa',compact('rec'));


 }

 public function condition_qa_next(Request $request)
 {


     $question=conditionQuestion::where('question_id',$request->id)->first();
     $answer=$request->answer;
     $rand=$request->rand;
     return view('Logged_pages.response.fex.condition_qa_next',compact('question','answer','rand'));


 }

 public function medications(Request $request)
 {
     $medication=$request->medication;
     $rec=Medication::where('medication_e','like',"%$medication%")->limit(5)->get()->unique('medication_e');

     return view('Logged_pages.response.fex.medication.medication',compact('rec'));
 }


    public function medication_condition(Request $request)
    {
        $rec=Medication::where('medication_e',$request->name)->get();


        // dd($rec->conditionQuestions[1]);

       return view('Logged_pages.response.fex.medication.medication_condition',compact('rec'));


    }


    public function condition_qa_med(Request $request)
    {
        $rec=condition::with(['conditionQuestions' => function ($q){
            $q->with('ifyes');
            $q->with('ifno');
        }])->find($request->id);
        $rand=$request->rand;



        // dd($rec->conditionQuestions[1]);

        return view('Logged_pages.response.fex.medication.medication_condition_qa',compact('rec','rand'));


    }

    public function condition_qa_med_len(Request $request)
    {
        $rec=condition::with(['conditionQuestions' => function ($q){
            $q->with('ifyes');
            $q->with('ifno');
        }])->find($request->id);

        $length=Count($rec->conditionQuestions);

        return response()->json($length);
    }
}
