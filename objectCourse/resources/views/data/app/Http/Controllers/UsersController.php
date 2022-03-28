<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
	function index(){
		$users = DB::table('users')->join('khoahoc','khoahoc.id')
            ->select('users.id', 'users.name','users.phone')->take(10)->get();
        dd($users);
	}
}
