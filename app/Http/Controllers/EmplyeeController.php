<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// Session_start();
use App\Emplyee;

class EmplyeeController extends Controller
{
    // view Emplyee page 
    public function index()
    {
        return view('pages.add_emplyee');
    }
    
    // add emplyee Function
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|unique:emplyee|max:255',
            'phone' => 'required|max:25',
            'experience' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'address' => 'required',
            'n_id' => 'required|max:25',
            'photo' => 'required',
        ]);
        $data=array();
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['n_id'] =$request->n_id;
        $data['phone'] =$request->phone;
        $data['experience'] =$request->experience;
        $data['salary'] =$request->salary;
        $data['vacation'] =$request->vacation;
        $data['city'] =$request->city;
        $data['address'] =$request->address;
        $data['status'] =$request->status;
        $image =$request->file('photo');


        
        if($image)
        {
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/emplyee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                DB::table('emplyee')->insert($data);
                Session::put('message','Emplyee added succesfully.....!');
                return Redirect::to('/addemplyee');
            }
        }
        $data['photo']='';
        DB::table('emplyee')->insert($data);
                Session::put('message','Emplyee image added without succesfully.....!');
                return Redirect::to('/addemplyee');
    }

    //emplyee show function here
    public function allemplyee()
    {
        $all_emplyee_info= DB::table('emplyee')->get(); 

        $manage_emplyee= view('pages.all_emplyee')
                         ->with('all_emplyee_info',$all_emplyee_info); 
        return view('layout.admin_layout')
                        ->with('pages.all_emplyee',$manage_emplyee); 
    }

    //unactive function
    public function unactive($emplyee_id)
    {
        DB::table('emplyee')
            ->where('emplyee_id',$emplyee_id)
            ->update(['status' => 0 ]);
            Session::put('message','Emplyee Unactive succesfully.....!');
            return Redirect::to('/allemplyee');
    }

    //Active function
    public function active($emplyee_id)
    {
        DB::table('emplyee')
            ->where('emplyee_id',$emplyee_id)
            ->update(['status' => 1 ]);
            Session::put('message','Emplyee active succesfully.....!');
            return Redirect::to('/allemplyee');
    }

    //Delete Function 
    public function delete($emplyee_id)
    {
        $emplyee_info= DB::table('emplyee')
                       ->where('emplyee_id',$emplyee_id)
                       ->delete();
                       Session::put('message','Product Delete succesfully.....!');
                       return Redirect::to('/allemplyee');
    }
    public function edit($emplyee_id)
    {
        $emplyee_info= DB::table('emplyee')
                       ->where('emplyee_id',$emplyee_id)
                       ->first();

        $manage_emplyee= view('pages.edit_emplyee')
                ->with('emplyee_info',$emplyee_info); 
        return view('layout.admin_layout')
                ->with('pages.edit_emplyee',$manage_emplyee); 
    }

    //Emplyee update function here
    public function updateemplyee(Request $request, $emplyee_id)
    {
        
       $data=array();
      
       $data['name']=$request->name;
       $data['phone']=$request->phone;
       $data['salary']=$request->salary;
       $data['experience']=$request->experience;
       $data['address']=$request->address;
       
       DB::table('emplyee')->where('emplyee_id',$emplyee_id)
       ->update($data);

       Session::put('message','Emplyee Update succesfully.....!');
       return Redirect::to('/allemplyee');
       
    }

    // view single emplyee information
    public function view($emplyee_id)
    {
        $singleemplyee=DB::table('emplyee')
                        ->where('emplyee_id',$emplyee_id)
                        ->first();
             return view('pages.view_emplyee', compact('singleemplyee'));
        
    }
    // cancel function here
    public function cancle()
    {
        return Redirect::to('/allemplyee');
    }
}
