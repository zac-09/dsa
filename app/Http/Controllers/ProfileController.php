<?php
namespace social\Http\Controllers;
use social\Models\User;
use Auth;
use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller{

    public function getProfile($username){
        $user = User::where('username',$username)->first();

        $statuses = $user->statuses()->notReply()->get();
        if(!$user){
            abort(404);
        }
        return view('dsa.profile')->with('user',$user)
        ->with('statuses',$statuses)
        ->with('authUserIsFriend',Auth::user()->isFriendsWith($user));
    }
    public function getEdit(){
        $username = Auth::user()->getNameOrUsername();
        $user = User::where('username',$username)->first();

        return view('dsa.editProfile')->with('user',$user);
    }
    public function postEdit(Request $request){

        $this->validate($request,[
            'first_name'=>'max:21|required|alpha',
            'last_name'=>'max:21|required|alpha',
            'phone_number'=>'max:21|',
            'profession'=>'max:21|',

        ]);
        if($request->hasFile('file')){

            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/profile_pics',$fileNameToStore);



    }
    else{

        $fileNameToStore = 'no_image_1565853915.jpg
        ';
    }

         DB::table('users')->where('username',Auth::user()->username)->update([
             'first_name'=>$request->input('first_name'),
             'last_name'=>$request->input('last_name'),
             'profile_pic'=> $fileNameToStore,
             'phone_number'=>$request->input('phone_number'),
             'profession'=>$request->input('profession'),
         ]);
         return redirect()->route('profile.edit')->with('info','your profile has been successfully updated');

         /* easier way is
         Auth::user()->update([
             'first_name'=>$request->input('first_name'),
             'last_name'=>$request->input('last_name'),
             'location'=>$request->input('location'),
         ]);







         */
    }
}









?>
