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
      $data_admin = Admin::where([['email', $data['email']]])->get()->toArray();
      $password = $data['password'];
    //   echo"<pre>";
    if(count($data_admin) > 0){
        if( password_verify($password,$data_admin[0]['password']) ){
            Session::put('admin', [
                'id'  => $data_admin[0]['id'],
                'username'  => $data_admin[0]['username'],
                'email'  => $data_admin[0]['email'],
                'password'  => $data_admin[0]['password'],
                'role'  => $data_admin[0]['role'],
            ]);
            // return redirect()->route('order', []);
            if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
                // $claimwarranty = ClaimWarranty::paginate(5);;

                return redirect()->route('manufacturer');
            }
            else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
                return redirect()->route('employee');
                // return view('frontend.pages.checkwarranty');
                
            }
            else{
                return view('backend.login');
            }
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

    function logout(){
//     echo '<pre>';
//    print_r(Session::get('admin'));die; 
        Session::forget('admin')  ;
        return redirect()->route('admin');

    }


}
