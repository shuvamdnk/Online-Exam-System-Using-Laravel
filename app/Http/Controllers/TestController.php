<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Result;
use DB;
use Auth;
class TestController extends Controller
{
       public function index()
        {
            $streams = DB::table("streams")->pluck("stream_name","id");
            if (Auth::guard('faculty')->check()) {
            return view('majorproject.faculty.test',compact('streams'));
            }    return redirect()->route('login.all')->with('error','Permission denied !');
        }

        public function getSubject(Request $request)
        {
            $subjects = DB::table("subjects")
            ->where("stream_id",$request->stream_id)
            ->pluck("subject_code","id");
            return response()->json($subjects);
        }


 public function insert(Request $request){
     if (Auth::guard('faculty')->check()) {
             $this->validate($request,[
             	'test_name' => 'required',
                'stream_id' => 'required',
                'subject_id' => 'required',
                'No_of_q' => 'required',
                'right_a' => 'required',
                'wrong_a' => 'required',
                'test_date' => 'required',
                'test_time' => 'required',
                'test_status' => 'required',
                'test_duration' => 'required',
            
            ]);
    $test = new Test;
    $test->faculty_id = $request->input('faculty_id');
    $test->test_name = $request->input('test_name');
    $test->stream_id = $request->input('stream_id');
    $test->subject_id = $request->input('subject_id');
    $test->No_of_q = $request->input('No_of_q');
    $test->right_a = $request->input('right_a');
    $test->wrong_a = $request->input('wrong_a');
    $test->total_marks = $request->input('total_marks');
    $test->test_date = $request->input('test_date');
    $test->test_time = $request->input('test_time');
    $test->test_status = $request->input('test_status');
    $test->test_create_date = $request->input('test_create_date');
    $test->test_duration = $request->input('test_duration');
    $test->save();
    
    return redirect()->route('test.view')->with('success','Test Created');
     }    return redirect()->route('login.all')->with('error','Permission denied !');
    }


    public function view(){
         if (Auth::guard('faculty')->check()) {
    	 $tests = DB::table('tests')
                 ->join('streams','tests.stream_id','=','streams.id')
                 ->join('subjects','tests.subject_id','=','subjects.id')
                 ->join('faculties','tests.faculty_id','=','faculties.id')
                 ->where('tests.faculty_id' , Auth::guard('faculty')->user()->id)
                 ->select('tests.id','tests.No_of_q','tests.right_a','tests.wrong_a','tests.total_marks','tests.test_date','tests.test_time','tests.test_status','tests.test_duration','tests.test_name','subjects.subject_name','subjects.subject_code','subjects.semester','streams.stream_name','faculties.faculty_name')           
                 ->get();
                 
    	return view('majorproject.faculty.testview' , compact('tests'));
        }    return redirect()->route('login.all')->with('error','Permission denied !');
    }


     public function edit_test($id){
     $test = Test::find($id);
     return view('majorproject.faculty.edittest',['test' => $test]);
    }

    public function update_test($id,Request $request){
             $this->validate($request,[
                'test_name' => 'required',
            
            ]);
    $test = Test::find($id);
    $test->faculty_id = $request->input('faculty_id');
    $test->test_name = $request->input('test_name');
    $test->stream_id = $request->input('stream_id');
    $test->subject_id = $request->input('subject_id');
    $test->No_of_q = $request->input('No_of_q');
    $test->right_a = $request->input('right_a');
    $test->wrong_a = $request->input('wrong_a');
    $test->total_marks = $request->input('total_marks');
    $test->test_date = $request->input('test_date');
    $test->test_time = $request->input('test_time');
    $test->test_status = $request->input('test_status');
    $test->test_create_date = $request->input('test_create_date');
    $test->test_duration = $request->input('test_duration');
    $test->save();
    return redirect()->route('test.view')->with('success','Test Updates');
    }


     public function delete_test($id){
     $test = Test::find($id);
     $test->delete();
     return redirect()->route('test.view')->with('success','Data Deleted');
    }

    public function test_results($id){
        $test = Test::find($id);
        $results = DB::table('tests')
                   ->join('results','tests.id','=','results.test_id')
                   ->join('students','results.student_id','=','students.id')
                  ->select('students.student_name','tests.id','results.score','results.total_question','tests.test_date','students.roll_number')
               // ->select('tests.*')
                ->where('tests.id', $test->id)
                ->get();
         $test_name = DB::table('tests')
                      ->select('test_name')
                      ->where('id',$test->id)
                      ->get();       

     return view('majorproject.faculty.result' , compact('results','test_name'));   
    }

///Student Panel Code ////

    public function fetch_question($id){
         $test = Test::find($id);
         $status = DB::table('results')
                   ->select('test_id')
                   ->where('results.student_id',Auth::guard('student')->user()->id)
                   ->get();    
       //   echo $status;         
         $check = DB::table('tests')
                      ->join('subjects','tests.subject_id','=','subjects.id')
                      ->select('subjects.semester')
                      ->where('tests.id',$test->id)
                      ->get();

             //echo $chech;
           foreach($check as $ch){
                if($ch->semester != Auth::guard('student')->user()->semester){
                     return redirect()->route('student.test')->with('check','You are not in '.$ch->semester.' semester');
                }
             } 
                               

         $fetch = DB::table('questions')
                ->select('question','option_a','option_b','option_c','option_d','answer')
                ->where('subject_id', $test->subject_id)   
                ->inRandomOrder()
                ->limit($test->No_of_q)
                ->get();

        // echo $fetch;

       foreach($status as $s){
                if($test->id == $s->test_id){
                    return redirect()->route('student.test')->with('complete','You already given this exam');
                }
        }
         return view('majorproject.student.exam2' , compact('fetch' , 'status'), ['test' => $test])->with('no', 1);    
    }



   public function over(Request $request){
    $result = new Result;
    $result->student_id = $request->input('student_id');
    $result->test_id = $request->input('test_id');
    $result->score = $request->input('score');
    $result->total_question = $request->input('total_question');
    $result->exam_status = $request->input('exam_status');
    $result->save();
    return redirect()->route('student.test')->with('success','Test Completed');
   } 
}
