<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use DB;
use Auth;
class QuestionController extends Controller
{
     public function index()
        {
            $streams = DB::table("streams")->pluck("stream_name","id");
            if (Auth::guard('faculty')->check()) {
            return view('majorproject.faculty.addquestion',compact('streams'));
             }    return redirect()->route('login.all')->with('error','Permission denied !');
        }

     public function getSubject(Request $request)
        {
            $subjects = DB::table("subjects")
            ->where("stream_id",$request->stream_id)
            ->pluck("subject_code","id");
            return response()->json($subjects);
        }

      public function getChapter(Request $request)
        {
            $chapters = DB::table("chapters")
            ->where("subject_id",$request->subject_id)
            ->pluck("chapter_name","id");
            return response()->json($chapters);
        }    


    public function create(Request $request){
        $this->validate($request,[
      'stream_id'  => 'required',
       'subject_id'  => 'required',
        'chapter_id'  => 'required',
        'question'   =>  'required',
        'option_a'  => 'required',
       'option_b'  => 'required',
        'option_c'  => 'required',
        'option_d'   =>  'required',
         'answer'   =>  'required',
    ]);
    $question = new Question;
    $question->stream_id = $request->input('stream_id');
    $question->subject_id = $request->input('subject_id');
    $question->chapter_id = $request->input('chapter_id');
    $question->question = $request->input('question');
    $question->option_a = $request->input('option_a');
    $question->option_b = $request->input('option_b');
    $question->option_c = $request->input('option_c');
    $question->option_d = $request->input('option_d');
    $question->answer = $request->input('answer');
    $question->save();
    return redirect()->route('question.index')->with('success','Question Added');
    }
 

    public function view_question(){
            $question = Question::all();
            $data = array('question' => $question);

              $questions = DB::table('questions')
                 ->join('streams','questions.stream_id','=','streams.id')
                 ->join('subjects','questions.subject_id','=','subjects.id')
                 ->join('chapters','questions.chapter_id','=','chapters.id')
                 ->select('subjects.*','streams.*','chapters.*','questions.*')
                 ->get();
                   if (Auth::guard('faculty')->check()) {
        return view('majorproject.faculty.viewquestion',  compact('questions'));
           }    return redirect()->route('login.all')->with('error','Permission denied !');
    }

    public function delete($id){
     $question = Question::find($id);
     $question->delete();
     if (Auth::guard('faculty')->check()) {
     return redirect()->route('question.view')->with('success','Data Deleted');
     }    return redirect()->route('login.all')->with('error','Permission denied !');
    }
}
