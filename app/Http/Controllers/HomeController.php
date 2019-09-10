<?php
namespace social\Http\Controllers;
use Auth;
use social\Models\Status;
class HomeController extends Controller{

    public function index(){
        $statuses = Status::where(function($query){
            return $query->notReply();})->orderBY('created_at', 'desc')->paginate(10);

        // if(Auth::check()){
        //     $statuses = Status::where(function($query){
        //             return $query->notReply()->where('user_id',Auth::user()->id);
        //     })->orderBY('created_at','desc')->paginate(10);


            //return view('dsa.index')->with('statuses',$statuses);
        }
        return view('dsa.index')->with('statuses',$statuses);




    }

}



?>
