<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Chapter;
use App\Subject;
use Auth;
class ChapterController extends Controller
{
     /* public function index()
    {
    	$chapter = Chapter::all();
    	$data = array('chapter' => $chapter);
    	$subject = Subject::all();
    	$data1 = array('subject' => $subject);
    	return view('majorproject.faculty.addchapter',$data,$data1);
    }  */

    public function index(){
        $chapter = DB::table('chapters')
                   ->join('subjects','chapters.subject_id','=','subjects.id')
                   ->select('chapters.chapter_name','subjects.subject_name','subjects.subject_code','chapters.id')
                   ->get();
        $subject = Subject::all();
        $data1 = array('subject' => $subject);
        if (Auth::guard('faculty')->check()) {
        return view('majorproject.faculty.addchapter' , compact('chapter') ,$data1);
        }    return redirect()->route('login.all')->with('error','Permission denied !');
    }


    public function create(Request $request)
    {
    	$this->validate($request,[
           'subject_id'    => 'required',
           'chapter_name'    => 'required'
    	]);

    	$chapter = new Chapter;
    	$chapter->subject_id = $request->get('subject_id');
        $chapter->chapter_name = $request->get('chapter_name');
        $chapter->save();
        return redirect()->route('chapter.index')->with('success','Chapter Added Successfully');
    }

    public function delete($id){
        $chapter = Chapter::find($id);
        $chapter->delete();
        return redirect()->route('chapter.index')->with('success','Chapter Deleted Successfully');

    }
  
}

