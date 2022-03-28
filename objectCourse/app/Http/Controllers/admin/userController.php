<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function index(){
        $data_user = $this->users->paginate(6);
        return view('admin.users.index',compact('data_user'));
    }
    public function create(){
        return view('admin.users.add');
    }
    
    public function store(Request $request){
        $check_account = $this->users->where('email',$request->email)->get();
        if(!count($check_account)){
            if($request->password !== $request->password2){
                return redirect()->route('user.create')->with('message','Mật khẩu không khớp !');
            }else{
                $arr_account = array(
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'is_admin' =>$request->is_admin,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password)
                );
                if($request->hasFile('image')){
                    $file_name =  Str::random(20).'.'. $request->file('image')->extension();
                    $store_iamge = $request->file('image')->storeAs('public/images/users', $file_name);
                    $arr_account['image_path'] = Storage::url($store_iamge);
                }
                $new_user = $this->users->create($arr_account);
                return redirect()->route('user.index')->with('message','Thêm thành công tài khoản '.$new_user->name.' !');
            }           
        }else{
            return redirect()->route('user.create')->with('message','Email đã được sử dụng !');
        }
    }
    public function edit($id){
        $item_user = $this->users->find($id);
        return view('admin.users.edit',compact('item_user'));
    }
    public function update(Request $request,$id){
            $arr_account = array(
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'is_admin' =>$request->is_admin,
                'phone' => $request->phone
                // 'password' => Hash::make($request->password)
            );
            if($request->hasFile('image')){
                $file_name =  Str::random(20).'.'. $request->file('image')->extension();
                $store_iamge = $request->file('image')->storeAs('public/images/users', $file_name);
                $arr_account['image_path'] = Storage::url($store_iamge);
            }
            $this->users->find($id)->update($arr_account);
            $edit_user = $this->users->find($id);
            return redirect()->route('user.index')->with('message','Cập nhật thành công tài khoản "'.$edit_user->name.'" !');
    }
    public function delete(Request $request){
        $item_users = $this->users->find($request->id);
        $item_users_name = $item_users->name;
        $this->users->find($request->id)->delete();
        return '<span class="ml-4 text-success">Xóa thành công khóa học "'.$item_users_name.'" ! </span>';
    }
}
