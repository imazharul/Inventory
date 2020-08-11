@extends('layout.admin_layout')
@section('title')
    All product
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All product</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th>  Product Name</th>
                                  <th> Product Code </th>
                                  <th> Selling Price</th>
                                  <th> Photo</th>
                                  <th> Garage</th>
                                  <th> Route</th>
								  <th> Status</th>
								  <th> Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_product_info as $v_product)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_product->product_id  }}</td>
                                  <td class="center">{{ $v_product->product_name }}</td>
                                  <td class="center">{{ $v_product->product_code }}</td>
                                  <td class="center">{{ $v_product->product_selling_price }}</td>

                                  <td><img src="{{URL::to($v_product->product_image)}}" style="width: 120px; height: 120px"></td>
                                  <td class="center">{{ $v_product->product_garage }}</td>
                                  <td class="center">{{ $v_product->product_route }}</td>
                                  <td class="center">
                                      @if($v_product->status==1)
  
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
                                  
                                  @if($v_product->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/unactive_product',$v_product->product_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/active_product',$v_product->product_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/edit_product',$v_product->product_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/delete_product',$v_product->product_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      <a class="btn btn-primary" href="{{URL::to('/view_product',$v_product->product_id)}}">
                                        
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