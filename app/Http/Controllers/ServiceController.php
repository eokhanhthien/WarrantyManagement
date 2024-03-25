<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Service;
use App\Models\Product;
use App\Models\Serial;
use Session;


class ServiceController extends Controller
{
    
    public function index(){
        if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
            // $claimwarranty = ClaimWarranty::paginate(5);;

            $data = Service::get()->toArray();
            return view('backend.include.service.service',['data' => $data]);
        }
        else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
            return redirect()->route('employee');
            // return view('frontend.pages.checkwarranty');
            
        }
        else{
            return view('backend.login');
        }

    }

    public function serviceAdd(){
        return view('backend.include.service.addService');
    }

    public function addService(Request $request){
        // dd($request -> all());
        // print_r($data['name']);die;
        $service = new Service;
        $service->name = $request-> input('name');
        $service->content = $request-> input('content');

        $get_image = $request->image;
        $path = 'uploads/service/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $service->image = $new_image;

        $service -> save();
        return redirect()->route('service')->with('message','Thêm dịch vụ thành công');
    }

    public function serviceEdit($id){
        $data = Service::find($id)->toArray();
        return view('backend.include.service.editService',['data' => $data]);
    }

    public function updateService(Request $request, $id){
        $service = Service::find($id);
        $service->name = $request-> input('name');
        $service->content = $request->input('content');
          // Thêm ảnh vào folder
          $get_image = $request->image ?? '';
          if($get_image){
              // Bỏ hình ảnh cũ
              $path_unlink = 'uploads/category/'.$service->image;
              if(file_exists($path_unlink)){
                  unlink($path_unlink);
              }
              // Thêm mới
              $path = 'uploads/category/';
              $get_name_image = $get_image-> getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
              $get_image->move($path,$new_image);
              $service->image = $new_image;
          }
        $service -> save();
        return redirect()->route('service')->with('message','Sữa dịch vụ thành công');
    }

    public function deleteService($id){
        $service = Service::find($id);

        $path_unlink = 'uploads/service/'.$service->image;
        if(file_exists($path_unlink)){
            unlink($path_unlink);
        }
        $service -> delete();

        return redirect()->route('service')->with('message','Xóa dịch vụ thành công');
    }


}
