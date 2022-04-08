<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\category;
use App\model\course;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    public $category;
    public $course;
    public $users;
    public function __construct(category $category,course $course,User $users)
    {
        $this->category = $category;
        $this->course = $course;
        $this->users = $users;
    }
    public function index(){
        $data_course = $this->course->paginate(6);
        return view('admin.course.index',compact('data_course'));
    }
    public function create(){
        $data_category = $this->category->all();
        $data_users = $this->users->all();
        return view('admin.course.add',compact('data_category','data_users'));
    }
    
    public function store(Request $request){
        $arr_course = array(
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'image_path' => ''
        );
        
        if($request->hasFile('image')){
            $file_name =  Str::random(20).'.'. $request->file('image')->extension();
            $store_iamge = $request->file('image')->storeAs('public/images/course', $file_name);
            $arr_course['image_path'] = Storage::url($store_iamge);
        }
        $new_course = $this->course->create($arr_course);
        return redirect()->route('course.index')->with('message','thêm thành công khóa học '.$new_course->name.' !');
    }
    public function edit($id){
        $data_category = $this->category->all();
        $data_users = $this->users->all();
        $item_course = $this->course->find($id);
        return view('admin.course.edit',compact('item_course','data_category','data_users'));
    }
    public function update(Request $request,$id){
        $arr = array(
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => $request->status,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        );
        if($request->hasFile('image')){
            $name_image = Str::random(20).'.'.$request->file('image')->extension();
            $storage_image = $request->file('image')->storeAs('public/images/course',$name_image);
            $arr['image_path'] = Storage::url($storage_image);
        }
        $this->course->find($id)->update($arr);
        $item_update = $this->course->find($id);
        return redirect()->route('course.index')->with('message','Cập nhật thành công Khóa học "'.$item_update->name.'"');
    }
    public function delete(Request $request){
        $item_course = $this->course->find($request->id);
        $item_course_name = $item_course->name;
        $this->course->find($request->id)->delete();
        return '<span class="ml-4 text-success">Xóa thành công khóa học "'.$item_course_name.'" ! </span>';
    }
}
