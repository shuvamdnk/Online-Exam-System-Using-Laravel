<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Stream;
use App\Test;
class ResultController extends Controller
{
    public function index(){
         if (Auth::guard('admin')->check()) {
    	 $stream = Stream::all();
         $data = array('stream' => $stream);

         $session = DB::table('students')
                        ->select('students.session')
                        ->orderBy('students.session', 'asc')
                        ->distinct()
                        ->get();

    	return view('majorproject.admin.result', compact('session'), $data);
        } return redirect()->route('login.all')->with('error','Permission denied !');   
    }
    
    public function data(Request $request){
         if (Auth::guard('admin')->check()) {
        $stream = $request->get('stream');
        $semester = $request->get('semester');
        $session = $request->get('session');

        $strm = DB::table('streams')
                    ->select('stream_name')
                    ->where('id',$stream)
                    ->get();

        $fetch = DB::table('tests')
                     ->join('results' , 'tests.id' ,'=','results.test_id')
                     ->join('students' , 'results.student_id' ,'=','students.id')
                     ->join('subjects' , 'tests.subject_id' ,'=','subjects.id')
                     ->join('streams' , 'tests.stream_id' ,'=','streams.id')
                     ->where('tests.stream_id',$stream)
                     ->where('subjects.semester',$semester)
                     ->where('students.session',$session)
                     ->select('students.student_name','students.roll_number','students.session','students.roll_number','tests.stream_id','tests.subject_id','tests.test_name','subjects.semester','subjects.subject_name','subjects.subject_code','results.score','results.total_question','tests.test_date','streams.stream_name')
                     ->get();

        return view('majorproject.admin.resultView' , compact('fetch','strm','semester','session'));
          } return redirect()->route('login.all')->with('error','Permission denied !');   
    }


    public function view_test($id){
          $test = Stream::find($id);
          $stream = DB::table('streams')
                        ->select('stream_name')
                        ->where('id',$test->id)
                        ->get();
          $find = DB::table('tests')
                      ->join('faculties','tests.faculty_id','=','faculties.id')
                      ->select('tests.*','faculty_name')
                      ->where('tests.stream_id',$test->id)
                      ->orderBy('tests.test_create_date','desc')
                      ->get();
         return view('majorproject.admin.viewtest',compact('find','stream'));
    }

    public function edit_test($id){
    $test = Test::find($id);
     if (Auth::guard('admin')->check()) {
    return view('majorproject.admin.edittest',['test' => $test]);
   }return redirect()->route('login.all')->with('error','Permission denied !');
   }

   public function update_test($id,Request $request){
    $this->validate($request,[
      'visibility'  => 'required',
    ]);
    $test = Test::find($id);
    $test->visibility = $request->input('visibility');
    $test->save();
    return redirect()->route('result.view')->with('success','Test Updated');
   }
    
}
