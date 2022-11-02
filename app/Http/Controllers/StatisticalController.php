<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobEmployee;
use App\Models\Admin;
use App\Models\Serial;
use App\Models\Product;
use App\Models\Manufacturer;
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
        
        $array = [];
        foreach($employee as $value){
            if($value['id'] != 5){
                $array[] = $value['id'];
            }
            
        }
        $product = Product::get()->toArray();
        $manufacturer = Manufacturer::get()->toArray();

        $arrayManu = [];
        foreach($manufacturer as $value){
                $arrayManu[] = $value['id']; 
        }

        // echo "<pre>";
        // print_r($arrayManu);die;
        return view('backend.include.statistical.statistical',['jobemployee'=> $jobemployee , 'employee' => $array ,'name' => $employee ,'serial'=>$serial ,'product'=> $product , 'manufacturer' => $arrayManu ,'manufacturerName' => $manufacturer] );
    }
}
