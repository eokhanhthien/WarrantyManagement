<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaimWarranty;
use App\Models\ClaimWarrantyDetail;
use App\Models\JobEmployee;

// Nhân viên
use App\Models\Admin;

use Session;

class ClaimWarrantyController extends Controller
{
    public function index(){
        if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
            // $claimwarranty = ClaimWarranty::paginate(5);;
            $claimwarranty = ClaimWarranty::where(['type'=>1])->paginate(5); 

            return view('backend.include.claimwarranty.index', ['claimwarranty' => $claimwarranty]);
        }
        else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
            return redirect()->route('employee');
            // return view('frontend.pages.checkwarranty');
            
        }
        else{
            return view('backend.login');
        }

    }

    function ClaimWarrantyViewDetail($claim_code){
        // print_r($claim_code);die;
        $claimDetail = ClaimWarrantyDetail::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        $claimwarranty = ClaimWarranty::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        $job = JobEmployee::where(['order_code'=> $claim_code])->get()->first()->toArray();
        $employees=  Admin::where(['role'=> 2])->get()->toArray();
        // $info_order = Order::where(['claim_code'=> $claim_code])->get()->first()->toArray();
        // echo "<pre>";
        // print_r($employees);die;

        return view('backend.include.claimwarranty.claimwarranty_detail',['claimDetail' =>  $claimDetail , 'employees' => $employees ,'claimwarranty' => $claimwarranty ,'job' => $job]);

    }

    function job(Request $request){
        $data =  $request->all();
        $JobEmployee = new JobEmployee();
        $JobEmployee->id_technician = $data['id_technician'];
        $JobEmployee->order_code = $data['claim_code'];
        $JobEmployee->created_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $JobEmployee->save();

        $claimwarranty = ClaimWarranty::where(['claim_code'=>$data['claim_code']])->get()->first();
        $claimwarranty->status = 1;
        $claimwarranty->save();

        return redirect()->route('claim-warranty-show')->with('message','Giao công việc thành công');
    }

    function jobTurn(Request $request , $id){
        $data =  $request->all();

        $JobEmployee = JobEmployee::find($id);
        $JobEmployee->id_technician = $data['id_technician'];
        $JobEmployee->created_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $JobEmployee->save();

        return redirect()->route('claim-warranty-show')->with('message','Chuyển công việc thành công');
    }

}
