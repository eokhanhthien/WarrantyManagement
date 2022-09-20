<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use Session;

class Technicianstroller extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $data = Admin::paginate(5);
        return view('backend.include.technician.index',['data'=>$data]);
    }


    function add(){
        return view('backend.include.technician.add');
    }

    function addTechnicians(Request $request){
        $data = $request->all();
        $password = password_hash($data['password'],PASSWORD_BCRYPT );
        $admin = new Admin;
        $admin->username = $data['username'];
        $admin->password = $password;
        $admin->fullname = $data['fullname'];
        $admin->email = $data['email'];
        $admin->role = $data['role'];

        $admin -> save();
        return redirect()->route('technicians')->with('message','Thêm nhân sự thành công');

    }

    function edit($id){
        $data =  Admin::find($id)->toArray();        
        return view('backend.include.technician.edit',['data' => $data]);

    }

    function update(Request $request, $id){
        $data = $request->all();
        $admin =  Admin::find($id);
        $admin->username = $data['username'];
        $admin->password = $data['password'];
        $admin->fullname = $data['fullname'];
        $admin->email = $data['email'];
        $admin->role = $data['role'];

        $admin -> save();
        return redirect()->route('technicians')->with('message','Sửa nhân sự thành công');

    }

    function deletete($id){
        $admin =  Admin::find($id);
        $admin -> delete();
        return redirect()->route('technicians')->with('message','Xóa nhân sự thành công');

    }
}
