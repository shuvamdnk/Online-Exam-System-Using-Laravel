<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Admin;
use Auth;
class ProfileController extends Controller
{
   public function index(){
   	return view('majorproject.admin.profile');
   }

   public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::guard('admin')->user();
        
      //  dd('/public/avatars/'.auth()->user()->avater);

        if(auth::guard('admin')->user()->avatar){
            Storage::delete('/avatars/'.auth::guard('admin')->user()->avatar);
        }

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','Profile picture updated.');

    }

     public function update_faculty_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::guard('faculty')->user();
        
      //  dd('/public/avatars/'.auth()->user()->avater);

        if(auth::guard('faculty')->user()->avatar){
            Storage::delete('/avatars/'.auth::guard('faculty')->user()->avatar);
        }

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','Profile picture updated.');

    }
}
