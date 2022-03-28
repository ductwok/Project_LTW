<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = ['name','image_path','desc','status','category_id','user_id'];
    protected $table = 'courses';
    protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function video(){
        return $this->hasMany(video::class,'course_id');
    }
}
