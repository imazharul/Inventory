@extends('layout.admin_layout')
@section('title')
    Panding Order
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Panding Order</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								  
								  <th> Product Name</th>
                                  <th> Order Date </th>
                                  <th> Total</th>
                                  <th> Order Status</th>
                                  <th> Payment Status</th>
								  
								  <th> Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($order_details as $v_panding)
						 
                          <tbody>
                              <tr>
                                 
                                  <td class="center">{{ $v_panding->name }}</td>
                                  <td class="center">{{ $v_panding->order_date }}</td>
                                  <td class="center">{{ $v_panding->total }}</td>
                                  <td class="center"><span class="badge badge-info" style="color: red"> {{ $v_panding->order_status }} </span> </td>
                                  <td class="center">  {{ $v_panding->payment_status }}</td>
                                  
                              <td class="center">
                                      <a class="btn btn-danger" href="{{URL::to('/delete_product',$v_panding->orderdetails_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      <a class="btn btn-primary" href="{{URL::to('/view_order_status',$v_panding->orderdetails_id)}}">
                                        
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