<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// Session_start();
class ExpencesController extends Controller
{
    public function index()
    {
        return view('pages.expences.add_expences');
    }

    //saveaddexpences function here
    public function saveaddexpences(Request $request)
    {
        $validatedData = $request->validate([
            'month' => 'required',
            'date' => 'required',
            'year' => 'required',
            'amount' => 'required',
            'details' => 'required',
            
        ]);

        $data=array();
        $data['month']=$request->month;
        $data['date']=$request->date;
        $data['year']=$request->year;
        $data['amount']=$request->amount;
        $data['details']=$request->details;

        DB::table('expences')->insert($data);
                Session::put('message','Expences added succesfully.....!');
                return Redirect::to('/add_expences');
        
    }
    //all expenses function here
    public function show_expences()
    {
        $expences_info= DB::table('expences')->get();

        return view('pages.expences.all_expences', compact('expences_info'));
    }
    //delete_expences function here
    public function dxp($expences_id )
    {
        
        DB::table('expences')
        ->where('expences_id', $expences_id )
        ->delete();
        Session::put('message','expences Delete succesfully.....!');
        return Redirect::to('/allexpences');
    }

    // today expences function here
    public function todayexpences()
    {
        $date= date('d-m-y');
        $today= DB::table('expences')->where('date',$date)->get();
        
        return view('pages.expences.today_expences', compact('today'));
    }
    // Edit today page show function here
    public function edittoday($expences_id)
    {
        $edit_expences_info= DB::table('expences')
                       ->where('expences_id',$expences_id)
                       ->first();
        return view('pages.expences.edit_today_expences', compact('edit_expences_info'));
    }
    //updateexpences function here
    public function updateexpences(Request $request,$expences_id)
    {
        $data=array();
        // $data['month']=$request->month;
        // $data['date']=$request->date;
        // $data['year']=$request->year;
        $data['amount']=$request->amount;
        $data['details']=$request->details;

        DB::table('expences')->where('expences_id',$expences_id)
       ->update($data);

                Session::put('message','Expences Update succesfully.....!');
                 return Redirect::to('/today_expences');
    }

    //monthly expences function here
    public function monthly_ex_show()
    {
        $month= date('F');
        
        $monthly= DB::table('expences')->where('month',$month)->get();
        
        return view('pages.expences.monthly_expences', compact('monthly'));
    }

    //yearly_ex_show function here
    public function yearly_ex_show()
    {
        $year= date('Y');
        
        $yearly= DB::table('expences')->where('year',$year)->get();
        
        return view('pages.expences.year_expences', compact('yearly'));
    }

    // 12 Month Function here 
    public function January()
    {
        $month= "January";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function February()
    {
        $month= "February";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function March()
    {
        $month= "March";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function April()
    {
        $month= "April";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function May()
    {
        $month= "May";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function June()
    {
        $month= "June";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function July()
    {
        $month= "July";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function August()
    {
        $month= "August";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function September()
    {
        $month= "September";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function October()
    {
        $month= "October";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function November()
    {
        $month= "November";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }
    public function December()
    {
        $month= "December";
        $monthly= DB::table('expences')->where('month',$month)->get();
        return view('pages.expences.monthly_expences', compact('monthly'));
    }

}
