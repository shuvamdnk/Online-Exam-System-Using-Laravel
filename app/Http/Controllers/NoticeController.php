<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Notice;
use Auth;
use DB;
class NoticeController extends Controller
{
    public function index(){
         if (Auth::guard('admin')->check()) {
    	//$notice = Notice::all()
        $notice = DB::table('notices')
                  ->select('notices.*')
                  ->orderBy('created_at', 'desc')
                  ->get();
    	return view('majorproject.admin.addnotice' ,compact('notice'));
        }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }

    public function create(Request $request)
    {
     //      if (Auth::guard('admin')->check()) {
     //    $request->validate([
     //        'file' => 'required|mimes:pdf,pptx,txt,docx,png,xlsx,jpg,jpeg,xlx,csv,mp4,mp3|max:2048',
     //        'title' => 'required'
     //    ]);
  
     //    $fileName = time().'.'.$request->file->extension();  
   
     //    $request->file->move(public_path('uploads'), $fileName);

     //    $form_data = array(
     //    	'title'      => $request->title,
     //        'file'            =>   $fileName,
     //    );  

     //    Notice::create($form_data);
     //    return back()
     //        ->with('success','You have successfully upload file.');
     // }
     //   return redirect()->route('login.all')->with('error','Permission denied !');

      $request->validate([
            // 'file' => 'required|mimes:pdf,pptx,txt,docx,png,xlsx,jpg,jpeg,xlx,csv,mp4,mp3|max:2048',
            'title' => 'required'
        ]);

      if ($request->hasFile('file')) {
        # code...
        foreach ($request->file as $file) {
          # code...
          $filename = $file->getClientOriginalName();
          $file->storeAs('public/uploads',$filename);

           $notice = new Notice;
           $notice->title = $request->get('title');
           $notice->file = $filename;
           $notice->save();
        }
           return back()
            ->with('success','You have successfully upload files.');
      }
    }

    public function delete($id){
         if (Auth::guard('admin')->check()) {
     	$notice = Notice::find($id);
       $image_path = public_path("storage/public/uploads/".$notice->file);

      if (File::exists($image_path)) {
        //File::delete($image_path);
         unlink($image_path);
      }
    	$notice->delete();
    	return redirect()->route('notice.view')->with('success','Notice Deleted');
         }
       return redirect()->route('login.all')->with('error','Permission denied !');
    }
}
