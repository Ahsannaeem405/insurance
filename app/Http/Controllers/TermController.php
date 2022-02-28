<?php

namespace App\Http\Controllers;

use App\Models\ComboCondition;
use App\Models\companies;
use App\Models\condition;
use App\Models\conditionQuestion;
use App\Models\Medication;
use App\Models\states;
use App\Models\termComboCondition;
use App\Models\termCompany;
use App\Models\termCondition;
use App\Models\termConditionQuestion;
use App\Models\termMedication;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public $lang;

    public function  __construct()
    {

        $this->middleware(function ($request, $next){
            $language=  \Session::get('lang');
            if($language=='sp')
            {
                $language='s';
                $this->lang='s';
                $reason='reason_'.$language.'';
                $plan='plan_info_'.$language.'';
                $agent='agent_compensation_'.$language.'';

            }
            else{
                $language='e';
                $this->lang='e';

                $reason='reason_'.$language.'';
                $plan='plan_info_'.$language.'';
                $agent='agent_compensation_'.$language.'';
            }
            \View::share(compact('language','reason','plan','agent'));
            return $next($request);
        });



    }

    public function index()
    {

        $states=states::all();
        return view('Logged_pages.term.term',compact('states'));
    }

    public function quoter(Request $request)
    {

//dd($request->input());
        $gender = $request->gender;
        $age = ($request->age);
        $cigrate = $request->cigrate;
        $type = $request->type;
        $face_amount = $request->face_amount;
        $year_data = $request->year;


        if ($type == 'tens') {
            $userselection = 1;
        } elseif ($type == 'fifteens') {
            $userselection = 2;
        } elseif ($type == 'twenties') {
            $userselection = 3;
        } elseif ($type == 'twentyfives') {
            $userselection = 4;
        } elseif ($type == 'thirties') {
            $userselection = 5;
        }


        $year = intval(date("Y"));
        $testing_array = array();

        $table = $gender . '_' . $cigrate . '_' . $type;


        $data = array();
        $datanot = array();
        $companies = termCompany::with('disableterm')->get();
//dd($request->input());
        if ($request->condition_ids) {

            //$treatment = $diagnose = 0;
            foreach ($request->condition_ids as $conditions) {
                foreach ($companies as $com) {
                    $types = 'q_type' . $conditions;
                    if ($request->$types == null) {
                        $request->$types = array();

                    }
                    $yeardata = 'year_' . $conditions;
                    for ($i = 0; $i < count($request->$types); $i++) {
                        if ($request->$types[$i] == "treatment") {
                            $treatment = $year - intval($request->$yeardata[$i]);
                        } elseif ($request->$types[$i] == "diagnos") {
                            //  dd(intval($request->$yeardata[$i]));
                            $diagnose = $year - intval($request->$yeardata[$i]);
                        }
                    }
//dd($treatment);


                    if (!isset($treatment)) {
                        $treatment = 0;
                    }
                    if (!isset($diagnose)) {
                        $diagnose = 0;
                    }


                    if (isset($treatment) && isset($diagnose)) {

                        //query part 1
                        $cond = termCondition::where('company', $com->name)->
                        where('condition_id', $conditions)
                            //->where('tagline', $com->tagline)
                            ->where('decline', '!=', 'Yes')
                            ->where(function ($query) use ($treatment, $diagnose) {


                                $query->where(function ($query) use ($treatment) {
                                    $query->where('treatment_allowed_to', '>=', $treatment);
                                });

                                $query->where(function ($query) use ($treatment) {
                                    $query->where('treatment_allowed_from', '<=', $treatment);

                                });

                                $query->where(function ($query) use ($diagnose) {
                                    $query->where('diagnose_allowed_to', '>=', $diagnose);
                                });

                                $query->where(function ($query) use ($diagnose) {
                                    $query->where('diagnose_allowed_from', '<=', $diagnose);
                                });

                            })
                            ->first();


                        //query part2

                        //main
                        $cond2 = termCondition::where('company', $com->name)
                            ->where('condition_id', $conditions)
                            //   ->where('tagline', $com->tagline)
                            ->where('decline', '!=', 'Yes')
                            ->where(function ($query) use ($treatment, $diagnose) {

                                $query->where(function ($query) use ($treatment, $diagnose) {

                                    $query->where(function ($query) use ($treatment) {
                                        $query->where('treatment_decline_to', '>=', $treatment);

                                    });

                                    $query->where(function ($query) use ($treatment) {
                                        $query->where('treatment_decline_from', '<=', $treatment);

                                    });

                                });
                                $query->Orwhere(function ($query) use ($treatment, $diagnose) {

                                    $query->where(function ($query) use ($diagnose) {
                                        $query->where('diagnose_decline_to', '>=', $diagnose);

                                    });

                                    $query->where(function ($query) use ($diagnose) {
                                        $query->where('diagnose_decline_from', '<=', $diagnose);

                                    });

                                });

                            })
                            ->first();



                        if ($cond && !$cond2) {
                            if ($cond->category == '10') {
                                $cat = 'tens';
                                $cat2 = 1;
                            } elseif ($cond->category == '15') {
                                $cat = 'fifteens';
                                $cat2 = 2;
                            } elseif ($cond->category == '20') {
                                $cat = 'twenties';
                                $cat2 = 3;
                            } elseif ($cond->category == '25') {
                                $cat = 'twentyfives';
                                $cat2 = 4;
                            }
                            elseif ($cond->category == '30') {
                                $cat = 'thirties';
                                $cat2 = 5;
                            }
                            else {
                                $cat = $type;
                                $cat2 = $userselection;
                            }

                            $table2 = $gender . '_' . $cigrate . '_' . $cat;

                            $rec = \DB::table($table2)->where('Age', $request->age)->where('Amount', $request->face_amount)->where('company_id', $com->id)->first();
                            //if rec yes
                            if ($rec) {

                                if (isset($testing_array['company_status' . $com->id . ''])) {
                                    if ($testing_array['company_status' . $com->id . ''] == 1) {
                                        if ($testing_array['company_cat' . $com->id . ''] < $cat2) {

                                            $testing_array['condition_record' . $com->id . ''] = $cond;
                                            $testing_array['company_record' . $com->id . ''] = $rec;
                                            $testing_array['company_status' . $com->id . ''] = 1;
                                            $testing_array['company_cat' . $com->id . ''] = $cat2;

                                        }
                                    }
                                } else {
                                    $testing_array['condition_record' . $com->id . ''] = $cond;
                                    $testing_array['company_record' . $com->id . ''] = $rec;
                                    $testing_array['company_status' . $com->id . ''] = 1;
                                    $testing_array['company_cat' . $com->id . ''] = $cat2;
                                }


                            } //if no rec
                            else {

                                if (!isset($testing_array['company_status' . $com->id . ''])) {
                                    $testing_array['company_record' . $com->id . ''] = $com;
                                    $testing_array['company_status' . $com->id . ''] = 0;
                                    $testing_array['condition_record' . $com->id . ''] = $cond;
                                    $testing_array['company_cat' . $com->id . ''] = $cat2;


                                } else {


                                    $testing_array['company_status' . $com->id . ''] = 0;
                                    $testing_array['condition_record' . $com->id . ''] = $cond;
                                    $testing_array['company_cat' . $com->id . ''] = $cat2;


                                }
                            }

                        } //wrong cond
                        else {


                            if (!isset($testing_array['company_status' . $com->id . ''])) {

                                $testing_array['company_record' . $com->id . ''] = $com;
                                $testing_array['company_status' . $com->id . ''] = 0;
                                $testing_array['company_cat' . $com->id . ''] = $userselection;

                                if ($cond2) {
                                    $testing_array['condition_record' . $com->id . ''] = $cond2;

                                } elseif ($cond) {
                                    $testing_array['condition_record' . $com->id . ''] = $cond;

                                }

                            } else {

                                $testing_array['company_status' . $com->id . ''] = 0;
                                $testing_array['company_cat' . $com->id . ''] = $userselection;

                                if ($cond2) {
                                    $testing_array['condition_record' . $com->id . ''] = $cond2;

                                } elseif ($cond) {
                                    $testing_array['condition_record' . $com->id . ''] = $cond;

                                }


                            }

                        }
                        unset($treatment);
                        unset($diagnose);
                    }
                }
            }

//dd($testing_array);

            foreach ($companies as $com) {

                if (isset($testing_array['company_status' . $com->id . ''])) {
                    if ($testing_array['company_status' . $com->id . ''] == 1) {
                        $data[] = array(
                            'data' => $testing_array['company_record' . $com->id . ''],
                            'conditiondata' => $testing_array['condition_record' . $com->id . ''],
                            'level' => $testing_array['company_cat' . $com->id . ''],
                            'disable'=>$com->disableterm
                        );
                    } else {
                        $datanot[] = array(
                            'data' => $com,
                            'conditiondata' => isset($testing_array['condition_record' . $com->id . '']) ? $testing_array['condition_record' . $com->id . ''] : null,
                            'level' => $testing_array['company_cat' . $com->id . ''],
                            'disable'=>$com->disableterm

                        );
                    }
                } else {
                    $datanot[] = array(
                        'data' => $com,
                        'conditiondata' => isset($testing_array['condition_record' . $com->id . '']) ? $testing_array['condition_record' . $com->id . ''] : null,
                        'level' => $testing_array['company_cat' . $com->id . ''],
                        'disable'=>$com->disableterm
                    );
                }
            }


            $datanot = collect($datanot);
            $datanot = $datanot->sortByDesc('level');
            $datanot->values()->all();


            $data = collect($data);
            $data = $data->sortByDesc('level');
            $data->values()->all();


            return view('Logged_pages.term.response.term.quoter', compact('data', 'datanot', 'age', 'gender', 'face_amount', 'type', 'cigrate', 'year_data'));


        }
        else {

            foreach ($companies as $com) {

                $rec = \DB::table($table)->where('Age', $age)->where('Amount', $request->face_amount)->where('company_id', $com->id)->first();

                if ($rec) {
                    $data[] = array(

                        'data' => $rec,
                        'disable'=>$com->disableterm
                    );
                } else {
                    $datanot[] = array(

                        'data' => $com,
                        'disable'=>$com->disableterm

                    );
                }

            }

            return view('Logged_pages.term.response.term.quoter', compact('data', 'datanot', 'age', 'gender', 'face_amount', 'type', 'cigrate', 'year_data'));
        }


    }

    public function setting()
    {

        $companies=termCompany::with('disableterm','commisionterm')->get();
        return view('Logged_pages.term.setting',compact('companies'));
    }

    public function compare(Request $request)
    {
        $states=states::all();
        $companies = termCompany::with('disableterm')->get();

        if ($request->gender) {
            $gender = $request->gender;
        } else {
            $gender = 'male';
        }

        if ($request->age) {
            $age = $request->age;
        } else {
            $age = 22;
        }

        if ($request->year) {
            $year = $request->year;
        } else {
            $year = 1999;
        }


        return view('Logged_pages.term.compare', compact('states','companies', 'request', 'age', 'gender', 'year'));
    }

    public function compare_term(Request $request)
    {
        $gender = $request->gender;
        $cigrate = $request->cigrate;
        $type = $request->type;
        $type2 = $request->type2;
        $company_id = intval($request->company);
        $company_id2 = intval($request->company2);

        $company1=termCompany::find($company_id);
        $company2=termCompany::find($company_id2);

        $table = $gender . '_' . $cigrate . '_' . $type;
        $table2 = $gender . '_' . $cigrate . '_' . $type2;

        $rec1 = \DB::table($table)->where('Age', $request->age)->where('Amount', $request->face_amount1)->where('company_id', $company_id)->first();
        $rec2 = \DB::table($table)->where('Age', $request->age)->where('Amount', $request->face_amount2)->where('company_id', $company_id)->first();
        $rec3 = \DB::table($table)->where('Age', $request->age)->where('Amount', $request->face_amount3)->where('company_id', $company_id)->first();

        $rec4 = \DB::table($table2)->where('Age', $request->age)->where('Amount', $request->face_amount11)->where('company_id', $company_id2)->first();
        $rec5 = \DB::table($table2)->where('Age', $request->age)->where('Amount', $request->face_amount22)->where('company_id', $company_id2)->first();
        $rec6 = \DB::table($table2)->where('Age', $request->age)->where('Amount', $request->face_amount33)->where('company_id', $company_id2)->first();

        return view('Logged_pages.term.response.term.compare.compare', compact('rec1', 'rec2', 'rec3','rec4','rec5','rec6','company1','company2'));
    }

    public function condition(Request $request)
    {

        $condition = $request->condition;
        $rec = termCondition::where('condition_'.$this->lang.'', 'like', "%$condition%")->get()->unique('condition_'.$this->lang.'');
        $rec = collect($rec);

        $rec=$rec->take(5);
        return view('Logged_pages.term.response.term.condition', compact('rec'));

    }

    public function condition_qa(Request $request)
    {
        $rec = termCondition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->where('condition_id',$request->id)->first();

        return view('Logged_pages.term.response.term.condition_qa', compact('rec'));


    }

    public function condition_qa_next(Request $request)
    {

        $question = termConditionQuestion::where('question_id', $request->id)->first();
        $answer = $request->answer;
        $rand = $request->rand;
        return view('Logged_pages.term.response.term.condition_qa_next', compact('question', 'answer', 'rand'));


    }

    public function medications(Request $request)
    {
        $medication = $request->medication;
        $rec = termMedication::where('medication_'.$this->lang.'','like', "%$medication%")->get()->unique('medication_'.$this->lang.'');
        $rec = collect($rec);
        $rec=$rec->take(5);


        return view('Logged_pages.term.response.term.medication.medication', compact('rec'));
    }

    public function medication_condition(Request $request)
    {
        $rec = termMedication::where('medication_'.$this->lang.'', $request->name)->get();
        return view('Logged_pages.term.response.term.medication.medication_condition', compact('rec'));


    }


    public function condition_qa_med(Request $request)
    {
        $rec = termCondition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->where('condition_id',$request->id)->first();
        $rand = $request->rand;

        return view('Logged_pages.term.response.term.medication.medication_condition_qa', compact('rec', 'rand'));
    }

    public function condition_qa_med_len(Request $request)
    {
        $rec = termCondition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->where('condition_id',$request->id)->first();
        $length=Count($rec->conditionQuestions);
        return response()->json($length);
    }

    public function get_combo_fex(Request $request)
    {
        $medications= $request->medication_ids;
        $comboCond=termComboCondition::all();

        foreach ($comboCond as $combo)
        {

            $condition1=$condition2=$condition3=$condition4=$condition5=$condition6=$condition7=$condition8=false;


            $grpup1=$combo->group_1;
            $grpup2=$combo->group_2;
            $grpup3=$combo->group_3;
            $grpup4=$combo->group_4;
            $grpup5=$combo->group_5;
            $grpup6=$combo->group_6;
            $grpup7=$combo->group_7;
            $grpup8=$combo->group_8;

            if($grpup1=='' || $grpup1==null)
            {
                $condition1=true;
            }
            else{
                $grpup1=explode(', ',$grpup1);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup1);
                    if($res==true)
                    {
                        $condition1=true;
                        break;
                    }
                }

            }
            if($grpup2=='' || $grpup2==null)
            {
                $condition2=true;
            }
            else{
                $grpup2=explode(', ',$grpup2);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup2);
                    if($res==true)
                    {
                        $condition2=true;
                        break;
                    }
                }

            }
            if($grpup3=='' || $grpup2==null)
            {
                $condition3=true;
            }
            else{
                $grpup3=explode(', ',$grpup3);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup3);
                    if($res==true)
                    {
                        $condition3=true;
                        break;
                    }
                }

            }
            if($grpup4=='' || $grpup4==null)
            {
                $condition4=true;
            }
            else{
                $grpup4=explode(', ',$grpup4);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup4);
                    if($res==true)
                    {
                        $condition4=true;
                        break;
                    }
                }

            }
            if($grpup5=='' || $grpup5==null)
            {
                $condition5=true;
            }
            else{
                $grpup5=explode(', ',$grpup5);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup5);
                    if($res==true)
                    {
                        $condition5=true;
                        break;
                    }
                }

            }
            if($grpup6=='' || $grpup6==null)
            {
                $condition6=true;
            }
            else{
                $grpup6=explode(', ',$grpup6);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup6);
                    if($res==true)
                    {
                        $condition6=true;
                        break;
                    }
                }

            }
            if($grpup7=='' || $grpup7==null)
            {
                $condition7=true;
            }
            else{
                $grpup7=explode(', ',$grpup7);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup7);
                    if($res==true)
                    {
                        $condition7=true;
                        break;
                    }
                }

            }
            if($grpup8=='' || $grpup8==null)
            {

                $condition8=true;
            }
            else{
                $grpup8=explode(', ',$grpup8);
                foreach ($medications as $med)
                {
                    $res= in_array($med,$grpup8);
                    if($res==true)
                    {
                        $condition8=true;
                        break;
                    }
                }

            }


            if($condition1==true && $condition2==true && $condition3==true && $condition4==true && $condition5==true && $condition6==true && $condition7==true && $condition8==true)
            {
                return response()->json(['success'=>true,'condition'=>$combo->condition_id]);
            }

        }
        return response()->json(['success'=>false]);



    }

}
