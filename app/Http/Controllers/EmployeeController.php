<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobEmployee;
use App\Models\ClaimWarrantyDetail;

use Session;

class EmployeeController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $jobemployee = JobEmployee::where(['id_technician' => Session::get('admin')['id']])->paginate(5);

        return view('backend.includeTechnicians.jobs',['jobemployee'=> $jobemployee] );
    }

    function viewDtail($claim_code){
        $claimDetail = ClaimWarrantyDetail::where(['claim_code'=> $claim_code])->get()->first()->toArray();

        return view('backend.includeTechnicians.claimwarranty_detail',['claimDetail' =>  $claimDetail]);

    }
}
