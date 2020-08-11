<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;

class CartController extends Controller
{
    // Cart added function here
    public function index(Request $request)
    {
        $data= array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;

        Cart::add($data);
        Session::put('message',' added succesfully.....!');
        return Redirect()->back();
    }

    //cart update
    public function CartUpdate(Request $request, $id)
    {
        $quantity=$request->quantity;

        // Cart::update($rowId, $quantity);
        Cart::update($quantity);
        return Redirect()->back();
        Session::put('message',' added succesfully.....!');
       
    }
    //cart remove 
    public function Cartremove($id)
    {
        Cart::remove($id,0);
        return Redirect()->back();
    }

    // create invoice
    public function createinvoice(Request $request)
    {
        //   $contents=Cart::getContent(); // Show cart all data...... 
        // echo "<pre>";
        // print_r($contents);
        // exit();
          // $cus_id=$request->cus_id;
        // echo "$cus_id";
        // $validatedData = $request->validate([
        //     'cus_id' => 'required',
        // ]);
        $request->validate([
                'cus_id' => 'required',
        ],[
            'cus_id.required' => 'Select A customer first !',
            ]);

            $cus_id=$request->cus_id;
            
            $customer=DB::table('customer')->where('customer_id',$cus_id)->first();
            $contents=Cart::getContent();
            // echo "<pre>";
            // print_r($contents);
            // exit();
         return view('pages.cart.invoice', compact('customer','contents'));

     }

     //PaymentInvoice function here
     public function PaymentInvoice(Request $request)
     {
        $data= array();
            $data['customer_id']=$request->customer_id;
            $data['order_date']=$request->order_date;
            $data['order_status']=$request->order_status;
            $data['total_product']=$request->total_product;
            $data['sub_total']=$request->sub_total;
            $data['vat']=$request->vat;
            $data['total']=$request->total;
            $data['payment_status']=$request->payment_status;
            $data['pay']=$request->pay;
            $data['due']=$request->due;
        $order_id=DB::table('orderdetails')->insertGetID($data);
        $contents=Cart::getContent();
            $odata=array();
            foreach($contents as $v_content)
            {
                $odata['order_id']=$order_id;
                $odata['pro_id']=$v_content->id;
                $odata['quantity']=$v_content->quantity;
                $odata['unitcost']=$v_content->price;
                $odata['total']=$v_content->price*$v_content->quantity;
            $insertodata=DB::table('order')->insert($odata);
            }
            
            Session::put('message','Invoice added succesfully.....!');
            Cart::clear();
            return Redirect::to('/panding_order');

     }
}
