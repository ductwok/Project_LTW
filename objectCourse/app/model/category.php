<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name','desc'];
    protected $table = 'categories';
    protected $primaryKey = 'id';
}
