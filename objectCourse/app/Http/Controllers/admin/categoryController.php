<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\category;

class categoryController extends Controller
{
    public $category;
    public function __construct(category $category)
    {
        $this->category = $category;
    }
    public function index(){
        $data_category = $this->category->paginate(6);
        return view('admin.category.index',compact('data_category'));
    }
    public function create(){
        return view('admin.category.add');
    }
    public function store(Request $request){
        $arr_category = array(
            'name' => $request->name,
            'desc' => $request->desc
        );
        $new_category = $this->category->create($arr_category);
        return redirect()->route('category.index')->with('message','thêm thành công thể loại '.$new_category->name.' !');
    }
    public function edit($id){
        $item_category = $this->category->find($id);
        return view('admin.category.edit',compact('item_category'));
    }
    public function update(Request $request,$id){
        $arr = array(
            'name' => $request->edit_name,
            'desc' => $request->edit_desc
        );
        $this->category->find($id)->update($arr);
        $item_update = $this->category->find($id);
        return redirect()->route('category.index')->with('message','Cập nhật thành công thể loại '.$item_update->name.'');
    }
    public function delete(Request $request){
        $item_category = $this->category->find($request->id);
        $item_category_name = $item_category->name;
        $this->category->find($request->id)->delete();
        return '<span class="ml-4 text-success">Xóa thành công thể loại '.$item_category_name.' ! </span>';
    }

}
