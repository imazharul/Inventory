@extends('layout.admin_layout')
@section('title')
    All emplyee
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Emplyee</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th> Name</th>
                                  <th> Email</th>
                                  <th> N_id</th>
                                  <th> Photo</th>
                                  <th> Salary</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_emplyee_info as $v_emplyee)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_emplyee->emplyee_id  }}</td>
                                  <td class="center">{{ $v_emplyee->name }}</td>
                                  <td class="center">{{ $v_emplyee->email }}</td>
                                  <td class="center">{{ $v_emplyee->n_id }}</td>

                                  <td><img src="{{URL::to($v_emplyee->photo)}}" style="width: 120px; height: 120px"></td>
                                  <td class="center">{{ $v_emplyee->salary }}</td>
                                  <td class="center">
                                      @if($v_emplyee->status==1)
  
                                          <span class="btn btn-success">
                                              Active
                                          </span>
                                      @else 
                                          <span class="btn btn-danger">
                                              Unactive
                                          </span>
                                      @endif
                                  </td>
  
                              <td class="center">
                                  
                                  @if($v_emplyee->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/unactive',$v_emplyee->emplyee_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/active',$v_emplyee->emplyee_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/edit',$v_emplyee->emplyee_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/delete',$v_emplyee->emplyee_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      <a class="btn btn-primary" href="{{URL::to('/view',$v_emplyee->emplyee_id)}}">
                                        
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