<?php
namespace social\Http\Controllers;
use social\Models\User;
use social\Models\Notes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
class NotesController extends Controller{




    public function index(){
        $notes = DB::table('notes')->where('type','slides')->orWhere('type','notes')->get();
        $textbooks  = DB::table('notes')->where('type','Text-books')->get();
            return view('dsa.academic')->with('notes',$notes)->with('textbooks',$textbooks);
    }

    public function postNotes(Request $request){

        $this->validate($request,[
            'course_unit'=>'|max:1000'
        ]);

            if($request->hasFile('file')){

                    $fileNameWithExt = $request->file('file')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                    $path = $request->file('file')->storeAs('public/notes',$fileNameToStore);



            }
            else{
                $fileNameToStore = '';
            }



    Auth::user()->notes()->create([
        'type'=>$request->input('type'),
        'user_id'=>Auth::user()->id,
        'course_unit'=>$request->input('course_unit'),
        'author'=>Auth::user()->username,
        'file_name'=> $fileNameToStore
    ]);
    return redirect()->back()->with('info','your work has beeen uploded');



    }



}





?>
