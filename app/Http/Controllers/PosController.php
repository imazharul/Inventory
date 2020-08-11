<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class PosController extends Controller
{
    public function index()
    {
        $product= DB::table('product')
                    ->join('category','product.cat_id','category.category_id')
                    ->select('category.category_name','product.*')
                    ->get();
        $customer= DB::table('customer')->get();
        $category= DB::table('category')->get();
        return view('pages.pos.pos_index', compact('product','customer','category'));
    }

    //new customer add
    
    //PandingOrder
    public function PandingOrder()
    {

        $order_details=DB::table('orderdetails')
                        ->join('customer','orderdetails.customer_id','customer.customer_id')
                        ->select('customer.name','orderdetails.*')
                        ->where('order_status','panding')->get();

        // echo "<pre>";
        // print_r($order_details);
        // exit();
         return view('pages.pos.order_panding_page', compact('order_details'));
    }

    //vieworderstatus
    public function vieworderstatus($orderdetails_id)
    {
        $ordetails= DB::table('orderdetails')
                ->join('customer','orderdetails.customer_id','customer.customer_id')
                //->select('customer.*','orderdetails.*','orderdetails.orderdetails_id as order_id')
                ->where('orderdetails.orderdetails_id',$orderdetails_id)
                ->first();
        
       
        // $order_info= DB::table('order')
        //          ->join('product','order.pro_id','product.product_id')
        //          ->select('order.*','product.product_name','product.product_code')
        //          ->where('order.order_id',$id) // id is missing 
        //          ->get();
       
        return view('pages.pos.order_confirmation', compact('ordetails')); //compact('order_info') 
   

    }

    //OrderApproved
    public function OrderApproved($orderdetails_id)
    {
        $approved= DB::table('orderdetails')->where('orderdetails_id',$orderdetails_id)->update(['order_status'=>'Approved']);
        return Redirect::to('/panding_order');
        
    }
    //SuccessOrder
    public function SuccessOrder()
    {
        $SuccessOrder=DB::table('orderdetails')
        ->join('customer','orderdetails.customer_id','customer.customer_id')
        ->select('customer.name','orderdetails.*')
        ->where('order_status','Approved')->get();

        return view('pages.pos.order_approved_page', compact('SuccessOrder'));
    }

    //DeleteApproved
    public function DeleteApproved($orderdetails_id)
    {
        $app_delete=DB::table('orderdetails')->where('orderdetails_id',$orderdetails_id)->delete();
        Session::put('message',' Approved Order succesfully Delete.....!');
        return Redirect::to('/success_order');
    }
}
