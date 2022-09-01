<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Manufacturer;
use App\Models\Product;

use Session;

class OrderController extends Controller
{
    // Từ file views ->>> đi vào
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        return view('backend.include.order.order');
    }

    public function add(Request $request){
        $city = City::get()->toArray();
        // echo "<pre>";
        // print_r( $city);die;
        $manufacturer = Manufacturer::get()->toArray();

        return view('backend.include.order.add',["data"=>$city , 'manufacturer' => $manufacturer]);
    }

    function getAddress(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $output = '';
            if($_POST['action'] == 'city'){
                // $select_province = $this->ProvinceModels->select_array('*',['matp' => $_POST['matp']] );
                $select_province = Province::where('matp', $_POST['matp'])->get()->toArray();
                // echo "<pre>";
                // print_r( $select_province);die;
                $output = '<option value="" >Chọn quận / huyện</option>';
                foreach($select_province as $key => $val){
                    $output .=  '<option value="'.$val['name_quanhuyen'].'" data-city="'.$val['maqh'].'" >'. $val['name_quanhuyen'] .'</option>';
                }
                
            }
            else{
                // $select_wards = $this->WardsModels->select_array('*',['maqh' => $_POST['matp']] );
                $select_wards = Wards::where('maqh', $_POST['matp'])->get()->toArray();

                $output = '<option value="" >Chọn xã phường / thị trấn</option>';
                foreach($select_wards as $key => $val){
                    $output .=  '<option value= "'.$val['name_xaphuong'].'" >'. $val['name_xaphuong'] .'</option>';
                }
            }
            echo $output;
        }

    }
    public function getProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $output = '';
            if($_POST['action'] == 'manu'){
                // $select_province = $this->ProvinceModels->select_array('*',['matp' => $_POST['matp']] );
                $select_product = Product::where('id_manu', $_POST['matp'])->get()->toArray();
                // echo "<pre>";
                // print_r( $select_product);die;
                $output = '<option value="" >Chọn sản phẩm </option>';
                foreach($select_product as $key => $val){
                    $output .=  '<option value="'.$val['id'].'" data-manu="'.$val['id'].'" >'. $val['name'] .'</option>';
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

    function addOrder(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "<pre>";
                print_r( $_POST);die;
        }
    }
}
