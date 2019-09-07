<?php

namespace social\Http\Controllers;
use Auth;
use social\Models\User;
use social\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller{

public function index(){
    $friends = Auth::user()->friends();
    $users = DB::table('users')->get();
    return view('dsa.messages')->with('users',$users);
}

public function getConversation($username){
    $user = User::where('username',$username)->first();


    $messages = DB::table('messages')->where('user_id',Auth::user()->id)->where('receiver_id',$user->id)->orWhere('receiver_id',Auth::user()->id)->where('user_id',$user->id)->get();

    if(!$user){
        abort(404);
    }
    return view('message.conversation')->with('user',$user)
              ->with('messages',$messages)
              ->with('AuthUserIsFriend',Auth::user()->isFriendsWith($user));
}
public function postMessage(Request $request, $username ){


    $this->validate($request,[
        'message'=>'required|max:1000'
    ]);

        if($request->hasFile('file')){

                $fileNameWithExt = $request->file('file')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                $path = $request->file('file')->storeAs('public/files',$fileNameToStore);



        }
        else{
            $fileNameToStore = '';
        }


    $receiver = User::where('username',$username)->first();
Auth::user()->messages()->create([
    'message'=>$request->input('message'),
    'user_id'=>Auth::user()->id,
    'receiver_id'=>$receiver->id,
    'file_name'=> $fileNameToStore
]);
return redirect()->back();


}

public function replyMessage(Request $request,$messageId,$receiver_id){

$this->validate($request,[
    "reply-{$messageId}"=>'required|max:1000'
]);
$message = Message::notReply()->find($messageId);



$reply = Message::create([
    'message'=>$request->input("reply-{$messageId}"),
    'user_id'=>Auth::user()->id,
    'receiver_id'=>$receiver_id
  ])->user()->associate(Auth::user());
  $message->replies()->save($reply);
  return redirect()->back();
}



}





?>
