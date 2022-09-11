<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Serial;
use App\Models\InfoCustomerRegister;
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

    public function checkSerial(Request $request){
        $data =  $request->all();
        $serial_check = Serial::where(['serial_number' => $data['check-serial'] ])->get()->first();
        if(isset($serial_check)){
            $serial_check = Serial::where(['serial_number' => $data['check-serial'] ])->get()->first()->toArray();
            $product_check = Product::where(['id' => $serial_check['id_product'] ])->get()->first()->toArray();
            return redirect()->route('check-warranty')->with(['serial_check'=> $serial_check , 'product_check' => $product_check]);
        }
        else{
            return redirect()->route('check-warranty')->with('message','Số serial chưa đúng, vui lòng kiểm tra lại');
        }
        // echo "<pre>";
        // print_r($product_check);
        // print_r($serial_check);die;
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
                    'order_code' => $data['order_code'],
                    'product_id' => $data['product_id'] ,
                    'product_serial' => $data['product_serial'],
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
    // print_r(Session::get('isWarranty')['order_code']);die;
    if(!Session::get('isWarranty')){
        return redirect()->route('register-warranty');
    }
        return view('frontend.pages.infocustomerwarranty');
    }

    function comfirmRegisterWarranty(Request $request){
        $data =  $request->all();

        // Thêm vaoof thông tin khách khích hoạt bảo hành
        $InfoCustomerRegister = new InfoCustomerRegister;
        $InfoCustomerRegister->customer_name = $data['customer_name'];
        $InfoCustomerRegister->customer_email = $data['customer_email'];
        $InfoCustomerRegister->customer_phone = $data['customer_phone'];
        $InfoCustomerRegister->order_code = $data['order_code'];
        $InfoCustomerRegister->product_id = $data['product_id'];
        $InfoCustomerRegister->product_serial = $data['product_serial'];
        $InfoCustomerRegister->save();

        //Active mã code serial 
        $serial_active = Serial::where(['id_product' => $data['product_id'] , 'serial_number' => $data['product_serial'] ])->get()->first();
        $serial_active->status = 1;
        $serial_active->save();
        return redirect()->route('register-warranty')->with('register-success','Kích hoạt bảo hành thành công');
        // echo "<pre>";
        // print_r($serial_active );die;
    }

}
