<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\course;
use App\User;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public $course;
    public function __construct(course $course)
    {
        $this->course = $course;
    }
    public function index(){
        // $course_footer = $this->course->take(3)->get();
        $course_footer = $this->course->take(3)->get();
        $data_course = $this->course->paginate(6);
        return view('client.home',compact('data_course','course_footer'));
    }
    public function add_course(Request $request){
        $course = $this->course->find($request->id_course);
        $image = url()->to('/').$course->image_path;
        $user = User::find(auth()->user()->id);
        $user->my_course()->attach($course);
        return $image;
    }
    public function view_product_detail(Request $request){
        $course = $this->course->find($request->id);
        $course_footer = $this->course->take(3)->get();
        return view('client.view_course_detail',compact('course','course_footer'));
    }
    
    public function my_course(){
        if(auth()->check()){
            $user = auth()->user();
            $data_course = $user->my_course;
            $course_footer = $this->course->take(3)->get();
            return view('client.my-course',compact('course_footer','data_course'));
        }else{
            return redirect()->route('logins.form');
        }
    }
    public function delete_course(Request $request){
        $user = User::find(auth()->user()->id);
        $user->my_course()->detach($request->id_course);
        return 1;
    }
    public function course_single($id){
        if (auth()->check()) {
            $course_footer = $this->course->take(3)->get();
            $item_course = $this->course->find($id);
            return view('client.course-3',compact('item_course','course_footer'));
        }else{
            return redirect()->route('logins.form');
        }
        
    }
    public function about(){
        $course_footer = $this->course->take(3)->get();
        return view('client.about',compact('course_footer'));
    }
    public function contact(){
        $course_footer = $this->course->take(3)->get();
        return view('client.contact',compact('course_footer'));
    }
    public function profile(Request $request){
        $user = User::find($request->id);
        $course_footer = $this->course->take(3)->get();
        return view('client.profile',compact('course_footer','user'));
    }
    public function edit_profile(){
        $course_footer = $this->course->take(3)->get();
        return view('client.edit_profile',compact('course_footer'));
    }
    
    public function update_profile(Request $request){
        $arr_account = array(
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone
            // 'password' => Hash::make($request->password)
            
        );
        User::find($request->id)->update($arr_account);
        return redirect()->route('client.profile',['id' =>$request->id]);
    }
    public function payment(Request $request){
        if(isset($_GET['orderId'])){ 
            $user = User::find(auth()->user()->id);
            $course = $this->course->find($request->course_id);
            $user->my_course_not_payment()->detach($course->id);
            $user->my_course_not_payment()->attach([$course->id => ["payment_method" => "MOMO" , "status" => "yes","price" => $_GET['amount']]]);
        }
        $user = User::find($request->user_id);
        $course = $this->course->find($request->course_id);
        $course_footer = $this->course->take(3)->get();
        return view('client.payment',compact('course_footer','user','course'));
    }
    public function payment_handle(Request $request){
        $user = User::find(auth()->user()->id);
        $course = $this->course->find($request->course_id);
        $user->my_course_not_payment()->detach($course->id);
        $user->my_course_not_payment()->attach([$course->id => ["payment_method" => $request->payment_method , "status" => "yes","price" => $request->total]]);
        return 1;
    }
    public function payment_history(Request $request){
        $user = User::find($request->user_id);
        $course_footer = $this->course->take(3)->get();
        return view('client.payment_history',compact('course_footer'));
    }

}