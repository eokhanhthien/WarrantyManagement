<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Serial;
use Session;

class ProductController extends Controller
{
    public function index(){
        if(Session::get('admin') != NULL && Session::get('admin')['role'] === 1){
            // $claimwarranty = ClaimWarranty::paginate(5);;

            $data = Product::paginate(5);
            return view('backend.include.product.index',['data' => $data]);
        }
        else if(Session::get('admin') != NULL && Session::get('admin')['role'] === 2){
            return redirect()->route('employee');
            // return view('frontend.pages.checkwarranty');
            
        }
        else{
            return view('backend.login');
        }

    }

    public function productAdd(){
        $data_manu = Manufacturer::get()->toArray();
        return view('backend.include.product.add',['data_manu' => $data_manu]);
    }

    public function add(Request $request){
        $data = $request->all();
        $product = new Product();
        $product->id_manu = $data['id_manu'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->created_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $product->updated_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
        // Thêm ảnh vào folder
        $get_image = $request->image;
        $path = 'uploads/product/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $product->image = $new_image;
        $product->save();
        return redirect()->route('product')->with('message','Thêm sản phẩm thành công');

    }

    public function productEdit($id){
        $data_manu = Manufacturer::get()->toArray();
        $data = Product::find($id)->toArray();
        return view('backend.include.product.edit',['data' => $data,'data_manu' => $data_manu]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $product =  Product::find($id);
        $product->id_manu = $data['id_manu'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        // $product->created_at = $data['created_at'];
        $product->updated_at = gmdate('Y-m-d H:i:s', time() + 7*3600);
        // Thêm ảnh vào folder
        $get_image = $request->image;
        if($get_image){
            // Bỏ hình ảnh cũ
            $path_unlink = 'uploads/product/'.$product->image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
            // Thêm mới
            $path = 'uploads/product/';
            $get_name_image = $get_image-> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $product->image = $new_image;
        }

        $product->save();
        return redirect()->route('product')->with('message','Sửa sản phẩm thành công');
    }
    public function deleteProduct($id){
        $product =  Product::find($id);
        $serial = Serial::find($id);

        $path_unlink = 'uploads/product/'.$product->image;
        if(file_exists($path_unlink)){
            unlink($path_unlink);
        }
        $product -> delete();
        // $serial -> delete();
        return redirect()->route('product')->with('message','Xóa sản phẩm thành công');
    }

}
