<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
use App\Product;

class CategoryController extends Controller
{
    // Category index function here
    public function index()
    {
        return view('pages.category.add_category');
    }

    // Add category function here
    public function add_category(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['status']=$request->status;

        $data= DB::table('category')->insert($data);
        Session::put('message','Category added succesfully.....!');
                return Redirect::to('/addcategory');
                
    }
    //show_category function here
    public function show_category()
    {
        $all_category_info= DB::table('category')->get(); 
       
        return view('/pages.category.all_category', compact('all_category_info'));

        // $manage_category= view('pages.category.all_category')
        //                  ->with('all_category_info',$all_category_info); 
        // return view('layout.admin_layout')
        //                 ->with('pages.category.all_category',$manage_category); 

    }

    //delete category function here 
    public function deletecategory($category_id)
    {
       $category_info= DB::table('category')
                       ->where('category_id',$category_id)
                       ->delete();
                       Session::put('message','Category Delete succesfully.....!');
                       return Redirect::to('/allcategory');
    } 

    //unactive function
    public function unactive_category($category_id)
    {
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['status' => 0 ]);
            Session::put('message','Category Unactive succesfully.....!');
            return Redirect::to('/allcategory');
            // return Redirect::to('/allcategory');
    }

    //Active function
    public function active_category($category_id)
    {
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['status' => 1 ]);
            Session::put('message','Category active succesfully.....!');

            return Redirect::to('/allcategory');
    }
    
    //edit category functon here
    public function edit_category($category_id)
    {
        $category_info= DB::table('category')
                       ->where('category_id',$category_id)
                       ->first();
        return view('pages.category.edit_category')->with('category_info',$category_info);

        // $manage_emplyee= view('pages.edit_emplyee')
        //         ->with('emplyee_info',$emplyee_info); 
        // return view('layout.admin_layout')
        //         ->with('pages.edit_emplyee',$manage_emplyee); 
    }

    //update_category function here
    public function update_category(Request $request, $category_id)
    {
        $data=array();
      
       $data['category_name']=$request->category_name;
       
       DB::table('category')->where('category_id',$category_id)
       ->update($data);

       Session::put('message','category Update succesfully.....!');
       return Redirect::to('/allcategory');
    }
}
