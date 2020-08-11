@extends('layout.admin_layout')
@section('title')
    All Expences
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Expences</h2>
          </div>
          <div>
            <a class="btn btn-primary" href="{{ URL::to('/today_expences') }}">Today</a>
            <a class="btn btn-warning" href="{{ URL::to('/monthexpences') }}">Monthly</a>
            <a class="btn btn-info" href="{{ URL::to('/year_expences') }}">Yearly</a>
          </div>
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
                            
                           
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th>  Month</th>
                                  <th>  Date</th>
                                  <th> Year</th>
                                  <th> Amount</th>
                                  <th> Details</th>
                                  
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($expences_info as $v_expences)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_expences->expences_id  }}</td>
                                  <td class="center">{{ $v_expences->month }}</td>
                                  <td class="center">{{ $v_expences->date }}</td>
                                  <td class="center">{{ $v_expences->year }}</td>
                                  <td class="center">{{ $v_expences->amount }}</td>
                                  <td class="center">{{ $v_expences->details }}</td>

                              <td class="center">
                                  
                                  
                                  <a class="btn btn-info" href="{{URL::to('/edit_expences',$v_expences->expences_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/deleteexpences',$v_expences->expences_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                    
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