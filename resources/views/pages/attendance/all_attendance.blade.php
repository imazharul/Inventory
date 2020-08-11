@extends('layout.admin_layout')
@section('title')
    All attendance
@endsection

@section('content')

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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All attendance</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th> Attendance Date</th>    
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_atten as $v_attendance)
						 
                          <tbody>
                              <?php
                                $sl=1;
                                ?>
                              <tr>
                                <td>{{ $sl++  }}</td>
                                <td class="center">{{ $v_attendance->edit_attandence }}</td>
                              <td class="center">
                                  <a class="btn btn-info" href="{{URL::to('/edit_attendance',$v_attendance->edit_attandence)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/deleteattendance',$v_attendance->edit_attandence)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
									  </a>
									  <a class="btn btn-primary" href="{{URL::to('/view_attendance',$v_attendance->edit_attandence)}}">
                                        
                                        <i class="halflings-icon fas fa-street-view"></i>
                                      
                                    </a>
                                  </td>
                              </tr>
                          </tbody>
  
                      @endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
            </div><!--/row-->
@endsection