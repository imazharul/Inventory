<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Attendance;
class AttendanceController extends Controller
{
    public function takeattendance()
    {
        $emplyee =DB::table('emplyee')->get();
        return view('pages.attendance.take_attendance', compact('emplyee'));
    }

    //saveattendance function here
    public function saveattendance(Request $request)
    {

        $date = $request->attendance_date;
        $att_date = DB::table('attendance')->where('attendance_date',$date)->first();

        if($att_date){
            Session::put('message','Today allready attendance teken...!');
                    return Redirect::to('/take_attendance');
        }
        else{
            foreach ($request->user_id as $attendance_id) {
                $data[]=[
                    "user_id"=>$attendance_id,
                    "attendance"=>$request->attendance[$attendance_id],
                    "attendance_date"=>$request->attendance_date,
                    "attendance_year"=>$request->attendance_year,
                    "month"=>$request->month,
                    "edit_attandence"=>date('d_m_y')
                ];
            }
            $att= DB::table('attendance')->insert($data);
            Session::put('message','attendance added succesfully.....!');
                    return Redirect::to('/take_attendance');
        }
        
    }

    //allattendance function here
    public function allattendance()
    {
        $all_atten = DB::table('attendance')->select('edit_attandence')->groupBy('edit_attandence')->get();

        return view('pages.attendance.all_attendance', compact('all_atten'));
    }

    // edit attendance function here
    public function editattendance($edit_attandence)
    {
        $date=DB::table('attendance')->where('edit_attandence',$edit_attandence)->first();
        $data=DB::table('attendance')
        ->join('emplyee','attendance.user_id','emplyee.emplyee_id')
        ->select('emplyee.name','emplyee.photo','attendance.*')
        ->where('edit_attandence',$edit_attandence)->get();
        
        return view('pages.attendance.edit_attendance', compact('data','date'));
    }

    //updateattendance function here
    public function Updateattendance(Request $request)
    {
        
        
            foreach ($request->attendance_id as $attendance_id) {
                $data=[
                    "attendance"=>$request->attendance[$attendance_id],
                    "attendance_date"=>$request->attendance_date,
                    "attendance_year"=>$request->attendance_year,
                    "month"=>$request->month
                    
                ];
            }
      $attan =Attendance::where(['attendance_date' =>$request->edit_attandence, 'attendance_id'=>$attendance_id])->first();
      $attan->update($data);
      return view('pages.attendance.all_attendance');
        
    }

    //viewattendance function here
    public function viewattendance($edit_attandence)
    {
        $date=DB::table('attendance')->where('edit_attandence',$edit_attandence)->first();
        $data=DB::table('attendance')
        ->join('emplyee','attendance.user_id','emplyee.emplyee_id')
        ->select('emplyee.name','emplyee.photo','attendance.*')
        ->where('edit_attandence',$edit_attandence)->get();
        
        return view('pages.attendance.view_attendance', compact('data','date'));
    }
}
