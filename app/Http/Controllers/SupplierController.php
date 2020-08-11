<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// Session_start();
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('pages.supplier.add_supplier');
    }
    
    //saveaddsupplier function
    public function saveaddsupplier(Request $request)
    {
        
        $data=array();
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['phone'] =$request->phone;
        $data['shop'] =$request->shop;
        $data['type'] =$request->type;
        $data['bankname'] =$request->bankname;
        $data['bankbranch'] =$request->bankbranch;
        $data['bankholder'] =$request->bankholder;
        $data['banknumber'] =$request->banknumber;
        $data['city'] =$request->city;
        $data['address'] =$request->address;
        $data['status'] =$request->status;
        $image =$request->file('photo');
        
        
        if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
    
            if($success){
                $data['photo']=$image_url;
                DB::table('supplier')->insert($data);
                Session::put('message','supplier added succesfully.....!');
                return Redirect::to('/addsupplier');
            }
        }
        $data['photo']='';
        DB::table('supplier')->insert($data);
                Session::put('message','supplier image added without succesfully.....!');
                return Redirect::to('/addsupplier');

    }
    //supplierstor function 
    public function supplierstor()
    {
        $all_supplier_info= DB::table('supplier')->get(); 

    $manage_supplier= view('pages.supplier.all_supplier')
                     ->with('all_supplier_info',$all_supplier_info); 
    return view('layout.admin_layout')
                    ->with('pages.supplier.all_supplier',$manage_supplier); 
    }

    //unactive_supplier function here 
    public function unactive_supplier($supplier_id)
    {
        DB::table('supplier')
        ->where('supplier_id',$supplier_id)
        ->update(['status' => 0 ]);
        Session::put('message','Emplyee Unactive succesfully.....!');
        return Redirect::to('/allsupplier');
    }

    //active_supplier function here 
    public function active_supplier($supplier_id)
    {
        DB::table('supplier')
        ->where('supplier_id',$supplier_id)
        ->update(['status' => 1 ]);
        Session::put('message','supplier Unactive succesfully.....!');
        return Redirect::to('/allsupplier');

    }
    // delete supplier function here 
    public function delete_supplier($supplier_id)
    {
        $supplier_info= DB::table('supplier')
                       ->where('supplier_id',$supplier_id)
                       ->delete();
                       Session::put('message','supplier Delete succesfully.....!');
                       return Redirect::to('/allsupplier');
    }
    // view_supplier function here.......
    public function view_supplier($supplier_id)
    {
        $single_supplier=DB::table('supplier')
                        ->where('supplier_id',$supplier_id)
                        ->first();
             return view('pages.supplier.view_supplier', compact('single_supplier'));
    }

    //cancle_supplier function here
    public function m()
    {
        return Redirect::to('/allsupplier');
    }
    // edit function here
    public function edit_supplier($supplier_id)
    {
        $all_supplier_info= DB::table('supplier')
        ->where('supplier_id',$supplier_id)
        ->first();

        $manage_supplier= view('pages.supplier.edit_supplier')
                     ->with('all_supplier_info',$all_supplier_info); 
    return view('layout.admin_layout')
                    ->with('pages.supplier.edit_supplier',$manage_supplier); 
    }
    // update function here
    public function update_supplier(Request $request, $supplier_id)
    {
        $data=array();
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['phone'] =$request->phone;
        $data['shop'] =$request->shop;
        $data['type'] =$request->type;
        $data['bankname'] =$request->bankname;
        $data['bankbranch'] =$request->bankbranch;
        $data['bankholder'] =$request->bankholder;
        $data['banknumber'] =$request->banknumber;
        $data['city'] =$request->city;
        $data['address'] =$request->address;

        DB::table('supplier')->where('supplier_id',$supplier_id)
        ->update($data);

        Session::put('message','supplier Update succesfully.....!');
        return Redirect::to('/allsupplier');
    }
}

