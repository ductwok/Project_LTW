<?php

namespace App;

use App\model\course;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','image_path','is_admin',
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

    public function my_course(){
        return $this->belongsToMany(course::class,'my_course','user_id','course_id')->withPivot('status','payment_method','price');
    }
    public function my_course_payment(){
        return $this->belongsToMany(course::class,'my_course','user_id','course_id')->wherePivot('status','yes')->withPivot('status','payment_method','price');
    }
    public function my_course_not_payment(){
        return $this->belongsToMany(course::class,'my_course','user_id','course_id')->wherePivot('status','not')->withPivot('status','payment_method','price');
    }
}
