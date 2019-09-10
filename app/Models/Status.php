<?php


namespace social\Models;


use social\Models\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{
    protected $dates = [
        'created_at',
        'updated_at',

    ];
protected $table = "statuses";
protected $fillable =[
    'body',
    'user_id',
    'parent_id'
];
public function user(){
    return $this->belongsTo('social\Models\User','user_id');
}
public function scopeNotReply($query){
    return $query->whereNull('parent_id');

  }
  public function replies(){
      return $this->hasMany('social\Models\Status','parent_id');
  }
  public function likes(){
      return $this->morphMany('social\Models\Like','likeable');
  }


}











?>
