<?php
namespace social\Models;
use Illuminate\Database\Eloquent\Model;
class Notes extends Model{
protected $table='notes';
protected $fillable= [
            'user_id',
            'file_name',
            'type',
            'course_unit'];

public function user(){
    return $this->belongsTo('social\Models\User','user_id');
}
public function id() {
return $this->user_id;
}







}
?>
