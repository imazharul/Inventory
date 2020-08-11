@extends('layout.admin_layout')
@section('title')
    Approved Order
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Approved Order</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								  
								  <th> Product Name</th>
                                  <th> Order Date </th>
                                  <th>Pay</th>
                                  <th>Due</th>
                                  <th> Total</th>
                                  <th> Order Status</th>
                                  <th> Payment Status</th>
								  
								  <th> Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($SuccessOrder as $v_approved)
						 
                          <tbody>
                              <tr>
                                 
                                  <td class="center">{{ $v_approved->name }}</td>
                                  <td class="center">{{ $v_approved->order_date }}</td>
                                  <td class="center">{{ $v_approved->pay }}</td>
                                  <td class="center">{{ $v_approved->due }}</td>
                                  <td class="center">{{ $v_approved->total }}</td>
                                  <td class="center"><span class="badge badge-info" style="color:seashell"> {{ $v_approved->order_status }} </span> </td>
                                  <td class="center">  {{ $v_approved->payment_status }}</td>
                                  

                              <td class="center">
                                      <a class="btn btn-danger" href="{{URL::to('/delete_approved',$v_approved->orderdetails_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      {{-- <a class="btn btn-primary" href="{{URL::to('/view_order_status',$v_approved->orderdetails_id)}}">
                                        
                                        <i class="halflings-icon fas fa-street-view"></i>
                                      --}}
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