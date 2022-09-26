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
        // $data = $request -> all();
        // print_r($data['name']);die;
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request-> input('name');
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
        $manufacturer -> save();
        return redirect()->route('manufacturer')->with('message','Sữa hãng sản xuất thành công');
    }

    public function deleteManufacturer($id){
        // print_r($id);die;
        $manufacturer = Manufacturer::find($id);
        $product = Product::find($id);
        $serial = Serial::find($id);
        $manufacturer -> delete();
        $product -> delete();
        $serial -> delete();
        return redirect()->route('manufacturer')->with('message','Xóa hãng sản xuất thành công');
    }


}
