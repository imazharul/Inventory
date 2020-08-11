<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function setting()
    {
        $sett= DB::table('setting')->first();
        return view('pages.setting.setting',compact('sett'));
    }

    //update_setting function here
    public function update_setting(Request $request, $setting_id)
    {
        // $validatedData = $request->validate([
        //     'company_name' => 'required|max:25',
        //     'company_address' => 'required|max:255',
        //     'company_email' => 'required|max:25',
        //     'company_phone' => 'required',
        //     'company_mobile' => 'required',
        //     'company_city' => 'required',
        //     'company_country' => 'required',
        //     'company_zipcode' => 'required',
            
        // ]);
        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_email']=$request->company_email;
        $data['company_phone']=$request->company_phone;
        $data['company_mobile']=$request->company_mobile;
        $data['company_city']=$request->company_city;
        $data['company_country']=$request->company_country;
        $data['company_name']=$request->company_name;
        $data['company_zipcode']=$request->company_zipcode;
        $image =$request->file('company_logo');

        if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['company_logo']=$image_url;
                DB::table('setting')->where('setting_id',$setting_id)
                ->update($data);
                Session::put('message','Logo update succesfully.....!');
                 return Redirect::to('/add_Setting');
            }
        }
        $data['company_logo']='';
        DB::table('setting')->where('setting_id',$setting_id)
        ->update($data);
                Session::put('message','Company logo not added without succesfully.....!');
                  return Redirect::to('/add_Setting');
    }


    
    
}
