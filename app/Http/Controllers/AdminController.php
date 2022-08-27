<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
class AdminController extends Controller
{
    function index(){
        return view('backend.login');

    }
    function checklogin(Request $request){

      $data =  $request->all();
      $data_admin = Admin::where([['email', $data['email']],['role', 1 ]])->get()->toArray();
      $password = $data['password'];
    //   echo"<pre>";
    if(count($data_admin) > 0){
        if( $password == $data_admin[0]['password'] ){
            Session::put('admin', [
                'username'  => $data_admin[0]['username'],
                'email'  => $data_admin[0]['email'],
                'password'  => $data_admin[0]['password'],
                'role'  => $data_admin[0]['role'],
            ]);
            return redirect()->route('order', []);
        }
        else{
            return redirect()->back()->with('error','Mật khẩu không chính xác');
        }
    }
    else{
        return redirect()->back()->with('error','Email không tồn tại');
    }
    }

    function successlogin(){
        return view('pages.home');
    }


}
