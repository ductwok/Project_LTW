<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\category;
use App\model\course;
use App\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public $users;
    public $course;
    public $category;
    public function __construct(User $users, course $course, category $category)
    {
        $this->users = $users;
        $this->course = $course;
        $this->category = $category;
    }
    public function index(){
        $count_users = $this->users->count();
        $count_course = $this->course->count();
        $count_category = $this->category->count();
        return view('admin.dashboard',compact('count_users','count_course','count_category'));
    }
}
