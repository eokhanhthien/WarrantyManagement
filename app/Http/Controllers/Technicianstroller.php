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
        $isUser = Admin::where(['email'=> $data['email']])->get()->toArray();

        // print_r($isUser);die; 
        if(isset($isUser) && $isUser != NULL){
            return redirect()->route('technicians')->with('message','Email được sử dụng, vui lòng kiểm tra lại');
        }else{
        // Thêm ảnh vào folder
        $get_image = $request->image;
        // print_r($get_image);die; 

        $path = 'uploads/avatar/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $password = password_hash($data['password'],PASSWORD_BCRYPT );

        $admin = new Admin;
        $admin->username = $data['username'];
        $admin->password = $password;
        $admin->fullname = $data['fullname'];
        $admin->email = $data['email'];
        $admin->role = $data['role'];
        $admin->image = $new_image;
        $admin -> save();
        return redirect()->route('technicians')->with('message','Thêm nhân sự thành công');
        }


    }

    function edit($id){
        $data =  Admin::find($id)->toArray();        
        return view('backend.include.technician.edit',['data' => $data]);

    }

    function update(Request $request, $id){
        $data = $request->all();
        $admin =  Admin::find($id);

         // Thêm ảnh vào folder
         $get_image = $request->image;
         if($get_image){
             // Bỏ hình ảnh cũ
             $path_unlink = 'uploads/avatar/'.$admin->image;
             if(file_exists($path_unlink)){
                 unlink($path_unlink);
             }
             // Thêm mới
             $path = 'uploads/avatar/';
             $get_name_image = $get_image-> getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
             $get_image->move($path,$new_image);
             $admin->image = $new_image;
         }

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
