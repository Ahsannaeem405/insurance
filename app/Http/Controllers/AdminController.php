<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\condition;
use App\Models\conditionQuestion;
use App\Models\Coupan;
use App\Models\femaleNotSmokerGuaranteed;
use App\Models\femaleNotSmokerLevel;
use App\Models\femaleNotSmokerModified;
use App\Models\femaleSmokerGuaranteed;
use App\Models\femaleSmokerLevel;
use App\Models\femaleSmokerModified;
use App\Models\maleNotSmokerGuaranteed;
use App\Models\maleNotSmokerLevel;
use App\Models\maleNotSmokerModified;
use App\Models\maleSmokerGuaranteed;
use App\Models\maleSmokerLevel;
use App\Models\maleSmokerModified;
use App\Models\Medication;
use App\Models\Setting;
use App\Models\Subsription;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function  __construct()
    {
        $user_all=User::where('role','user')->count();
        $monthy_sub=Subsription::whereMonth('created_at', date('m'))->count();
        $revenu_total=Subsription::whereMonth('created_at', date('m'))->sum('price');
        $sub_total=User::where('role','user')->where('status',1)->count();

        \View::share(compact('user_all','revenu_total','monthy_sub','sub_total'));
    }

    public function dashboard()
    {

        $user=User::where('role','user')->orderby('id','desc')->limit(6)->get();

        return view('Admin_asstes.index',compact('user'));
    }
   public function user()
   {
       $user=User::where('role','user')->get();

       return view('Admin_asstes.viewuser',compact('user'));
   }


   public function user_del($id)
   {
       $user=User::find($id)->delete();
       return back()->with('success','User deleted successfully');
   }

   public function user_edit($id)
   {
       $user=User::find($id);
       return view('Admin_asstes.edituser',compact('user'));


   }

   public function user_update(Request $request,$id)
   {

       $user=User::find($id);
       $user->name=$request->name;
       $user->number=$request->number;
       $user->email=$request->email;
       $user->about=$request->about;
       if($request->password!=null)
       {
           $user->password=\Hash::make($request->password);

       }

       if ($request->hasfile('profile')) {

           $file = $request->file('profile');
           $extension = $file->getClientOriginalExtension(); // getting image extension
           $filename = time() . '.' . $extension;
           $file->move('upload/images/', $filename);

           $user->profile = $filename;

       }

       $user->update();


       return back()->with('success',$user->name .' profile updated successfully!');
   }


   public function subscriptions()
   {
       $subsription=Subsription::orderBy('id','desc')->get();

       return view('Admin_asstes.subscriptions',compact('subsription'));
     //  $subscriptions
   }

   public function setting()
   {
       $setting=Setting::first();

       return view('Admin_asstes.setting',compact('setting'));
   }

   public function coupon()
   {
       $coupan=Coupan::all();

       return view('Admin_asstes.coupon.index',compact('coupan'));
   }

   public function coupon_add(Request $request)
   {

       $coupan=new Coupan();
       $coupan->title=$request->title;
       $coupan->date=$request->date;
       $coupan->discount=$request->discount;
       $coupan->save();

       return back()->with('success','Coupan add successfully');
   }

   public function coupon_del($id)
   {
       $coupan=Coupan::find($id)->delete();

       return back()->with('success','Coupan deleted successfully');
   }

   public function coupon_edit($id,Request $request)
   {
       $coupan=Coupan::find($id);
       $coupan->title=$request->title;
       $coupan->date=$request->date;
       $coupan->discount=$request->discount;
       $coupan->update();

       return back()->with('success','Coupan updated successfully');
   }
   public function update_setting(Request $request)
   {

       $setting=Setting::first();

       $setting->p_name=$request->p_name;
       $setting->p_cost=$request->p_cost;
       $setting->p_days=$request->p_days;

       $setting->update();

       return back()->with('success','Package updated successfully');

   }

   public function profile()
   {
       $user=User::find(\Auth::user()->id);
       return view('Admin_asstes.profile',compact('user'));
   }



    public function profile_update(Request $request)
    {

        $user=User::find(\Auth::user()->id);
        $user->name=$request->name;
        $user->number=$request->number;
        $user->email=$request->email;

        if($request->password!=null)
        {
            $user->password=\Hash::make($request->password);

        }

        if ($request->hasfile('profile')) {

            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('upload/images/', $filename);

            $user->profile = $filename;

        }

        $user->update();

        return back()->with('success','profile updated successfully');
    }

    public function admin_upload()
    {
 return view('Admin_asstes.upload.index');
    }

    public function upload_data(Request $request)
    {

        //companies
        if ($request->hasFile('companies')) {
            $file = $request->file('companies');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = companies::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);


                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new companies();
                            $keyword->name = utf8_decode($importData[0]);
                            $keyword->tagline = utf8_decode($importData[1]);
                            $keyword->save();

                        }
                    }


                }
            }
        }

        //condition
        if ($request->hasFile('conditions')) {
            $file = $request->file('conditions');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = condition::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);


                        if ($i != 0) {


                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);

//dd(($importData_arr[2][10]));
                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new condition();
                            $keyword->condition_e = utf8_decode($importData[0]);
                            $keyword->condition_id = intval($importData[1]);
                            $keyword->condition_s = utf8_decode(($importData[2]));
                            $keyword->company = utf8_decode(($importData[3]));
                            $keyword->tagline = utf8_decode(($importData[4]));
                            $keyword->allowed = utf8_decode(($importData[5]));
                            $keyword->decline = utf8_decode(($importData[6]));


                            if (utf8_decode($importData[7]) == "") {
                                $keyword->treatment_allowed_from = 0;

                            } else {
                                $keyword->treatment_allowed_from = utf8_decode(intval($importData[7]));

                            }


                            if (utf8_decode($importData[8]) == "") {
                                $keyword->treatment_allowed_to = 1000;

                            } else {
                                $keyword->treatment_allowed_to = utf8_decode(intval($importData[8]));

                            }

                            if (utf8_decode($importData[9]) == "") {
                                $keyword->diagnose_allowed_from = 0;

                            } else {
                                $keyword->diagnose_allowed_from = utf8_decode(intval($importData[9]));

                            }


                            if (utf8_decode($importData[10]) == "") {
                                $keyword->diagnose_allowed_to = 1000;

                            } else {
                                $keyword->diagnose_allowed_to = utf8_decode(intval($importData[10]));

                            }

                            //dec


                            if (utf8_decode($importData[11]) == "") {
                                $keyword->treatment_decline_from = 1500;

                            } else {
                                $keyword->treatment_decline_from = utf8_decode(intval($importData[11]));

                            }


                            if (utf8_decode($importData[12]) == "") {
                                $keyword->treatment_decline_to = 2000;

                            } else {
                                $keyword->treatment_decline_to = utf8_decode(intval($importData[12]));

                            }


                            if (utf8_decode($importData[13]) == "") {
                                $keyword->diagnose_decline_from = 1500;

                            } else {
                                $keyword->diagnose_decline_from = utf8_decode(intval($importData[13]));

                            }



                            if (utf8_decode($importData[14]) == "") {
                                $keyword->diagnose_decline_to = 2000;

                            } else {
                                $keyword->diagnose_decline_to = utf8_decode(intval($importData[14]));

                            }





                            $keyword->category = utf8_decode(($importData[15]));
                            $keyword->reason_e = utf8_decode(($importData[16]));
                            $keyword->reason_s = utf8_decode(($importData[17]));
                            $keyword->plan_info_e = utf8_decode(($importData[18]));
                            $keyword->plan_info_s = utf8_decode(($importData[19]));
                            $keyword->agent_compensation_e = utf8_decode(($importData[20]));
                            $keyword->agent_compensation_s = utf8_decode(($importData[21]));
                            $keyword->coverage_type = utf8_decode(($importData[22]));
                            $keyword->message = utf8_decode(($importData[23]));

                            $keyword->save();

                        }
                    }


                }
            }
        }

        //condition questions
        if ($request->hasFile('conditions_questions')) {
            $file = $request->file('conditions_questions');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = conditionQuestion::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);


                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new conditionQuestion();
                            $keyword->condition_id = intval(utf8_decode($importData[0]));
                            $keyword->condition = utf8_decode($importData[1]);
                            $keyword->question = utf8_decode($importData[2]);
                            $keyword->question_id = intval(utf8_decode($importData[3]));
                            $keyword->type_id = intval(utf8_decode($importData[4]));
                            $keyword->if_yes = intval(utf8_decode($importData[5]));
                            $keyword->if_no = intval(utf8_decode($importData[6]));
                            $keyword->save();

                        }
                    }


                }
            }
        }

        //Medications
        if ($request->hasFile('medications')) {
            $file = $request->file('medications');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = Medication::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new Medication();
                            $keyword->medication_e = utf8_decode($importData[0]);
                            $keyword->condition_e = utf8_decode($importData[1]);
                            $keyword->condition_id = intval(utf8_decode($importData[2]));
                            $keyword->medication_s = utf8_decode($importData[3]);
                            $keyword->condition_s = utf8_decode($importData[4]);

                            $keyword->save();

                        }
                    }


                }
            }
        }

        //Male smoker level
        if ($request->hasFile('male_smoker_level')) {
            $file = $request->file('male_smoker_level');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleSmokerLevel::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleSmokerLevel();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //male not smoker level
        if ($request->hasFile('male_not_smoker_level')) {
            $file = $request->file('male_smoker_level');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleNotSmokerLevel::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleNotSmokerLevel();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //female  smoker level
        if ($request->hasFile('female_smoker_level')) {
            $file = $request->file('female_smoker_level');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleSmokerLevel::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleSmokerLevel();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
       //female not smoker level
        if ($request->hasFile('female_not_smoker_level')) {
            $file = $request->file('female_not_smoker_level');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleNotSmokerLevel::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleNotSmokerLevel();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }




        //Male smoker Graded
        if ($request->hasFile('male_smoker_graded')) {
            $file = $request->file('male_smoker_graded');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleSmokerModified::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleSmokerModified();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //male not smoker Graded
        if ($request->hasFile('male_not_smoker_graded')) {
            $file = $request->file('male_not_smoker_graded');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleNotSmokerModified::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleNotSmokerModified();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //female  smoker Graded
        if ($request->hasFile('female_smoker_graded')) {
            $file = $request->file('female_smoker_graded');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleSmokerModified::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleSmokerModified();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //female not smoker Graded
        if ($request->hasFile('female_not_smoker_graded')) {
            $file = $request->file('female_not_smoker_graded');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleNotSmokerModified::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleNotSmokerModified();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }




        //Male smoker Guaranteed
        if ($request->hasFile('male_smoker_guaranted')) {
            $file = $request->file('male_smoker_guaranted');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleSmokerGuaranteed::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleSmokerGuaranteed();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //male not smoker Guaranteed
        if ($request->hasFile('male_not_smoker_guaranted')) {
            $file = $request->file('male_not_smoker_guaranted');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = maleNotSmokerGuaranteed::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new maleNotSmokerGuaranteed();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //female  smoker Guaranteed
        if ($request->hasFile('female_smoker_guaranted')) {
            $file = $request->file('female_smoker_guaranted');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleSmokerGuaranteed::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleSmokerGuaranteed();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }
        //female not smoker Guaranteed
        if ($request->hasFile('female_not_smoker_guaranted')) {
            $file = $request->file('female_not_smoker_guaranted');

            // File Details
            $filename = $file->getClientOriginalName() . time();
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
                    $key_word = femaleNotSmokerGuaranteed::truncate();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        if ($i != 0) {

                            for ($c = 0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata [$c];

                            }
                        }

                        $i++;


                    }
                    fclose($file);


                    foreach ($importData_arr as $importData) {

                        if ($importData[0] != "") {
                            $keyword = new femaleNotSmokerGuaranteed();
                            $keyword->Age = intval(utf8_decode($importData[0]));
                            $keyword->Amount = intval( utf8_decode($importData[1]));
                            $keyword->price = utf8_decode($importData[2]);
                            $keyword->Company = utf8_decode($importData[3]);
                            $keyword->Tagline = utf8_decode($importData[4]);
                            $keyword->company_id = intval(utf8_decode($importData[5]));

                            $keyword->save();

                        }
                    }


                }
            }
        }


        return back()->with('success','Data updated successfully');

         }
}
