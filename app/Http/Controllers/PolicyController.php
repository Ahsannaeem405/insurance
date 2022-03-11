<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Policy;
use App\Models\socialLink;
use App\Models\User;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function policy()
    {
        $user = User::find(\Auth::user()->id);
        $company = companies::all();
        $links = socialLink::where('user_id', $user->id)->get();

        return view('Logged_pages.policy.policysummary', compact('user', 'links', 'company'));
    }
    public function policyCreate(Request $request)
    {

        $policy=new Policy();
        $policy->name=$request->name;
        $policy->type=$request->type;
        $policy->company=$request->company;
        $policy->amount=$request->amount;
        $policy->monthly=$request->monthly;
        $policy->number=$request->number;
        $policy->date=$request->date;
        $policy->notes=$request->notes;
        $policy->user_id=\Auth::user()->id;
        $policy->save();

        return redirect('user/policy/index')->with('success','policy added successfully');

    }

    public function index()
    {
        $policy=Policy::where('user_id',\Auth::user()->id)->get();
        return view('Logged_pages.policy.index',compact('policy'));
    }
}
