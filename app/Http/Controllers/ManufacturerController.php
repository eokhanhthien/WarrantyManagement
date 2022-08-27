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
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $data = Manufacturer::get()->toArray();
        return view('backend.include.manufacturer.manufacturer',['data' => $data]);
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
