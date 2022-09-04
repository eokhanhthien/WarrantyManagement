<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;

use App\Models\OrderDetail;
use App\Models\Order;
use Session;

class IndexController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }

    public function registerWarranty(){
        Session::forget('isWarranty')  ;
        $manufacturer = Manufacturer::get()->toArray();
        return view('frontend.pages.registerwarranty',['manufacturer' => $manufacturer]);
    }

    public function checkWarranty(){
        return view('frontend.pages.checkwarranty');
    }
    
    public function addRegisterWarranty(Request $request){
        $data =  $request->all();

        $findOrder= Order::where(['order_code'=> $data['order_code']])->get()->toArray();

        // date('d/m/Y' , strtotime($findOrder['created_at'])); 
        // echo "<pre>";
        // print_r($findOrder);die;
        if(isset($findOrder) && $findOrder != NULL){
            if( date('d/m/Y' , strtotime($findOrder[0]['created_at'])) === date('d/m/Y' , strtotime($data['date-buy']))){
                $product = OrderDetail::where(['order_code'=> $data['order_code'] ,'product_id' => $data['product_id'] , 'product_serial' => $data['product_serial'] ])->get()->toArray();
                if(isset($product) && $product != NULL){
                 
                   Session::put('isWarranty', [
                    'status' => 0,
                ]);
                    // echo "<pre>";
                    // print_r($product);die; 
                    return redirect()->route('register-warranty-info-customer');
           
                }
                else{
                    return redirect()->route('register-warranty')->with('message','Không tìm thấy sản phẩm tương tự');
                }
            }
            else{
                return redirect()->route('register-warranty')->with('message','Không có đơn hàng tương tự được mua trong ngày này');
            }
        }else{
            return redirect()->route('register-warranty')->with('message','Không tìm thấy đơn hàng tương tự');
        }


    }

    function RegisterWarrantyInfo(){
    //     echo "<pre>";
    // print_r(Session::get('isWarranty'));die;
    if(!Session::get('isWarranty')){
        return redirect()->route('register-warranty');
    }
        return view('frontend.pages.infocustomerwarranty');
    }

}
