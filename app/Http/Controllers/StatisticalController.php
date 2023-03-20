<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobEmployee;
use App\Models\Admin;
use App\Models\Serial;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\RepairService;
use App\Models\InfoCustomerRegister;
use App\Models\Order;

use App\Models\Revenue;

use Session;

class StatisticalController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $jobemployee = JobEmployee::get()->toArray();
        $employee = Admin::get()->toArray();
        $serial = Serial::get()->toArray();
        $revenue = Revenue::get()->toArray();
        
        $array = [];
        foreach($employee as $value){
            if($value['id'] != 5){
                $array[] = $value['id'];
            }
            
        }
        $product = Product::get()->toArray();
        $repairService = RepairService::get()->toArray();
        $infoCustomerRegister = InfoCustomerRegister::get()->toArray();
        $manufacturer = Manufacturer::get()->toArray();

        $arrayManu = [];
        foreach($manufacturer as $value){
                $arrayManu[] = $value['id']; 
        }

        // echo "<pre>";
        // print_r($arrayManu);die;
        return view('backend.include.statistical.statistical',['jobemployee'=> $jobemployee , 'employee' => $array ,'name' => $employee ,'serial'=>$serial ,'product'=> $product , 'manufacturer' => $arrayManu ,'manufacturerName' => $manufacturer , 'repairService' => $repairService , 'infoCustomerRegister' => $infoCustomerRegister, 'revenue' => $revenue] );
    }

    function statisticalDetail(){
        $jobemployee = JobEmployee::get()->toArray();
        $order = Order::get()->toArray();
        $ordertotal = Order::get()->toArray();
        $employee = Admin::get()->toArray();
        $array = [];
        foreach($employee as $value){
            if($value['id'] != 5){
                $array[] = $value['id'];
            }
            
        }
        return view('backend.include.statistical.statisticalDetail',['jobemployee'=> $jobemployee, 'order' => $order, 'ordertotal'=> $ordertotal,'employee' => $array ,'name' => $employee ] );
    }
    

    function getStatisticalDetail(Request $request){
        $data = $request->all();
        if(isset($data["startDate"]) != "" && $data["endDate"] != "" ){

            $jobemployee = JobEmployee::whereBetween('created_at', [$data["startDate"], $data["endDate"]])->get()->toArray();
            $order = Order::whereBetween('created_at', [$data["startDate"], $data["endDate"]])->get()->toArray();
            $ordertotal = Order::get()->toArray();

            $employee = Admin::get()->toArray();
            $array = [];
            foreach($employee as $value){
                if($value['id'] != 5){
                    $array[] = $value['id'];
                }
                
            }
            // print_r($jobemployee);die;
            return view('backend.include.statistical.Loadstatistical',['jobemployee'=> $jobemployee, 'order' => $order, 'ordertotal'=> $ordertotal,'employee' => $array ,'name' => $employee ] );
    }else{
        statisticalDetail();
    }

}
    
}
