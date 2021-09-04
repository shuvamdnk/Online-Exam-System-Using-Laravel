<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Subject;
use App\Stream;
use Auth;
class SubjectController extends Controller
{
    // public function index(){
    // $subject = Subject::all();
   	// $data1 = array('subject' => $subject);
   	// $stream = Stream::all();
   	// $data = array('stream' => $stream);
    // return view('majorproject.admin.addsubject',$data1,$data);
    // }

  public function index(){
     $subject = DB::table('subjects')
                 ->join('streams','subjects.stream_id' , '=' ,'streams.id')
                 ->select('subjects.*','streams.stream_name')
                ->get();
      $stream = Stream::all();
      $data = array('stream' => $stream);
       if (Auth::guard('admin')->check()) {
      return view('majorproject.admin.addsubject' , compact('subject') ,$data);  
       } return redirect()->route('login.all')->with('error','Permission denied !');        
    }


    public function create(Request $request){
      	$this->validate($request,[
      'stream_id'  => 'required',
       'semester'  => 'required',
        'subject_name'  => 'required',
        'subject_code'   =>  'required'
   	]);
   	$subject = new Subject;
   	$subject->stream_id = $request->input('stream_id');
   	$subject->semester = $request->input('semester');
   	$subject->subject_name = $request->input('subject_name');
   	$subject->subject_code = $request->input('subject_code');
   	$subject->save();
   	return redirect()->route('subject.view')->with('success','Data Inserted');
    }


    public function delete($id){
    	$subject = Subject::find($id);
    	$subject->delete();
    	return redirect()->route('subject.view')->with('success','Data Deleted');
    }
}
