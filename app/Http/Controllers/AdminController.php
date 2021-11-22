<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('Admin_asstes.index');
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

       return view('Admin_asstes.subscriptions');
     //  $subscriptions
   }

   public function setting()
   {
       return view('Admin_asstes.setting');
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
