@extends('layout.admin_layout')
@section('title')
    All customer
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Customer</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">

						  <thead>
							  <tr>
								  <th> ID</th>
								  <th> Name</th>
                                  <th> Email</th>
                                  <th> Phone</th>
                                  <th> Shop name</th>
                                  <th> photo</th>
                                  <th> bank name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_customer_info as $v_customer)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_customer->customer_id }}</td>
                                  <td class="center">{{ $v_customer->name }}</td>
                                  <td class="center">{{ $v_customer->email }}</td>
                                  <td class="center">{{ $v_customer->phone }}</td>
                                  <td class="center">{{ $v_customer->shopname }}</td>
                                  <td><img src="{{URL::to($v_customer->photo)}}" style="width: 120px; height: 120px"></td>
                                  <td class="center">{{ $v_customer->bank_name }}</td>
                                  <td class="center">
                                      @if($v_customer->status==1)
  
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
                                  
                                  @if($v_customer->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/uunactive',$v_customer->customer_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/aactive',$v_customer->customer_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/eedit',$v_customer->customer_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/ddelete',$v_customer->customer_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      <a class="btn btn-primary" href="{{URL::to('/vview',$v_customer->customer_id)}}">
                                        
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