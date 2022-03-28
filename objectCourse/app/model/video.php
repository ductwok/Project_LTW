<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = ['name','image_path','desc','video_path','course_id'];
    protected $table = 'videos';
    protected $primaryKey = 'id';
}
