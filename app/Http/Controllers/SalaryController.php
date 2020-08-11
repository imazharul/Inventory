<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// Session_start();


class SalaryController extends Controller
{
    //add salary function here
    public function Add_Salary(){
        return view('pages.salary.add_advanced_salary');
    }

    // insert_advance_salary function here
    public function insert_advance_salary(Request $request)
    {
       
        $month= $request->month;
        $emp_id=$request->emp_id;

        $advance_salary=DB::table('salary')
                        ->where('month', $month)
                        ->where('emp_id', $emp_id)
                        ->first();
        if ($advance_salary === NULL) {
                $data=array();
                $data['emp_id'] =$request->emp_id;
                $data['month'] =$request->month;
                $data['year'] =$request->year;
                $data['advance_salary'] =$request->advance_salary;
                $data['status'] =$request->status;

                $advance_salary=DB::table('salary')
                                ->insert($data);

                Session::put('message','Advance Salary added succesfully.....!');
                return Redirect::to('/addsalary');
        }
        else
        {
            Session::put('message','Opessc! already paid this month advance salary');
                return Redirect::to('/addsalary');
        }

        

    }

    //advance_salary_show function here
    public function advance_salary_show()
    {
        $advance_salary=DB::table('salary')
                ->join('emplyee','salary.emp_id','emplyee.emplyee_id')
                ->select('salary.*','emplyee.name','emplyee.salary','emplyee.photo','emplyee.phone')
                ->orderBy('salary_id','DESC')
                ->get();

             return view('pages.salary.all_show_advance_salary', compact('advance_salary'));


        // $all_advance_salary_info= DB::table('salary')->get(); 

        // $manage_ad_salary= view('pages.salary.all_show_advance_salary')
        //                  ->with('all_advance_salary_info',$all_advance_salary_info); 
        // return view('layout.admin_layout')
        //                 ->with('pages.salary.all_show_advance_salary',$manage_ad_salary); 
    }

    //Add_paysalary functon here
    public function Add_paysalary()
    {
        

        $paysalary=DB::table('emplyee')->get();
               
        return view('pages.salary.paysalary', compact('paysalary'));
    }
}
