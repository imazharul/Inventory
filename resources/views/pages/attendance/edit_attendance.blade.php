@extends('layout.admin_layout')
@section('title')
    Edit attendance
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/updateattendance') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <p class="alert-success text align-center">
                    <?php
        
                      $message=Session::get('message');
                      if($message)
                      {
                        echo $message;
                        Session::put('message',null);
                      }	
        
                    ?>
                  </p>
                <div class="row-fluid sortable">		
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Update Attendance Date:   <strong style="color: red"> {{ $date->attendance_date }}</strong></h2>

                        </div>
                        
                        <div>
                            {{-- <h2 class="text-success align-center">Today Attandence : {{date('d-m-y')}}</h2> --}}
                        </div>

                        <div class="box-content">
                            <table id="datatableid" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                    <th> ID</th>
                                      <th> Name</th>
                                      <th> Photo</th>
                                      <th> Attendance</th>
                                  </tr>
                              </thead>   
    
                              @foreach ($data as $v_user)
                             
                              <tbody>
                                  <tr>
                                      <td>{{ $v_user->attendance_id }}</td>
                                      <td class="center">{{ $v_user->name }}</td>
                                      <td><img src="{{URL::to($v_user->photo)}}" style="width: 120px; height: 120px"></td>
                                   
                                      <input type="hidden" name="attendance_id" value="{{ $v_user->attendance_id  }}" >
                                
                                    <td class="center">
                                         <div class="control-group">
                                      <div class="controls">
                                        <label class="checkbox inline">
                                          <input type="checkbox" value="present" name="attendance[{{$v_user->attendance_id }}]" <?php if ($v_user->attendance == 'present') {
                                            echo "checked";} ?> > Present
                                        </label>
                                        <label class="checkbox inline">
                                          <input type="checkbox" value="absance" name="attendance[{{$v_user->attendance_id }}]"<?php if ($v_user->attendance == 'absance') {
                                            echo "checked";
                                          }?>> Absence
                                        </label>
                                      </div>
                                    </div>
										  
                                    <input type="hidden" name="attendance_date" value="{{ date('d-m-y') }}">
                                    <input type="hidden" name="attendance_year" value="{{ date('Y') }}">
                                    </td>
                                  </tr>
                              </tbody>
      
                          @endforeach
    
                          </table>            
                        </div>
                    </div><!--/span-->
                
                </div><!--/row-->
              </fieldset>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Attendance </button>
                <button type="reset" class="btn">Cancel</button>
              </div>
            </form>   
            
            
        </div>
    </div><!--/span-->
    


    @endsection