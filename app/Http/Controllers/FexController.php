<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use App\Models\conditionQuestion;
use App\Models\Medication;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FexController extends Controller
{
    public function quoter(Request $request)
    {

//dd($request->input());
        $gender = $request->gender;
        $cigrate = $request->cigrate;
        $type = $request->type;

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
        $companies = companies::all();
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
                        $cond = condition::where('company', $com->name)->
                        where('condition_id', $conditions)
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

                            })->first();


                        //query part2

                        //main
                        $cond2 = condition::where('company', $com->name)
                            ->where('condition_id', $conditions)
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


                            }
                            //if no rec
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

                        }
                        //wrong cond
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
                            'level'=>$testing_array['company_cat'. $com->id . ''],
                        );
                    } else {
                        $datanot[] = array(
                            'data' => $com,
                            'conditiondata' => isset($testing_array['condition_record' . $com->id . '']) ? $testing_array['condition_record' . $com->id . ''] : null,
                            'level'=>$testing_array['company_cat'. $com->id . ''],

                            );
                    }
                } else {
                    $datanot[] = array(
                        'data' => $com,
                        'conditiondata' => isset($testing_array['condition_record' . $com->id . '']) ? $testing_array['condition_record' . $com->id . ''] : null,
                        'level'=>$testing_array['company_cat'. $com->id . ''],
                    );
                }
            }



            $datanot = collect($datanot);
            $datanot = $datanot->sortByDesc('level');
            $datanot->values()->all();


            $data = collect($data);
            $data = $data->sortByDesc('level');
            $data->values()->all();



            return view('Logged_pages.response.fex.quoter', compact('data', 'datanot'));


        } else {


            foreach ($companies as $com) {
                $rec = \DB::table($table)->where('Age', $request->age)->where('Amount', $request->face_amount)->where('company_id', $com->id)->first();

                if ($rec) {
                    $data[] = array(

                        'data' => $rec
                    );
                } else {
                    $datanot[] = array(

                        'data' => $com
                    );
                }

            }

            return view('Logged_pages.response.fex.quoter', compact('data', 'datanot'));
        }


    }

    public function sort($a, $b)
    {
        if($a->level == $b->level) {
            return 0 ;
        }
        return ($a->level < $b->level) ? -1 : 1;
    }


    public function condition(Request $request)
    {

        $condition = $request->condition;
        $rec = condition::where('condition_e', 'like', "%$condition%")->limit(5)->get()->unique('condition_e');

        return view('Logged_pages.response.fex.condition', compact('rec'));

    }

    public function condition_qa(Request $request)
    {
        $rec = condition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->find($request->id);


        return view('Logged_pages.response.fex.condition_qa', compact('rec'));


    }

    public function condition_qa_next(Request $request)
    {


        $question = conditionQuestion::where('question_id', $request->id)->first();
        $answer = $request->answer;
        $rand = $request->rand;
        return view('Logged_pages.response.fex.condition_qa_next', compact('question', 'answer', 'rand'));


    }

    public function medications(Request $request)
    {
        $medication = $request->medication;
        $rec = Medication::where('medication_e', 'like', "%$medication%")->limit(5)->get()->unique('medication_e');

        return view('Logged_pages.response.fex.medication.medication', compact('rec'));
    }


    public function medication_condition(Request $request)
    {
        $rec = Medication::where('medication_e', $request->name)->get();


        // dd($rec->conditionQuestions[1]);

        return view('Logged_pages.response.fex.medication.medication_condition', compact('rec'));


    }


    public function condition_qa_med(Request $request)
    {
        $rec = condition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->find($request->id);
        $rand = $request->rand;


        // dd($rec->conditionQuestions[1]);

        return view('Logged_pages.response.fex.medication.medication_condition_qa', compact('rec', 'rand'));


    }

    public function condition_qa_med_len(Request $request)
    {
        $rec = condition::with(['conditionQuestions' => function ($q) {
            $q->with('ifyes');
            $q->with('ifno');
        }])->find($request->id);

        $length = Count($rec->conditionQuestions);

        return response()->json($length);
    }
}
