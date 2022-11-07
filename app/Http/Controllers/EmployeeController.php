<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobEmployee;
use App\Models\ClaimWarrantyDetail;
use App\Models\ClaimWarranty;
use App\Models\RepairService;
use App\Models\JobDetail;
use Session;

class EmployeeController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $jobemployee = JobEmployee::where(['id_technician' => Session::get('admin')['id']])->orderBy('id', 'DESC')->paginate(5);

        return view('backend.includeTechnicians.jobs',['jobemployee'=> $jobemployee] );
    }

    function viewDtail($claim_code){
        $claimDetail = ClaimWarrantyDetail::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        // print_r($claimDetail);die;
        $jobemployee = JobEmployee::where(['order_code'=> $claim_code])->get()->first()->toArray();
        $repairservice = RepairService::get()->toArray();

        $JobDetail = JobDetail::where(['order_code'=> $claim_code])->get()->toArray();;
        if(isset($JobDetail) && $JobDetail != '' ){
            return view('backend.includeTechnicians.claimwarranty_detail',['claimDetail' =>  $claimDetail ,'repairservice'=> $repairservice,'jobemployee'=> $jobemployee , 'JobDetail' => $JobDetail]);
        }
        return view('backend.includeTechnicians.claimwarranty_detail',['claimDetail' =>  $claimDetail ,'repairservice'=> $repairservice,'jobemployee'=> $jobemployee]);

    }

    function solution(Request $request){
        $data =  $request->all();
        echo "<pre>";
        // print_r($data);die;
        $repairservice = RepairService::whereIn('id', $data['repair'])->get()->toArray();
        $repair = json_encode($repairservice);
        $JobDetail = new JobDetail();
        $JobDetail->repair = $repair;
        $JobDetail->note = $data['note'];
        $JobDetail->order_code = $data['order_code'];
        $JobDetail->save();

        $JobEmployee =  JobEmployee::find($data['id']);
        // print_r($JobEmployee);die;

            $JobEmployee->status = $data['solution'];
            $claimWarranty = ClaimWarranty::where(['claim_code'=> $JobEmployee['order_code']])->get()->first();
            $claimWarranty->status = $data['solution'];
            $claimWarranty->save();
            $JobEmployee->save();
    
            return redirect()->back();
    }

    function comfirmFisnish($claim_code){
            $jobemployee = JobEmployee::where(['order_code'=> $claim_code])->get()->first();
            $claimWarranty = ClaimWarranty::where(['claim_code'=> $claim_code])->get()->first();
            // print_r($claimWarranty);die;
            $claimWarranty->status = 5;
            $jobemployee->status = 5;
            $claimWarranty->save();
            $jobemployee->save();
    
            return redirect()->back();
    }

    function infomationTaff(){
        return view('backend.includeTechnicians.infomationTaff' );
    }

    function map(){
        return view('backend.includeTechnicians.map' );
    }
}
