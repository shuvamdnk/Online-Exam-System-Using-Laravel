<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stream;
use Auth;
class StreamController extends Controller
{
    public function index(){
   	$stream = Stream::all();
   	$data = array('stream' => $stream);
     if (Auth::guard('admin')->check()) {
    return view('majorproject.admin.addstream',$data);
  } return redirect()->route('login.all')->with('error','Permission denied !');
   }

    public function create(Request $request){
   	$this->validate($request,[
      'stream_name'  => 'required'
   	]);
   	$stream = new Stream;
   	$stream->stream_name = $request->input('stream_name');
   	$stream->save();
   	return redirect()->route('A_addstream')->with('success','Data Inserted');
   }

   public function edit($id){
    if (Auth::guard('admin')->check()) {
     
    }return redirect()->route('login.all')->with('error','Permission denied !');
   }

   public function update($id ,Request $request){
    if (Auth::guard('admin')->check()) {
     
    }return redirect()->route('login.all')->with('error','Permission denied !');
   }

   public function delete($id){
   	$stream = Stream::find($id);
   	$stream->delete();
   	return redirect()->route('A_addstream')->with('success','Data Deleted');
   }
}
 