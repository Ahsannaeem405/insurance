<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use App\Models\Coupan;
use App\Models\maleNonSmoker_level;
use App\Models\Setting;
use App\Models\Subsription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Fluent\Concerns\Has;
use Stripe;


class UserController extends Controller
{

    public function __construct()
    {
     //  \App::setLocale('sp');
    }

    public function import()
    {
        return view('import');

    }
    public function import_data(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // File Details
            $filename = $file->getClientOriginalName().time();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");

            // 2MB in Bytes
            $maxFileSize = 2097152555;

            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {

                // Check file size
                if ($fileSize <= $maxFileSize) {

                    // File upload location
                    $location = 'uploads/appsetting/';

                    // Upload file
                    $file->move($location, $filename);

                    // Import CSV to Database
                    $filepath = ($location . "/" . $filename);

                    // Reading file
                    $file = fopen($filepath, "r");

                    $importData_arr = array();
                    $i = 0;
                    $key_word=condition::truncate();
                    $i=0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);


                        if($i!=0)
                        {


                            for ($c=0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;



                    }
                    fclose($file);

                    foreach($importData_arr as $importData){

                        $keyword=new condition();
                        $keyword->condition_e=utf8_decode($importData[0]);
                        $keyword->condition_s=utf8_decode($importData[1]);
                        $keyword->company=utf8_decode($importData[2]);
                        $keyword->tagline=utf8_decode($importData[3]);
                        $keyword->allowed=utf8_decode($importData[4]);
                        $keyword->decline=utf8_decode($importData[5]);

                        $keyword->treatment_allowed_from=utf8_decode($importData[6]);
                        $keyword->treatment_allowed_to=utf8_decode($importData[7]);
                        $keyword->diagnose_allowed_from=utf8_decode($importData[8]);
                        $keyword->diagnose_allowed_to=utf8_decode($importData[9]);
                        $keyword->treatment_decline_from=utf8_decode($importData[10]);
                        $keyword->treatment_decline_to=utf8_decode($importData[11]);
                        $keyword->diagnose_decline_from=utf8_decode($importData[12]);
                        $keyword->diagnose_decline_to=utf8_decode($importData[13]);

                        $keyword->category=utf8_decode($importData[14]);
                        $keyword->reason_e=utf8_decode($importData[15]);
                        $keyword->reason_s=utf8_decode($importData[16]);
                        $keyword->plan_info_e=utf8_decode($importData[17]);
                        $keyword->plan_info_s=utf8_decode($importData[18]);
                        $keyword->agent_compensation_e=utf8_decode($importData[19]);
                        $keyword->agent_compensation_s=utf8_decode($importData[20]);
                        $keyword->coverage_type=utf8_decode($importData[21]);
                        $keyword->save();
                    }




                }
            }
        }
    }

    public function home()
    {


      //  \App::setLocale('sp');

        return view('home');
    }

    public function lang($lang)
    {

  \Session::put('lang',$lang);
        \App::setLocale($lang);
return back();

    }

    public function promo(Request $request)
    {
    $code=$request->promo;
        $price=Setting::first();
    $coupan=Coupan::where('title',$code)->first();
    if($coupan)
    {
        if($coupan->date>=Carbon::now())
        {


            $cost=$price->p_cost;
            $cost=floatval($price->p_cost) - (floatval($price->p_cost) * (floatval($coupan->discount)/100));
            return response()->json(['success'=>true,'message'=>'Apply successfully','price'=>$cost]);

        }
        else{
            return response()->json(['success'=>false,'message'=>'The coupan has expired','price'=>$price->p_cost]);

        }

    }
    else{
        return response()->json(['success'=>false,'message'=>'Invalid coupan code','price'=>$price->p_cost]);
    }
    }
    public function buy_now()
    {
        $price=Setting::first();
   return view('Logged_pages.stripe',compact('price'));
    }
    public function buy_now_pay(Request $request)
    {
        $pricing=Setting::first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * $pricing->p_cost,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Insurance Payment"
        ]);


        $user=User::find(\Auth::user()->id);

        $user->register=$user->register+intval($pricing->p_days);
        $user->save();
        $subsription=new Subsription();
        $subsription->user_id=$user->id;
        $subsription->price=$pricing->p_cost;
        $subsription->save();


        return redirect('user/account')->with('success','Plan purchased successfully');

    }
   public function account()
   {

       $setting=Setting::first();

       return view('Logged_pages.profile',compact('setting'));
   }
   public function profile_update(Request $request)

   {
       $user=User::find(\Auth::user()->id);
       $user->name=$request->name;

       if ($request->password != null and $request->old_password) {

           $request->validate([

               'password' => ['required', 'confirmed'],


           ]);


           if (\Hash::check($request->old_password, $user->password)) {
               $user->fill([
                   'password' => Hash::make($request->password)
               ])->save();

           } else {


                   return back()->with('error', 'Password does not match');
           }

       }


       $user->update();

       return back()->with('success','Profile updated successfully');
   }
}
