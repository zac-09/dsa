<?php

namespace social\Models;
use social\Models\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','location','username','year','phone_number','profession','profile_pic'
    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getName(){
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
            }
        if($this->firstname){
            return $this->first_name;
        }


}
public function statuses(){
    return $this->hasMany('social\Models\Status','user_id'  );
}
public function notes(){
    return $this->hasMany('social\Models\Notes','user_id'  );
}
public function messages(){
    return $this->hasMany('social\Models\Message','user_id'  );
}
public function getNameOrUsername(){
    return $this->getName()  ?: $this->username;
}

public function getFirstNameOrUsername(){
    return $this->first_name?: $this->username;
}
public function getAvatorUrl(){
    return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&&s=40";
}
public function friendsOfMine(){
    return $this->belongsToMany('social\Models\User','friends','user_id','friend_id');
}
public function friendOf(){
    return $this->belongsToMany('social\Models\User','friends','friend_id','user_id');
}
public function friends(){
return $this->friendsOfMine()
->wherePivot('accepted',true)
->get()->merge($this->friendOf()
->wherePivot('accepted',true)
->get());
}


public function friendRequests(){
    return $this->friendsOfMine()->wherePivot('accepted',false)->get();
}
public function friendRequestsPending(){
    return $this->friendOf()->wherePivot('accepted',false)->get();
}
public function hasFriendRequestsPending(User $user){
return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
}
public function hasFriendsRequestsReceived(User $user){
    return (bool) $this->friendRequests()->where('id',$user->id)->count();
}

public function addFriend(User $user){
  $this->friendOf()->attach($user->id);
}
public function deleteFriend(User $user){
    $this->friendOf()->detach($user->id);
    $this->friendsOfMine()->detach($user->id);
  }

public function acceptFriendRequest(User $user){
    return $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
        'accepted'=>true
    ]);
}
public function isFriendsWith(User $user){
    return (bool) $this->friends()->where('id',$user->id)->count();
}
public function hasLikedStatus(Status $status){
return (bool) $status->likes->where('user_id',$this->id)->count();
}
public function likes(){
    return $this->hasMany('social\Models\Like','user_id');
}
public function getProfile(){
    return Auth::user()->profile_pic;
}

}
