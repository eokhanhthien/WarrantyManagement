<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Serial;
use Session;

class SerialController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $serial = Serial::get()->toArray();
        
        return view('backend.include.serial.index',['serial' => $serial]);
    }

    public function serialAdd(){
        $manufacturer = Manufacturer::get()->toArray();
        // print_r($manufacturer);die;
        return view('backend.include.serial.add',['manufacturer' => $manufacturer]);

    }
    
    public function add(Request $request){
        $data = $request->validate(
            [
                'serial_number' => 'required|unique:tbl_serial|max:11|min:10',
                'id_product' => 'required',
                'warranty_time' => 'required',
            ],
            [
                'serial_number.unique' => 'Số serial đã tồn tại, hãy nhập một số serial khác',
                'serial_number.required' => 'Số serial không được trống',
                'serial_number.max' => 'Số serial phải từ 10-11 ký tự',
                'serial_number.min' => 'Số serial phải từ 10-11 ký tự',
                'id_product.required' => 'Hãy chọn sản phẩm',
                'warranty_time.required' => 'Hãy chọn thời gian bảo hành',
            ]
        );

        $serial = new Serial();
        $serial->id_product = $data['id_product'];
        $serial->serial_number = $data['serial_number'];
        $serial->status = 0;
        $serial->warranty_time = $data['warranty_time'];
        $serial->activate_time = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $serial->expired_time = gmdate('Y-m-d H:i:s', time() + 7*3600);

        $serial->save();
        return redirect()->route('serial')->with('message','Thêm serial bảo hành thành công');

    }

    public function getcateSerial(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $output = '';
            if($_POST['action'] == 'city'){
                // $select_province = $this->ProvinceModels->select_array('*',['matp' => $_POST['matp']] );
                $select_product = Product::where('id_manu', $_POST['matp'])->get()->toArray();
                // echo "<pre>";
                // print_r( $select_product);die;
                $output = '<option value="" >Chọn sản phẩm </option>';
                foreach($select_product as $key => $val){
                    $output .=  '<option value="'.$val['id'].'" data-city="'.$val['id'].'" >'. $val['name'] .'</option>';
                }
                
            }
            // else{
            //     // $select_wards = $this->WardsModels->select_array('*',['maqh' => $_POST['matp']] );
            //     $select_wards = Wards::where('maqh', $_POST['matp'])->get()->toArray();

            //     $output = '<option value="" >Chọn xã phường / thị trấn</option>';
            //     foreach($select_wards as $key => $val){
            //         $output .=  '<option value= "'.$val['name_xaphuong'].'" >'. $val['name_xaphuong'] .'</option>';
            //     }
            // }
            echo $output;
        }
    }

    public function serialEdit($id){
        $data = Serial::find($id)->toArray();
        $data_product = Product::find($data['id_product'])->toArray();
        $data_manu = Manufacturer::find($data_product['id_manu'])->toArray();

        $Manufacturer = Manufacturer::get()->toArray();

        return view('backend.include.serial.edit',['data' => $data,'data_manu' => $data_manu,'data_product' => $data_product ,'manufacturer' => $Manufacturer ]);
    }

    public function update(Request $request, $id){
        $data = $request->validate(
            [
                'serial_number' => 'required|unique:tbl_serial|max:11|min:10',
                'id_product' => 'required',
                'warranty_time' => 'required',
            ],
            [
                'serial_number.unique' => 'Số serial đã tồn tại, hãy nhập một số serial khác',
                'serial_number.required' => 'Số serial không được trống',
                'serial_number.max' => 'Số serial phải từ 10-11 ký tự',
                'serial_number.min' => 'Số serial phải từ 10-11 ký tự',
                'id_product.required' => 'Hãy chọn sản phẩm',
                'warranty_time.required' => 'Hãy chọn thời gian bảo hành',
            ]
        );

        $serial = Serial::find($id);
        $serial->id_product = $data['id_product'];
        $serial->serial_number = $data['serial_number'];
        $serial->status = 0;
        $serial->warranty_time = $data['warranty_time'];
        $serial->activate_time = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $serial->expired_time = gmdate('Y-m-d H:i:s', time() + 7*3600);

        $serial->save();
        return redirect()->route('serial')->with('message','Sửa serial bảo hành thành công');
    }

    public function delete($id){
        $serial =  Serial::find($id);
        $serial -> delete();
        return redirect()->route('serial')->with('message','Xóa serial bảo hành thành công');
    }

}
