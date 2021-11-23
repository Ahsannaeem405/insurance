<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function pricing()
    {
        $pricing=Setting::first();
        return view('pricing',compact('pricing'));
    }
}
