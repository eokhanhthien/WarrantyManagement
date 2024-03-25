<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Serial;
use Session;


class ManufacturerController extends Controller
{
    
    public function index(){
        if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
            // $claimwarranty = ClaimWarranty::paginate(5);;

            $data = Manufacturer::get()->toArray();
            return view('backend.include.manufacturer.manufacturer',['data' => $data]);
        }
        else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
            return redirect()->route('employee');
            // return view('frontend.pages.checkwarranty');
            
        }
        else{
            return view('backend.login');
        }

    }

    public function manufacturer(){
        return view('backend.include.manufacturer.addManufacturer');
    }

    public function addManufacturer(Request $request){
        // dd($request -> all());
        // print_r($data['name']);die;
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request-> input('name');

        $get_image = $request->image;
        $path = 'uploads/category/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $manufacturer->image = $new_image;

        $manufacturer -> save();
        return redirect()->route('manufacturer')->with('message','Thêm hãng sản xuất thành công');
    }

    public function editManufacturer($id){
        $data = Manufacturer::find($id)->toArray();
        return view('backend.include.manufacturer.editManufacturer',['data' => $data]);
    }

    public function updateManufacturer(Request $request, $id){
        $manufacturer = Manufacturer::find($id);
        $manufacturer->name = $request-> input('name');
          // Thêm ảnh vào folder
          $get_image = $request->image ?? '';
          if($get_image){
              // Bỏ hình ảnh cũ
              $path_unlink = 'uploads/category/'.$manufacturer->image;
              if(file_exists($path_unlink)){
                  unlink($path_unlink);
              }
              // Thêm mới
              $path = 'uploads/category/';
              $get_name_image = $get_image-> getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
              $get_image->move($path,$new_image);
              $manufacturer->image = $new_image;
          }
        $manufacturer -> save();
        return redirect()->route('manufacturer')->with('message','Sữa hãng sản xuất thành công');
    }

    public function deleteManufacturer($id){
        // print_r($id);die;
        $manufacturer = Manufacturer::find($id);
        $product = Product::find($id);
        $serial = Serial::find($id);
        $manufacturer -> delete();
        $path_unlink = 'uploads/category/'.$manufacturer->image;
        if(file_exists($path_unlink)){
            unlink($path_unlink);
        }

        if($product){
            $product -> delete();
        }
        if( $serial ){
            $serial -> delete();
        }

        return redirect()->route('manufacturer')->with('message','Xóa hãng sản xuất thành công');
    }


}
