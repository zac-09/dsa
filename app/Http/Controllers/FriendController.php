<?php 
namespace social\Http\Controllers;
use Auth;
use social\Models\User;

class FriendController extends Controller{
    public function getindex(){
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friends.index')
        ->with('friends',$friends)
        ->with('requests',$requests)
        ;
    }
    public function getAdd($username){
        $user = User::where('username',$username)->first();
        if(!$user){
            return redirect()->route('home')
            ->with('info','that user couldnot be found');
        }
        if(Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user()))
            {
                    return redirect()
                    ->route('profile.index',['username'=>$user->username])->
                    with('info','Friend Request already Pending');
            }
            if(Auth::user()->id === $user->id){
                return redirect()->route('home'); 
            }
        if(Auth::user()->isFriendsWith($user)){
           return  redirect()->route('profile.index',['username'=>$user->username])->
            with('info','you are already friends');
        }
        Auth::user()->addFriend($user);
        return redirect()->route('profile.index',['username'=>$user->username])->with('info','Friend Request has been sent');


        }
        public function getAccept($username){
            $user = User::where('username',$username)->first();
            if(!$user){
                return redirect()->route('home')
                ->with('info','that user couldnot be found');
            }
            if(!Auth::user()->hasFriendsRequestsReceived($user)){
                return redirect()->route('home');
            }
            Auth::user()->acceptFriendRequest($user);
            return redirect()->route('profile.index',['username'=>$user->username])->with('info','Friend request accepted');
        }
        public function postDelete($username){
            $user = User::where('username',$username)->first();
            
            if(!Auth::user()->isFriendsWith($user)){
                return  redirect()->back();
             }

             Auth::user()->deleteFriend($user);
             return redirect()->back()->with('info','Friend has been deleted');

        }
    
    }









?>