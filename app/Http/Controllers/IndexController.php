<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\City;
use App\Models\Product;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Serial;
use App\Models\InfoCustomerRegister;
use App\Models\ClaimWarrantyDetail;
use App\Models\ClaimWarranty;
use Session;

use App\Http\Controllers\MailerPHP; 

class IndexController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }

    public function registerWarranty(){
        // Xóa đi Session nếu quay lại trang trước
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
                $findSerial= Serial::where(['id_product'=> $data['product_id'], 'serial_number' => $data['product_serial']])->get()->first()->toArray();
                // print_r($findSerial);die;
                 if($findSerial['status'] === 0){
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
                    return redirect()->route('register-warranty')->with('message','sản phẩm đã được kích hoạt bảo hành');
                 }
                
           
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

    function claimWarranty(){
        $city = City::get()->toArray();
        $manufacturer = Manufacturer::get()->toArray();
        return view('frontend.pages.claimwarranty',["data"=>$city , 'manufacturer' => $manufacturer]);

    }

    function sendClaimWarranty(Request $request){
        // require_once 'mail/sendmail.php';
        $data =  $request->all();
        // echo "<pre>";
        // print_r($data);die;
        $ISclaimwarrantydetail = ClaimWarrantyDetail::where(['product_serial' => $data['product_serial']])->get()->first();;
        $product = Serial::where(['id_product' => $data['product_id'] , 'serial_number' => $data['product_serial'] ])->get()->first();
    if( !isset($ISclaimwarrantydetail) && $ISclaimwarrantydetail == NULL){
        if(isset($product) && $product != NULL){
        $product = Serial::where(['id_product' => $data['product_id'] , 'serial_number' => $data['product_serial'] ])->get()->first()->toArray();
            if($product['activate_time'] <= $product['expired_time']){
                if($product['status']===1){
                    // echo "<pre>";  
                    // print_r($data);die;
                    $checkout_code = substr(md5(microtime()),rand(0,26),5);
                    
                    $claimwarrantydetail = new ClaimWarrantyDetail();
                    $claimwarranty = new ClaimWarranty();


                    $claimwarranty->customer_name = $data['customer_name']; 
                    $claimwarranty->claim_code = $checkout_code;
                    $claimwarranty->status = 0;
                    $claimwarranty->type = 1;
                    $claimwarranty->created_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
                    $claimwarranty->save();


                    $claimwarrantydetail->customer_name = $data['customer_name'];
                    $claimwarrantydetail->claim_code = $checkout_code;
                    $claimwarrantydetail->type = 1;
                    $claimwarrantydetail->customer_email = $data['customer_email'];
                    $claimwarrantydetail->customer_phone = $data['customer_phone'];
                    $claimwarrantydetail->product_serial = $data['product_serial'];
                    $claimwarrantydetail->product_id = $data['product_id'];
                    $claimwarrantydetail->address_city = $data['address_city'];
                    $claimwarrantydetail->address_province = $data['address_province'];
                    $claimwarrantydetail->address_wards = $data['address_wards'];

                    $claimwarrantydetail->save();

                    $noidung ="";
                    $tieude = 'Yêu cầu bảo hành';
                    $noidung .="<p>Yêu cầu bảo hành của quý khách đã được tiếp nhận thành công với mã yêu cầu là: ".$checkout_code."</p>";
                    $noidung .="<p>Kỹ thuật viên sẽ đến kiểm tra tình trạng máy của bạn (trễ nhất một tuần)</p>";
                    $emailyeucau = $data['customer_email'];

                    $mail= new MailerPHP();
                    $mail->sendMail( $tieude,$noidung,$emailyeucau);

                    return redirect()->route('claim-warranty')->with('register-success','Gửi yêu cầu bảo hành thành công, kết quả sẽ sớm được gửi qua mail của bạn');

                }
                else{
                return redirect()->route('claim-warranty')->with('message','Sản phẩm chưa được kích hoạt bảo hành');
                }

              }
              else{
                return redirect()->route('claim-warranty')->with('message','Sản phẩm của bạn đã hết thời gian bảo hành');
            }
        }
        else{
            return redirect()->route('claim-warranty')->with('message','Không tìm thấy sản phẩm tương tự');
        }
    }  
    else{
        return redirect()->route('claim-warranty')->with('message','Sản phẩm này đã được yêu cầu trước đó');
    }

        // if($product[0]['id']);
        
    }

}
