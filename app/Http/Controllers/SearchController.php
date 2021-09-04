<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class SearchController extends Controller
{
    public function index(){
    	return view('majorproject.admin.search');
    }

    public function search(Request $request){
    	$search = $request->get('search');
    	// echo $search;
    	$found = DB::table('students')
    	         ->join('streams','students.student_stream','=','streams.id')
    	         ->where('student_name','like','%'.$search.'%')
    	         ->orWhere('roll_number','like','%'.$search.'%')
    	         ->orWhere('student_email','like','%'.$search.'%')
    	         ->orWhere('phone_number','like','%'.$search.'%')
    	         ->orWhere('semester','like','%'.$search.'%')
    	         ->select('students.*','streams.stream_name')
    	         ->get();

    	$found1 = DB::table('faculties')
    	         ->where('faculty_name','like','%'.$search.'%')
    	         ->orWhere('faculty_username','like','%'.$search.'%')
    	         ->select('faculties.*')
    	         ->get();

        $found2 = DB::table('streams')
                 ->where('stream_name','like','%'.$search.'%')
                 ->select('streams.stream_name')
                 ->get();            

        $found3 = DB::table('subjects')
                 ->join('streams','subjects.stream_id','=','streams.id')
                 ->where('subject_name','like','%'.$search.'%')
                 ->orWhere('subject_code','like','%'.$search.'%')
                 ->select('subjects.subject_name','subjects.semester','subjects.subject_code','streams.stream_name')
                 ->get();     

         $found4 = DB::table('chapters')
                 ->join('subjects','chapters.subject_id','=','subjects.id')
                 ->join('streams','subjects.stream_id','=','streams.id')
                 ->where('chapter_name','like','%'.$search.'%')
                 ->select('subjects.subject_name','subjects.semester','subjects.subject_code','chapters.chapter_name','streams.stream_name')
                 ->get();                  

         //  return view('majorproject.admin.searchresult',['found' => $found],['found1' => $found1] ,compact('search'));
      return view('majorproject.admin.searchresult',compact('found','found1','found2','found3','found4','search'));
    	         
    }
}
