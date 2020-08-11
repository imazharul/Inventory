@extends('layout.admin_layout')
@section('title')
    Take attendance
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/save_attendance') }}" method="post" enctype="multipart/form-data">
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
                            <h2><i class="halflings-icon user"></i><span class="break"></span>Emplyee Attendance</h2>

                        </div>
                        
                        <div>
                            <h2 class="text-success align-center">Today Attandence : {{date('d-m-y')}}</h2>
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
    
                              @foreach ($emplyee as $v_user)
                             
                              <tbody>
                                  <tr>
                                      <td>{{ $v_user->emplyee_id  }}</td>
                                      <td class="center">{{ $v_user->name }}</td>
                                      
                                      <td><img src="{{URL::to($v_user->photo)}}" style="width: 120px; height: 120px"></td>
                                    <input type="hidden" name="user_id[]" value="{{ $v_user->emplyee_id }}">
                                
                                    <td class="center">
                                         <div class="control-group">
										    <div class="controls">
										      <label class="checkbox inline">
										        <input type="checkbox" value="present" name="attendance[{{$v_user->emplyee_id}}]" > Present
										      </label>
										      <label class="checkbox inline">
										        <input type="checkbox" value="absance" name="attendance[{{$v_user->emplyee_id}}]"> Absence
										      </label>
										    </div>
										  </div>
										  
                                    <input type="hidden" name="attendance_date" value="{{ date('d-m-y') }}">
                                    <input type="hidden" name="attendance_year" value="{{ date('Y') }}">
                                    <input type="hidden" name="month" value="{{ date('F') }}">
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
                <button type="submit" class="btn btn-primary">Take Attendance </button>
                <button type="reset" class="btn">Cancel</button>
              </div>
            </form>   
            
            
        </div>
    </div><!--/span-->
    


    @endsection