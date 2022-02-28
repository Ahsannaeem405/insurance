<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\legealCheckerFexOffense;
use App\Models\legealCheckerQuestion;
use App\Models\legealCheckerTermOffense;
use App\Models\states;
use App\Models\termCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LegealCheckerFexController extends Controller
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
        $offends=legealCheckerFexOffense::where('offense_e','!=',' ')->get()->unique('offense_'.$this->lang.'');

        return view('Logged_pages.legalChecker.legelcheckerFex',compact('states','offends'));
    }

    public function condition_qa(Request $request)
    {
        $rec = legealCheckerFexOffense::with('offenseQuestions')->where('offense_id',$request->id)->first();


        return view('Logged_pages.legalChecker.response.fex.condition_qa', compact('rec'));


    }

    public function condition_qa_next(Request $request)
    {

        $question = legealCheckerQuestion::where('question_id', $request->id)->first();
        $answer = $request->answer;
        $rand = $request->rand;
        return view('Logged_pages.legalChecker.response.fex.condition_qa_next', compact('question', 'answer', 'rand'));


    }


    public function quoter(Request $request)
    {

        $gender = $request->gender;
        $age = ($request->age);
        $cigrate = $request->cigrate;
        $type = $request->type;
        $face_amount = $request->face_amount;
        $year_data = $request->year;


        if ($type == 'levels') {

            $userselection = 1;
        } elseif ($type == 'modifieds') {
            $userselection = 2;

        } elseif ($type == 'guaranteeds') {
            $userselection = 3;

        } elseif ($type == 'limiteds') {
            $userselection = 4;

        }


        $year = intval(date("Y"));
        $testing_array = array();

        $table = $gender . '_' . $cigrate . '_' . $type;


        $data = array();
        $datanot = array();
        $companies = companies::with('disable')->get();

        if ($request->offense_ids) {
            //  dd($request->input());
            //$treatment = $diagnose = 0;
            foreach ($request->offense_ids as $conditions) {
                foreach ($companies as $com) {
                    $types = 'q_type' . $conditions;
                    if ($request->$types == null) {
                        $request->$types = array();

                    }
                    $yeardata = 'year_' . $conditions;
                    $mondata = 'month_' . $conditions;
                    $daydata = 'day_' . $conditions;


                    $nowdata=Carbon::now();
                    $nowdata=Carbon::parse($nowdata)->format('Y-m-d');
                    for ($i = 0; $i < count($request->$types); $i++) {
                        if ($request->$types[$i] == "offense") {
                            $offense_year = $year - intval($request->$yeardata[$i]);

                            $finaldata=$request->$yeardata[$i].'-'.$request->$mondata[$i].'-'.$request->$daydata[$i];

                            $this_month = Carbon::createFromFormat('Y-m-d',"$finaldata"); // returns 2019-07-01

                            $start_month = Carbon::createFromFormat('Y-m-d',"$nowdata");

                            $offense_month = $start_month->diffInMonths($this_month);


                        }
                        if ($request->$types[$i] == "decline") {
                            $decline=false;
                        }
                    }
//dd($treatment);


                    if (!isset($offense_year)) {
                        $offense_year = 0;
                    }

                    if (!isset($decline)) {
                        $decline = true;
                    }



                    if (isset($offense_year) ) {

                        //query part 1
                        $cond = legealCheckerFexOffense::where('company', $com->name)->
                        where('offense_id', $conditions)
                            //->where('tagline', $com->tagline)
                            ->where('decline', '!=', 'Yes')
                            ->where(function ($query) use ($offense_year) {


                                $query->where(function ($query) use ($offense_year) {
                                    $query->where('offense_allowed_to', '>=', $offense_year);
                                });

                                $query->where(function ($query) use ($offense_year) {
                                    $query->where('offense_allowed_from', '<=', $offense_year);

                                });


                            })
                            ->first();



                        //query part2

                        //main
                        $cond2 = legealCheckerFexOffense::where('company', $com->name)
                            ->where('offense_id', $conditions)

                            ->where('decline', '!=', 'Yes')
                            ->where(function ($query) use ($offense_year,$offense_month) {

                                $query->where(function ($query) use ($offense_year) {

                                    $query->where(function ($query) use ($offense_year) {
                                        $query->where('offense_decline_to', '>=', $offense_year);

                                    });

                                    $query->where(function ($query) use ($offense_year) {
                                        $query->where('offense_decline_from', '<=', $offense_year);

                                    });

                                })
                                    ->Orwhere(function ($query) use ($offense_month) {
                                        $query->where(function ($query) use ($offense_month) {
                                            $query->where('offense_decline_month_to', '>=', $offense_month);
                                        });

                                        $query->where(function ($query) use ($offense_month) {
                                            $query->where('offense_decline_month_from', '<=', $offense_month);

                                        });


                                    });
                            })
                            ->first();

//                        if ($cond)
//                        {
//                            if ($cond->offense_curretly=='If yes Decline' && $decline==true)
//                            {
//                                $cond=null;
//                            }
//                        }





                        if ($cond && !$cond2) {
                            if ($cond->category == 'Level') {
                                $cat = 'levels';
                                $cat2 = 1;
                            } elseif ($cond->category == 'Graded') {
                                $cat = 'modifieds';
                                $cat2 = 2;
                            } elseif ($cond->category == 'Guaranteed') {
                                $cat = 'guaranteeds';
                                $cat2 = 3;
                            } elseif ($cond->category == 'Limited') {
                                $cat = 'limiteds';
                                $cat2 = 4;
                            } else {
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
                        unset($offense_year);
                        unset($decline);

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


            return view('Logged_pages.legalChecker.response.fex.quoter', compact('data', 'datanot', 'age', 'gender', 'face_amount', 'type', 'cigrate', 'year_data'));


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

            return view('Logged_pages.legalChecker.response.fex.quoter', compact('data', 'datanot', 'age', 'gender', 'face_amount', 'type', 'cigrate', 'year_data'));
        }


    }
}
