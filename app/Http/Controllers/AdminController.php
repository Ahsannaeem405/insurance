<?php

namespace App\Http\Controllers;

use App\Models\Coupan;
use App\Models\Setting;
use App\Models\Subsription;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

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
}
