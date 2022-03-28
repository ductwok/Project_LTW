<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\course;
use App\model\video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class videoController extends Controller
{

    public $video;
    public $course;
    public function __construct(video $video , course $course)
    {
        $this->video = $video;
        $this->course = $course;
    }
    public function index($id_course){
        $item_course = $this->course->find($id_course);
        $data_video = $item_course->video()->paginate(6);
        return view('admin.video.index',compact('data_video','item_course'));
    }
    public function create($id_course){
        $item_course = $this->course->find($id_course);
        return view('admin.video.add',compact('item_course'));
    }
    public function store(Request $request,$course_id){
        $arr = array(
            'name' => $request->name,
            'desc' => $request->desc,
            'course_id' => $request->course_id
        );
        if($request->hasFile('image')){
            $name_image = Str::random(20).'.'.$request->file('image')->extension();
            $storage_image = $request->file('image')->storeAs('public/images/video',$name_image);
            $arr['image_path'] = Storage::url($storage_image);
        }
        if($request->hasFile('video')){
            $name_video = Str::random(20).'.'.$request->file('video')->extension();
            $storage_video = $request->file('video')->storeAs('public/video/course',$name_video);
            $arr['video_path'] = Storage::url($storage_video);
        }
        $new_video = $this->video->create($arr);
        return redirect()->route('video.index',['id_course'=>$course_id])->with('message','thêm thành công video "'.$new_video->name.'" !');
    }

    public function edit($id_course,$id){
        $item_course = $this->course->find($id_course);
        $item_video = $this->video->find($id);
        return view('admin.video.edit',compact('item_video','item_course'));
    }
    public function update(Request $request,$id_course,$id){
        $arr = array(
            'name' => $request->name,
            'desc' => $request->desc,
            'course_id' => $request->course_id
        );
        if($request->hasFile('image')){
            $name_image = Str::random(20).'.'.$request->file('image')->extension();
            $storage_image = $request->file('image')->storeAs('public/images/video',$name_image);
            $arr['image_path'] = Storage::url($storage_image);
        }
        if($request->hasFile('video')){
            $name_video = Str::random(20).'.'.$request->file('video')->extension();
            $storage_video = $request->file('video')->storeAs('public/video/course',$name_video);
            $arr['video_path'] = Storage::url($storage_video);
        }
        $this->video->find($id)->update($arr);
        $item_update = $this->video->find($id);
        return redirect()->route('video.index',['id_course'=>$id_course])->with('message','Cập nhật thành công video "'.$item_update->name.'"');
    }
    public function delete(Request $request){
        $item_video = $this->video->find($request->id);
        $item_video_name = $item_video->name;
        $this->video->find($request->id)->delete();
        return '<span class="ml-4 text-success">Xóa thành công Video "'.$item_video_name.'" ! </span>';
    }
}
