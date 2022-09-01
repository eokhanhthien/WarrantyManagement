<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;
class IndexController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }

    public function registerWarranty(){
        $manufacturer = Manufacturer::get()->toArray();
        return view('frontend.pages.registerwarranty',['manufacturer' => $manufacturer]);
    }

    public function checkWarranty(){
        return view('frontend.pages.checkwarranty');
    }
    
    public function addRegisterWarranty(Request $request){
        $data =  $request->all();
        echo "<pre>";
        print_r($data);die;
    }

}
