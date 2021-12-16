<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FexController extends Controller
{
 public function quoter(Request $request)
 {

$gender=$request->gender;
$cigrate=$request->cigrate;
$type=$request->type;

$table=$gender.'_'.$cigrate.'_'.$type;

$data=\DB::table($table)->where('Age',$request->age)->where('Amount',$request->face_amount)->get();

return view('Logged_pages.response.fex.quoter',compact('data'));
 }
}
