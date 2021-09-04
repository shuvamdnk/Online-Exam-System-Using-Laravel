<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Stream;
use App\Test;
use Auth;
class StudentController extends Controller
{
   /* public function index(){
   	$students = Student::all();
   	$data = array('student' => $students);
    return view('majorproject.admin.viewstudent',$data);
   }  */
   

   public function index(){
     $student = DB::table('students')
                 ->join('streams','students.student_stream','=','streams.id')
                 ->select('students.*','streams.stream_name')
                 ->get();
                 if (Auth::guard('admin')->check()) {
     return view('majorproject.admin.viewstudent', compact('student'));
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }


   public function insert(){
    $stream = Stream::all();
    $data = array('stream' => $stream);
     if (Auth::guard('admin')->check()) {
   	return view('majorproject.admin.addstudent',$data);
   } return redirect()->route('login.all')->with('error','Permission denied !');
   }

    public function create(Request $request){
   	$this->validate($request,[
        'student_name'  => 'required',
        'roll_number'  => 'required|unique:students',
        'student_email'  => 'required|unique:students|email',
        'phone_number'  => 'required|unique:students|max:10',
		    'password'  => 'required|min:8',
		    'student_stream'  => 'required',
	    	'semester'  => 'required',
	    	'session'  => 'required',
        'section'  => 'required',


   	],

    [
    'student_name.required' => 'Student name must not be empty!',
    // 'name.max' => 'The maximun length of The User name must not exceed :max',
     'student_email.required' => 'Email must not be empty!',
     'student_email.email' => 'Incorrect email address!',
     'student_email.unique' => 'The email has already been used',
     'roll_number.required' =>  'Enter your university roll number',
     'roll_number.unique'  => 'This roll number alresdy exists',
     'phone_number.required'  => 'Please give your phone number',
     'phone_number.unique'  => 'This number is already registered',
     'phone_number.max'  => 'Phone number must have 10 digits',
     'student_stream.required'   =>  'Choose your stream',
     'semester.required'  => 'Please select your current semester',
     'password.required'  => 'Create a password',
     'password.min' => 'Password must contain at least 8 characters',
    // 'password.confirmed' => 'Failed to confirm password'
   ]

   );



   	$student = new Student;
   	$student->student_name = $request->input('student_name');
   	$student->roll_number = $request->input('roll_number');
   	$student->student_email = $request->input('student_email');
   	$student->phone_number = $request->input('phone_number');
   	$student->password = bcrypt($request->input('password'));
   	$student->student_stream = $request->input('student_stream');
   	$student->semester = $request->input('semester');
   	$student->session = $request->input('session');
   	$student->section = $request->input('section');
   	$student->save();
   	return redirect()->route('student.view')->with('success','Data Inserted');
   }

   public function edit($id){
     if (Auth::guard('admin')->check()) {
    $student = Student::find($id);
    $stream = Stream::all();
   // $data = array('stream' => $stream);
    $find = DB::table('students')
            ->join('streams','students.student_stream','=','streams.id')
            ->select('streams.stream_name','streams.id') 
            ->where('streams.id', $student->student_stream)
            ->distinct()
            ->get();
     
    return view('majorproject.admin.editstudent',compact('find','stream'),['student' => $student]);

  } return redirect()->route('login.all')->with('error','Permission denied !');
   }   


   public function show($id){
      if (Auth::guard('admin')->check()) {
    $student = Student::find($id);
    $stream = Stream::all();
    $data = array('stream' => $stream);


   $result = DB::table('results')
              ->join('tests','results.test_id' ,'=', 'tests.id')
              ->join('streams','tests.stream_id','=','streams.id')
              ->join('subjects','tests.subject_id','=','subjects.id')
              ->join('students','results.student_id' ,'=', 'students.id')
              ->select('results.*','tests.*','streams.*','subjects.subject_name','subjects.subject_code','subjects.semester')
              ->where('results.student_id', $student->id)
              ->get(); 

     $find = DB::table('students')
            ->join('streams','students.student_stream','=','streams.id')
            ->select('streams.stream_name') 
            ->where('streams.id', $student->student_stream)
            ->distinct()
            ->get();         
   
    return view('majorproject.admin.showstudent',compact('result','find'),['student' => $student],$data );
     } return redirect()->route('login.all')->with('error','Permission denied !');
   }

   public function update($id ,Request $request){
    $this->validate($request,[
      'student_name'  => 'required',
       'roll_number'  => 'required',
        'student_email'  => 'required',
        'phone_number'  => 'required',
    'password'  => 'required',
    'student_stream'  => 'required',
    'semester'  => 'required',
    'session'  => 'required',
         'section'  => 'required',
    ]);

    $student = Student::find($id);
    $student->student_name = $request->input('student_name');
    $student->roll_number = $request->input('roll_number');
    $student->student_email = $request->input('student_email');
    $student->phone_number = $request->input('phone_number');
    $student->password = bcrypt($request->input('password'));
    $student->student_stream = $request->input('student_stream');
    $student->semester = $request->input('semester');
    $student->session = $request->input('session');
    $student->section = $request->input('section');
    $student->save();
    return redirect()->route('student.view')->with('success','Data Updated');
   }

   public function delete($id){
     $student = Student::find($id);
     $student->delete();
     return redirect()->route('student.view')->with('success','Data Deleted');
   }


   //@@@@@@@@@@@@@@@@@@@@2 STUDENT REGISTRATION FUNCTION @@@@@@@@@@@@@@@@@//
    public function register(Request $request){
    $this->validate($request,[
      'student_name'  => 'required',
       'roll_number'  => 'required',
        'student_email'  => 'required',
        'phone_number'  => 'required',
    'password'  => 'required',
    'student_stream'  => 'required',
    'semester'  => 'required',
    'session'  => 'required',
         'section'  => 'required',
    ]);
    $student = new Student;
    $student->student_name = $request->input('student_name');
    $student->roll_number = $request->input('roll_number');
    $student->student_email = $request->input('student_email');
    $student->phone_number = $request->input('phone_number');
    $student->password = bcrypt($request->input('password'));
    $student->student_stream = $request->input('student_stream');
    $student->semester = $request->input('semester');
    $student->session = $request->input('session');
    $student->section = $request->input('section');
    $student->save();
    return redirect()->route('login.all')->with('success','Registration Successfull');
   }

  //@@@@@@@@@@@@@@@@@@@@@ END STUDENT REGISTRATION FUNCTION @@@@@@@@@@@@@@@//

////#################### Student Login Check ####################////
    public function studentlogin(Request $request){
        $this->validate($request,[
          'roll_number'   =>  'required',
          'password'   =>  'required',
        ]);

     if (Auth::guard('student')->attempt(['roll_number' => $request->roll_number , 'password' => $request->password])) {
            return redirect()->route('student.test')->with('success','Login Successfull');
        }
          return redirect()->route('login.all')->with('error','Invalid Username and Password');
    }
////#################### End Student Login Check ##################////   

/////################## Student Logout #######################////
        public function student_logout()
        {
          Auth::guard('student')->logout();
          return redirect()->route('login.all')->with('success','You are Loggedout');
        }
 ////################## End Student Logout ##############/////   


/////################## Student test Page ########################/////
     public function student_test(){
      if (Auth::guard('student')->check()){

       $tests = DB::table('tests')
                 ->join('streams','tests.stream_id','=','streams.id')
                 ->join('subjects','tests.subject_id','=','subjects.id')
                 ->join('faculties','tests.faculty_id','=','faculties.id')
                 ->select('tests.No_of_q','tests.test_name','tests.test_date','tests.test_time','tests.test_status','subjects.subject_name','subjects.subject_code','streams.stream_name','subjects.semester','tests.id','tests.subject_id','tests.test_duration','tests.visibility')
                ->where('tests.stream_id',Auth::guard('student')->user()->student_stream)
                ->orderBy('tests.id', 'DESC')
                ->paginate(5);
      // if (Auth::guard('student')->check()){
      return view('majorproject.student.start-exam', compact('tests'));
    }return redirect()->route('error')->with('error','Permission denied !');
  }


   public function student_result(){
    if (Auth::guard('student')->check()){
     $result = DB::table('results')
                ->join('tests','results.test_id','=','tests.id')
                ->join('streams','tests.stream_id','=','streams.id')
                ->join('subjects','tests.subject_id','=','subjects.id')
                ->select('tests.test_name','tests.test_date','results.score','results.total_question','subjects.subject_name','subjects.subject_code','subjects.semester','streams.stream_name')
                ->where('results.student_id',Auth::guard('student')->user()->id)
                ->orderBy('results.id', 'DESC')
                ->paginate(10);
    
    return view('majorproject.student.result', compact('result'));
  }return redirect()->route('error')->with('error','Permission denied !');
  }


  public function student_profile(){
     if (Auth::guard('student')->check()){
     $stream = DB::table('streams')
                   ->select('stream_name')
                   ->where('id',Auth::guard('student')->user()->student_stream)
                   ->get(); 
    return view('majorproject.student.profile' ,compact('stream'));
  }return redirect()->route('error')->with('error','Permission denied !');
  }
/////################## End Student test Page ########################/////

/////###################### All User Loging Page  ######################////


   public function login(){
   $stream = Stream::all();
    $data = array('stream' => $stream);
    if (Auth::guard('faculty')->check()){
     return redirect()->route('faculty');
    }elseif(Auth::guard('admin')->check()){
      return redirect()->route('admin');
    }elseif(Auth::guard('student')->check()){
      return redirect()->route('student.test');
    }
    return view('majorproject.student.login',$data);
   }

   /////################## End All User Loging Page  ###################////
 
}
