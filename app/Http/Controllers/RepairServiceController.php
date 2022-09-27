<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobEmployee;
use App\Models\RepairService;

use Session;

class RepairServiceController extends Controller
{
    public function index(){
        if( !Session::get('admin'))
        {
            return view('backend.login');

        } 
        $RepairService = RepairService::paginate(5);

        return view('backend.include.repairservice.index',['data'=> $RepairService] );
    }


    function add(){
        return view('backend.include.repairservice.add');
    }

    function addRepairService(Request $request){
        $data = $request->all();
        // print_r( $data);die;
        $repairservice = new RepairService;
        $repairservice->name = $data['name'];
        $repairservice->price = $data['price'];
        $repairservice->save();
        return redirect()->route('repair-service')->with('message','Thêm dịch vụ sữa chữa thành công');

    }

    function edit($id){
        $data =  RepairService::find($id)->toArray();        
        return view('backend.include.repairservice.edit',['data' => $data]);

    }

    function update(Request $request, $id){
        $data = $request->all();
        $repairservice =  RepairService::find($id);
        $repairservice->name = $data['name'];
        $repairservice->price = $data['price'];

        $repairservice -> save();
        return redirect()->route('repair-service')->with('message','Sửa dịch vụ sữa chữa thành công');

    }

    function deletete($id){
        $repairservice =  RepairService::find($id);
        $repairservice -> delete();
        return redirect()->route('repair-service')->with('message','Xóa dịch vụ sữa chữa thành công');
    }

}