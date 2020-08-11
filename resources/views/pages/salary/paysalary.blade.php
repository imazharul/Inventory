@extends('layout.admin_layout')
@section('title')
    Paysalary
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
<h2 class="text-center">{{ date("F Y") }}</h2>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Pay Salary information</h2>
					</div>
                
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">

						  <thead>
							  <tr>
								  <th> ID</th>
                                  <th> Name</th>
                                  <th> Photo</th>
                                  <th> Salary</th>
                                   <th> Month</th>
                                  <th> Advance Salary</th>
                                  {{-- <th> Phone</th>  --}}
								  {{-- <th>Status</th> --}}
								  <th>Actions</th>
							  </tr>
						  </thead>   

                    @php
                        $month= date("F", strtotime('-1 month'));

                        $paysalary=DB::table('salary')
                                ->join('emplyee','salary.emp_id','emplyee.emplyee_id')
                                ->select('salary.*','emplyee.name','emplyee.salary','emplyee.photo','emplyee.phone')
                                ->where('month', $month)
                                ->get();
                              
                          @endphp

                          @foreach ($paysalary as $v_advance_salary_info)
						 
                          <tbody>
                              <tr>
                                  <td>{{ $v_advance_salary_info->emplyee_id  }}</td>
                                  <td class="center">{{ $v_advance_salary_info->name }}</td>
                                  <td><img src="{{URL::to($v_advance_salary_info->photo)}}" style="width: 120px; height: 120px"></td>
                                  <td class="center">{{ $v_advance_salary_info->salary }}</td>
                                  <td class="center"><span class="badge badge-success">{{ date("F", strtotime('-1 month')) }}</span></td> 
                                  <td class="center">ase</td>
                                  {{-- <td class="center">{{ $v_advance_salary_info->phone }}</td>
                                  <td class="center">
                                      @if($v_advance_salary_info->status==1)
  
                                          <span class="btn btn-success">
                                              Active
                                          </span>
                                      @else 
                                          <span class="btn btn-danger">
                                              Unactive
                                          </span>
                                      @endif
                                  </td> --}}
  
                              <td class="center">
                                  
                                  {{-- @if($v_advance_salary_info->status==1)
                              <a class="btn btn-danger" href="{{URL::to('/unactive',$v_advance_salary_info->salary_id)}}">
                                          <i class="halflings-icon white thumbs-down"></i>  
                                      </a>
                                  @else
                                  <a class="btn btn-success" href="{{URL::to('/active',$v_advance_salary_info->salary_id)}}">
                                          <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                  @endif
                                  <a class="btn btn-info" href="{{URL::to('/edit',$v_advance_salary_info->salary_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                      <a class="btn btn-danger" href="{{URL::to('/delete',$v_advance_salary_info->salary_id)}}" id="delete">
                                          <i class="halflings-icon white trash"></i> 
                                      </a> --}}
                                      <a class="btn btn-primary" href="{{URL::to('/view',$v_advance_salary_info->emplyee_id)}}">
                                        
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