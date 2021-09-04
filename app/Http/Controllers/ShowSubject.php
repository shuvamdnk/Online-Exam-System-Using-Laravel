<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Subject;
//use App\Stream;

use Auth;
class ShowSubject extends Controller
{
    // public function index(){
    // $subject = Subject::all();
   	// $data1 = array('subject' => $subject);
   	// $stream = Stream::all();
   	// $data = array('stream' => $stream);
    // return view('majorproject.faculty.viewsubjects',$data,$data1); 
    
    /*
    $subject = DB::table('subjects')->paginate(5);
    return view('majorproject.faculty.viewsubjects',['subject' => $subject])->with('i', (request()->input('page', 1) - 1) * 5);

    page link code :: {{ $subject->links() }}
    */
   // } 

  // @@@@@@@@ Using Join

    public function index(){
     $subject = DB::table('subjects')
                 ->join('streams','subjects.stream_id' , '=' ,'streams.id')
                 ->select('subjects.*','streams.stream_name')
                ->get();
  if (Auth::guard('faculty')->check()) {
    return view('majorproject.faculty.viewsubjects' , compact('subject'));
  }    return redirect()->route('login.all')->with('error','Permission denied !');
}


}