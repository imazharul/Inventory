<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product.add_product');
    }

    //addproduct function here
    public function add_product(Request $request)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['product_buy_date']=$request->product_buy_date;
        $data['product_expire_date']=$request->product_expire_date;
        $data['product_buying_price']=$request->product_buying_price;
        $data['product_selling_price']=$request->product_selling_price;
        $data['status']=$request->status;
        $image =$request->file('product_image');

        if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                DB::table('product')->insert($data);
                Session::put('message','product added succesfully.....!');
                return Redirect::to('/add_product');
            }
        }
        $data['product_image']='';
        DB::table('product')->insert($data);
                Session::put('message','product image added without succesfully.....!');
                return Redirect::to('/add_product');
    }

    //  Show product function here
    public function all_product()
    {
        $all_product_info= DB::table('product')->get(); 

        $manage_product= view('pages.product.all_product')
                         ->with('all_product_info',$all_product_info); 
        return view('layout.admin_layout')
                        ->with('pages.product.all_product',$manage_product); 
    }
    //unactive_product function here
    public function unactive_product($product_id)
    {
        DB::table('product')
        ->where('product_id', $product_id)
        ->update(['status' => 0 ]);
        Session::put('message','product Unactive succesfully.....!');
        return Redirect::to('/all_product');
    }
    //active_product function here
    public function active_product($product_id)
    {
        DB::table('product')
        ->where('product_id', $product_id)
        ->update(['status' => 1 ]);
        Session::put('message','product Unactive succesfully.....!');
        return Redirect::to('/all_product');
    }
    //detete_product function here
    public function delete_product($product_id)
    {
        $product_info= DB::table('product')
        ->where('product_id',$product_id)
        ->delete();
        Session::put('message','product Delete succesfully.....!');
        return Redirect::to('/all_product');
    }
    //edit_product function here
    public function edit_product($product_id)
    {
        $product_info= DB::table('product')
                       ->where('product_id',$product_id)
                       ->first();
        return view('pages.product.edit_product')->with('product_info',$product_info);
    }
    //update_product function 
    public function updateproduct(Request $request, $product_id)
    {
        $data=array();
        $data['product_name'] =$request->product_name;
        $data['product_code'] =$request->product_code;
        $data['product_garage'] =$request->product_garage;
        $data['product_route'] =$request->product_route;
        $data['product_buy_date'] =$request->product_buy_date;
        $data['product_expire_date'] =$request->product_expire_date;
        $data['product_buying_price'] =$request->product_buying_price;
        $data['product_selling_price'] =$request->product_selling_price;
        

       

        DB::table('product')->where('product_id',$product_id)
        ->update($data);

        Session::put('message','product Update succesfully.....!');
        return Redirect::to('/all_product');
    }

    //product view here
    public function viewproduct($product_id)
    {
        $view_product_info=DB::table('product')
                        ->join('category','product.cat_id','category.category_id')
                        ->join('supplier','product.sup_id','supplier.supplier_id')
                        ->select('product.*','category.category_name','supplier.name')
                        ->where('product.product_id',$product_id)
                        ->first();

         return view('pages.product.view_products',compact('view_product_info'));
      
    }

    //cancle_pro function here
    public function pcancle()
    {
        return Redirect::to('/all_product');
    }

    // Import and Export function here
    public function importproduct()
    {
        return view('pages.product.import_page');
    }
    //export function here
    public function export() 
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }
    //import function here
    public function import(Request $request)
    {
        $import= Excel::import(new ProductImport, $request->file('import_file'));
        
        Session::put('message','product Update succesfully.....!');
        return Redirect::to('/import_product');
    }
}
