@extends('layout.admin_layout')
@section('title')
    All supplier
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Supplier</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							<div class="container">
                                <div class="row">
                                    <a class="btn btn-primary" href="{{ URL::to('/addsupplier') }}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet"> Add Supplier </span></a>
                                </div>
                            </div> 
                            <br>
						  <thead>
							  <tr>
								  <th> ID</th>
								  <th> Name</th>
                                  <th> Email</th>
                                  <th> Phone</th>
                                  <th> Shop </th>
                                  <th> Type</th>
                                  <th> Bank name</th>
                                  <th> Bank holder</th>
                                  <th> Bank Number </th>
                                  <th> Photo</th>
                                  <th> Address </th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($all_supplier_info as $v_supplier)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_supplier->supplier_id }}</td>
                                  <td class="center">{{ $v_supplier->name }}</td>
                                  <td class="center">{{ $v_supplier->email }}</td>
                                  <td class="center">{{ $v_supplier->phone }}</td>
                                  <td class="center">{{ $v_supplier->shop }}</td>
                                  <td class="center">{{ $v_supplier->type }}</td>
                                  <td class="center">{{ $v_supplier->bankname }}</td>
                                  <td class="center">{{ $v_supplier->bankholder }}</td>
                                  <td class="center">{{ $v_supplier->banknumber }}</td>
                                  <td><img src="{{URL::to($v_supplier->photo)}}" style="width: 120px; height: 120px"></td>
                                  <td class="center">{{ $v_supplier->address }}</td>
                                  <td class="center">
                                      @if($v_supplier->status==1)
  
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
                                  
                                  @if($v_supplier->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/unactive_supplier',$v_supplier->supplier_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/active_supplier',$v_supplier->supplier_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/edit_supplier',$v_supplier->supplier_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/delete_supplier',$v_supplier->supplier_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a>
                                      <a class="btn btn-primary" href="{{URL::to('/view_supplier',$v_supplier->supplier_id)}}">
                                        
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