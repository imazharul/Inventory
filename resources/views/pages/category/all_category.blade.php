@extends('layout.admin_layout')
@section('title')
    All category
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th>Category Name</th>    
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_category_info as $v_category)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_category->category_id  }}</td>
                                  <td class="center">{{ $v_category->category_name }}</td>

                                  <td class="center">
                                      @if($v_category->status==1)
  
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
                                  
                                  @if($v_category->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/unactive_category',$v_category->category_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/active_category',$v_category->category_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/edit_category',$v_category->category_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/deletecategory',$v_category->category_id)}}" id="delete">
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