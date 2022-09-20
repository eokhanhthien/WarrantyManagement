<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaimWarranty;
use App\Models\ClaimWarrantyDetail;
use Session;

class ClaimWarrantyController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $claimwarranty = ClaimWarranty::paginate(5);;

        return view('backend.include.claimwarranty.index', ['claimwarranty' => $claimwarranty]);
    }

    function ClaimWarrantyViewDetail($claim_code){
        // print_r($claim_code);die;
        $claimDetail = ClaimWarrantyDetail::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        // $info_order = Order::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        // echo "<pre>";
        // print_r($claimDetail);die;

        return view('backend.include.claimwarranty.claimwarranty_detail',['claimDetail' =>  $claimDetail ]);

    }
}
