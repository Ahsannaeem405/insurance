<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function quoter(Request $request)
    {

//dd($request->input());
        $gender = $request->gender;
        $age = ($request->age);
        $cigrate = $request->cigrate;
        $type = $request->type;
        $face_amount = $request->face_amount;
        $year_data = $request->year;


        if ($type == '10') {

            $userselection = 1;
        } elseif ($type == '15') {
            $userselection = 2;

        } elseif ($type == '20') {
            $userselection = 3;

        } elseif ($type == '25') {
            $userselection = 4;

        }
        elseif ($type == '30') {
            $userselection = 5;

        }


        $year = intval(date("Y"));
        $testing_array = array();

        $table = $gender . '_' . $cigrate . '_' . $type;


        $data = array();
        $datanot = array();
        $companies = companies::with('disableterm')->get();
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

                            })->first();


                        //query part2

                        //main
                        $cond2 = condition::where('company', $com->name)
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


            return view('Logged_pages.fex.response.fex.quoter', compact('data', 'datanot', 'age', 'gender', 'face_amount', 'type', 'cigrate', 'year_data'));


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

        $companies=companies::with('disableterm')->get();

        return view('Logged_pages.term.setting',compact('companies'));
    }


    public function compare(Request $request)
    {
        $companies = companies::with('disableterm')->get();

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


        return view('Logged_pages.term.compare', compact('companies', 'request', 'age', 'gender', 'year'));
    }


    public function compare_term(Request $request)
    {
        $gender = $request->gender;
        $cigrate = $request->cigrate;
        $type = $request->type;
        $type2 = $request->type2;
        $company_id = intval($request->company);
        $company_id2 = intval($request->company2);

        $company1=companies::find($company_id);
        $company2=companies::find($company_id2);

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


}
