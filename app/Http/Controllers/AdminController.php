<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
