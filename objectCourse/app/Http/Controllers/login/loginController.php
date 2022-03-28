<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function login_form(){
        if(auth()->check()){
            return redirect()->route('client.home');
        }else{
            return view('client.login');
        }
    }
    public function check_login(Request $request){
        if(auth()->check()){
            return redirect()->route('client.home');
        }else{
            if(Auth::attempt(['email' => $request->log_email, 'password' => $request->log_password])){
                if(Auth::user()->is_admin){
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('client.home');
                }
            }else{
                return redirect()->route('logins.form')->with('message','Tài khoản hoặc mật khẩu không đúng !');
            }
        }
    }
    public function check_register(Request $request){
        if(auth()->check()){
            return redirect()->route('client.home');
        }else{
            $check_account = $this->users->where('email',$request->email)->get();
            if(!count($check_account)){
                if($request->password !== $request->password2){
                    return 'PassWord không khớp !';
                }
                $arr_account = array(
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'image_path' => $request->image,
                    'password' => Hash::make($request->password)
                );
                $new_user = $this->users->create($arr_account);
                Auth::login($new_user);
                    return 'Đăng ký thành công !';
            }else{
                return 'Email đã được sử dụng !';
            }
            
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('logins.form');
    }
    public function resetpass(){
        return view('client.resetpass');
    }
}
