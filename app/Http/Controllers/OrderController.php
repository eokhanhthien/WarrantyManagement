<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Manufacturer;
use App\Models\Product;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Serial;

use Session;

class OrderController extends Controller
{
    // Từ file views ->>> đi vào
    public function index(){
        if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
            // $claimwarranty = ClaimWarranty::paginate(5);;

            $order = Order::orderBy('id','desc')->paginate(10);
            return view('backend.include.order.order', ['order' => $order]);
        }
        else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
            return redirect()->route('employee');
            // return view('frontend.pages.checkwarranty');
            
        }
        else{
            return view('backend.login');
        }

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

            echo $output;
        }
    }

    function addOrder(Request $request){
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         echo "<pre>";
        //         print_r( $_POST);die;
        // }
        $data = $request->all();

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order = new Order();
        $order->order_code = $checkout_code;
        $order->name_customer = $data['data_order']['name_customer'];
        $order->phone_customer = $data['data_order']['phone_customer'];
        $order->email_customer = $data['data_order']['email_customer'];
        $order->address_city = $data['data_order']['address_city'];
        $order->address_province = $data['data_order']['address_province'];
        $order->address_wards = $data['data_order']['address_wards'];
        $order->note = $data['data_order']['note'];
        $order->created_at = gmdate('Y-m-d H:i:s', time() + 7*3600);

        $order->save();

        $order_id = $order->id;

        $array = [];
        foreach($data['data_option'] as $value){
            $array[] = $value['name-product'];
        }

        $arr_product = Product::whereIn('id', $array)->get()->toArray();
        // echo "<pre>";
        // print_r( $array);
        // print_r( $arr_product);
        // print_r( $data['data_option']);die;
        if(count($array) > count($arr_product)){
            for($i = 0 ; $i < count($array) ; $i ++){
                foreach($arr_product as $key => $val){
                    if($val['id'] == $data['data_option'][$i]['name-product']){
                    $order_detail= new OrderDetail();
                    $order_detail->order_code = $checkout_code;
                    $order_detail->product_id = $val['id']; 
                    $order_detail->product_name = $val['name']; 
                    $order_detail->product_price = $val['price']; 
                    $order_detail->product_image = $val['image'];
                    $order_detail->product_serial = $data['data_option'][$i]['serial']; 
                    $order_detail->save();
                }
                }  
            }
        }else{
            if(isset($arr_product) && $arr_product != NULL){
            foreach($arr_product as $key => $val){
                for($i = 0 ; $i < count($arr_product) ; $i ++){
                if($val['id'] == $data['data_option'][$i]['name-product']){
                $order_detail= new OrderDetail();
                $order_detail->order_code = $checkout_code;
                $order_detail->product_id = $val['id']; 
                $order_detail->product_name = $val['name']; 
                $order_detail->product_price = $val['price']; 
                $order_detail->product_image = $val['image']; 
                $order_detail->product_serial = $data['data_option'][$i]['serial']; 
                $order_detail->save();
            }
        }
            }
        }  
        }



        foreach($data['data_option'] as $key => $val){
            $serial = new Serial();
            $serial->id_product = $val['name-product'];
            $serial->serial_number = $val['serial'];
            $serial->status = 0;
            $serial->warranty_time = $val['warranty_time'];
            $serial->activate_time = $order->created_at;
            $serial->expired_time = date('Y-m-d H:i:s' , strtotime("+".$val['warranty_time']."months", strtotime($serial->activate_time)));
            $serial->save();
        }

        return redirect()->route('order')->with('message','Lập đơn hàng thành công');
        // echo "<pre>";
        // print_r(  $data['data_option']);die;
    }

    function orderViewDetail($order_code){
        // print_r($order_code);die;
        $product = OrderDetail::where(['order_code'=> $order_code])->get()->toArray();
        $info_order = Order::where(['order_code'=> $order_code])->get()->first()->toArray();

        return view('backend.include.order.order_detail',['product' =>  $product , 'info_order'=> $info_order]);

    }

    function printorder($order_code){
        require_once 'print_pdf/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $product = OrderDetail::where(['order_code'=> $order_code])->get()->toArray();
        $info_order = Order::where(['order_code'=> $order_code])->get()->first()->toArray();


        $output = '';
        $output .= '
        <style>
        table, td, th {
            border: 1px solid;
          }
          
          table {
            width: 100%;
            border-collapse: collapse;
          }
        .text-center{
            text-align: center;
        }
        .mt-20{
            margin: 20px 0 10px 0;
        }
        .order_info_tag{
            font-weight: 600;
        }
        .row{
            line-height: 22px;
        }

        .text-end {
            margin: 0px 0 0px 400px;


        }
        .text-custom{
            display: inline;
        }
        </style>
        <div class="text-center"><h4>Cộng hòa - Xã hội - Chủ nghĩa - Việt Nam</h4></div>
        <div class="text-center"><h4>Độc lập - Tự do - Hạnh Phúc</h4></div>
        <div class="text-end"><p>..............., ngày ...... tháng ...... năm 2022 </p></div>
        <div class="text-center"><h1>Hóa đơn</h1></div>

        <div class="mt-20" > <strong>Thông tin khách hàng</strong></div>
        <div class="order-info ">
            <div class="row">
                <span class="col order_info_tag">Tên khách hàng:</span>
                <span class="col">'.$info_order['name_customer'] .'</span>
            </div>
            
            <div class="row">
                <span class="col order_info_tag">Số điện thoại:</span>
                <span class="col">'.$info_order['phone_customer'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Email:</span>
            <span class="col">'.$info_order['email_customer'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Tỉnh/thành phố:</span>
            <span class="col">'.$info_order['address_city'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Quận/huyện:</span>
            <span class="col">'.$info_order['address_province'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Xã/phường/thị trấn:</span>
            <span class="col">'.$info_order['address_wards'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Ghi chú:</span>
            <span class="col">'.$info_order['note'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Mã đơn:</span>
            <span class="col">'.$info_order['order_code'] .'</span>
            </div>

            <div class="row">
            <span class="col order_info_tag">Ngày mua:</span>
            <span class="col">'.$info_order['created_at'] .'</span>
            </div>

        </div>

        <div class="mt-20" ><strong>Danh sách sản phẩm</strong></div>
        <table class="table table-striped jambo_table bulk_action">
        <thead>
        <tr class="headings">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số serial</th>
            <th>Giá</th>
        </tr>
        </thead>

        <tbody>';
        $totalMoney=0;
        foreach($product as $key => $val){
            $totalMoney += $val['product_price'];

            $output .= '<tr>
            <td>'.($key+1).'</td>
            <td>'.$val['product_name'].'</td>
           
            <td>'.$val['product_serial'].'</td>
            <td>'.number_format($val['product_price']).'đ</td>
                      
        </tr>';
        }


        $output .= ' </tbody>
                    </table>
                    ';

      $output .= '
        <div class="row mt-20">
            <span class="col order_info_tag ">Tổng tiền: </span>
            <span class="col">'.number_format($totalMoney).'</span>
        </div>

        ';
        $output .= '
        
        <span class="text-custom" >Người lập đơn </span>

         ';

        $mpdf->WriteHTML($output);
        $mpdf->Output();
    }
    
}
