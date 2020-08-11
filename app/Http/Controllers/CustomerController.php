<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// Session_start(); 
use App\Customer;

class CustomerController extends Controller
{
   public function index()
   {
       return view('pages.customer.add_customer');
   }

   // add Customer Function
   public function savecustomer(Request $request)
   {
    $validatedData = $request->validate([
        'name' => 'required|max:25',
        'email' => 'required|unique:emplyee|max:255',
        'phone' => 'required|max:25',
        'shopname' => 'required|max:25',
        'bank_name' => 'required',
        'bank_branch' => 'required',
        'bank_holder' => 'required',
        'bank_number' => 'required',
        'address' => 'required',
        'city' => 'required|max:25',
        
    ]);

    $data=array();
    $data['name'] =$request->name;
    $data['email'] =$request->email;
    $data['phone'] =$request->phone;
    $data['shopname'] =$request->shopname;
    $data['bank_name'] =$request->bank_name;
    $data['bank_branch'] =$request->bank_branch;
    $data['bank_holder'] =$request->bank_holder;
    $data['bank_number'] =$request->bank_number;
    $data['city'] =$request->city;
    $data['address'] =$request->address;
    $data['status'] =$request->status;
    $image =$request->file('photo');

    if($image)
    {
        $image_name=str_random(5);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/customer/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);

        if($success){
            $data['photo']=$image_url;
            DB::table('customer')->insert($data);
            Session::put('message','customer added succesfully.....!');
            return Redirect()->back();
        }
    }
    $data['photo']='';
    DB::table('customer')->insert($data);
            Session::put('message','customer image added without succesfully.....!');
            return Redirect()->back();

   }

   //view customer data
   public function view_customer()
   {
    $all_customer_info= DB::table('customer')->get(); 

    $manage_customer= view('pages.customer.all_customer')
                     ->with('all_customer_info',$all_customer_info); 
    return view('layout.admin_layout')
                    ->with('pages.customer.all_customer',$manage_customer); 
   }
   //customer unactive functin 

   public function uunactive($customer_id)
   {
        DB::table('customer')
        ->where('customer_id',$customer_id)
        ->update(['status' => 0 ]);
        Session::put('message','Customer Unactive succesfully.....!');
        return Redirect::to('/allcustomer');
   }
   //customer active functin 

   public function aactive($customer_id)
    {
        DB::table('customer')
        ->where('customer_id',$customer_id)
        ->update(['status' => 1 ]);
        Session::put('message','Customer active succesfully.....!');
        return Redirect::to('/allcustomer');
   }
   //Delete Function 

   public function ddelete($customer_id)
   {
       $customer_info= DB::table('customer')
                      ->where('customer_id',$customer_id)
                      ->delete();
                      Session::put('message','Customer Delete succesfully.....!');
                      return Redirect::to('/allcustomer');
   }

   // edit customer information
   public function eedit($customer_id)
   {
        $customer_info= DB::table('customer')
        ->where('customer_id',$customer_id)
        ->first();

        $manage_customer= view('pages.customer.edit_customer')
        ->with('customer_info',$customer_info); 
        return view('layout.admin_layout')
        ->with('pages.customer.edit_customer',$manage_customer);
   }

   // Update customer information
   public function updatecustomer(Request $request, $customer_id)
   {
        $data=array();
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['phone'] =$request->phone;
        $data['shopname'] =$request->shopname;
        $data['bank_name'] =$request->bank_name;
        $data['bank_branch'] =$request->bank_branch;
        $data['bank_holder'] =$request->bank_holder;
        $data['bank_number'] =$request->bank_number;
        $data['city'] =$request->city;
        $data['address'] =$request->address;
        
        DB::table('customer')->where('customer_id',$customer_id)
        ->update($data);

        Session::put('message','Emplyee Update succesfully.....!');
        return Redirect::to('/allcustomer');
   }

     public function vview($customer_id)
    {
        $single_customer=DB::table('customer')
                        ->where('customer_id',$customer_id)
                        ->first();
             return view('pages.customer.view_customer', compact('single_customer'));
        
    }

    public function ccancle()
    {
        return Redirect::to('/allcustomer');
    }
}
