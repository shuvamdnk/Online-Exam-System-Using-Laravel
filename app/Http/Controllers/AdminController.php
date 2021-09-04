<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Auth;
use App\Student;
use App\Faculty;
use App\Stream;
use App\Subject;
class AdminController extends Controller
{
    public function home(){
       $student = Student::all();
      //  $faculty = Faculty::all();
      //  $stream = Stream::all();
      //  $subject = Subject::all();
        if (Auth::guard('admin')->check()) {
         return view('majorproject.admin.index' , compact('student'));
         }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }



    

    public function useless(){
        $student = Student::all();
        $faculty = Faculty::all();
        $stream = Stream::all();
        $subject = Subject::all();
        if (Auth::guard('admin')->check()) {
         return view('majorproject.admin.useless', compact('student','faculty','stream','subject'));
    }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }




    public function index(){
        $admin = Admin::all();
        $data=array('admin' => $admin);
          if (Auth::guard('admin')->check()) {
    	return view('majorproject.admin.register',$data);
         }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }

    public function create(Request $request){
    	$this->validate($request,[
          'username'   =>  'required',
          'password'   =>  'required',
    	]);

    	$admin = new Admin;
    	$admin->username = $request->get('username');
    	$admin->password = bcrypt($request->get('password'));
    	$admin->save();
    	return redirect()->route('admin.register')->with('success','Registration Successfull');
    }

    public function register(Request $request){
      $this->validate($request,[
          'username'   =>  'required',
          'password'   =>  'required',
      ]);

      $admin = new Admin;
      $admin->username = $request->get('username');
      $admin->password = bcrypt($request->get('password'));
      $admin->save();
      return redirect()->route('login.all')->with('success','Registration Successfull');
    }

    public function edit($id){
      if (Auth::guard('admin')->check()) {

        $admin = Admin::find($id);

        if ($admin->id != Auth::guard('admin')->user()->id) {
          return redirect()->route('admin.register')->with('deniad','You Have No Privileges To Edit ['.$admin->username.']  Account !!');
        }

        return view('majorproject.admin.editadmin',compact('admin'));
      }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }


    public function update($id , Request $request){
        $this->validate($request,[
          'username'   =>  'required',
          'password'   =>  'required',
        ]);

        $admin = Admin::find($id);
        $admin->username = $request->get('username');
        $admin->password = bcrypt($request->get('password'));
        $admin->save();
        return redirect()->route('admin.register')->with('success','Update Successfull');
    }


    public function delete($id){
       if (Auth::guard('admin')->check()) {
        $admin = Admin::find($id);
        if ($admin->id != Auth::guard('admin')->user()->id) {
          return redirect()->route('admin.register')->with('deniad','You Have No Privileges To Delete ['.$admin->username.']  Account !!');
        }

        if (Admin::count() == 1) {
          return redirect()->route('admin.register')->with('warning','Delete Not Possible !');
        }

        $admin->delete();
        return redirect()->route('admin.register')->with('success','Delete Successfull');
      }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }



    //############## Admin Login System ###############//
 
    public function login(Request $request){
        $this->validate($request,[
          'username'   =>  'required',
          'password'   =>  'required',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username , 'password' => $request->password])) {
          $user = Auth::guard('admin')->user()->username;
            return redirect()->route('admin')->with('successlog','Welcome '.$user.' ');
        }
          return redirect()->route('login.all')->with('error','Invalid Username and Password');
    }

        public function logout()
        {
          Auth::guard('admin')->logout();
          return redirect()->route('login.all')->with('success','You are Loggedout');
        }
}
