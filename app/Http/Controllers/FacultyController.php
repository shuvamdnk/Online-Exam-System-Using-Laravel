<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Faculty;
use DB;
class FacultyController extends Controller
{
  /////################3 CRUD Operation ####################/////

   public function index(){
   	$faculty = Faculty::all();
   	$data = array('fac' => $faculty);
    if (Auth::guard('admin')->check()) {
    return view('majorproject.admin.viewfaculty',$data);
  }
  return redirect()->route('login.all')->with('error','Permission denied !');
    // $faculty = DB::table('faculties')->paginate(5);
    // return view('majorproject.admin.viewfaculty',['fac' => $faculty])->with('i', (request()->input('page', 1) - 1) * 5);
   }



   public function insert(){
    if (Auth::guard('admin')->check()) {
   	return view('majorproject.admin.addfaculty');
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }



   public function create(Request $request){
   	$this->validate($request,[
      'faculty_name'  => 'required',
       'faculty_username'  => 'required',
        'password'  => 'required',
   	]);
   	$faculty = new Faculty;
   	$faculty->faculty_name = $request->input('faculty_name');
   	$faculty->faculty_username = $request->input('faculty_username');
   	$faculty->password = bcrypt($request->input('password'));
   	$faculty->save();
   	return redirect()->route('A_viewfaculty')->with('success','Data Inserted');
   }



   public function edit($id){
   	$faculty = Faculty::find($id);
     if (Auth::guard('admin')->check()) {
   	return view('majorproject.admin.editfaculty',['faculty' => $faculty]);
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }


    public function show($id){
    $faculty = Faculty::find($id);
     if (Auth::guard('admin')->check()) {
    return view('majorproject.admin.showfaculty',['faculty' => $faculty]);
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }



   public function update($id,Request $request){
   	$this->validate($request,[
      'faculty_name'  => 'required',
       'faculty_username'  => 'required',
        'password'  => 'required',
   	]);
   	$faculty = Faculty::find($id);
   	$faculty->faculty_name = $request->input('faculty_name');
   	$faculty->faculty_username = $request->input('faculty_username');
   	$faculty->password = bcrypt($request->input('password'));
   	$faculty->save();
   	return redirect()->route('A_viewfaculty')->with('success','Data Updates');
   }



   public function delete($id){
     if (Auth::guard('admin')->check()) {
   	$faculty = Faculty::find($id);
   	$faculty->delete();
   	return redirect()->route('A_viewfaculty')->with('success','Data Deleted');
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }

  


/////#################### Authintication Faculty ###################////
    public function facultyprofile(){
     if (Auth::guard('faculty')->check()) {
     return view('majorproject.faculty.profile');
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }

   public function home(){
     if (Auth::guard('faculty')->check()) {
     return view('majorproject.faculty.index');
   }
   return redirect()->route('login.all')->with('error','Permission denied !');
   }


   public function login(Request $request){
        $this->validate($request,[
          'faculty_username'   =>  'required',
          'password'   =>  'required',
        ]);

        if (Auth::guard('faculty')->attempt(['faculty_username' => $request->faculty_username , 'password' => $request->password])) {

          $fuser = Auth::guard('faculty')->user()->faculty_name;
            return redirect()->route('faculty')->with('success','Welcome '.$fuser.' ');
        }
          return redirect()->route('login.all')->with('error','Invalid Username and Password');
    }

       public function logout()
        {
          Auth::guard('faculty')->logout();
          return redirect()->route('login.all')->with('success','You are Loggedout');
        }

}

