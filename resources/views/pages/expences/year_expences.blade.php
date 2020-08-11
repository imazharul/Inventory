@extends('layout.admin_layout')
@section('title')
   Yearly Expences
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="btn btn-primary" href="{{ URL::to('/all_expences') }}">All Expences</a>
                          <a class="btn btn-warning" href="{{ URL::to('/today_expences') }}">Today Expences</a>
                          <a class="btn btn-info" href="{{ URL::to('/monthexpences') }}">Monthly Expences</a>
                        </li>
                      </ul>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Yearly-{{ date('Y')}} Expences</h2>
                    </div>

                    @php
                    $year= date('Y');
                    $yer=DB::table('expences')->where('year',$year)->sum('amount');
                    @endphp

                    <h4 style="text-align:center; color:red; font-size:20px; background-color: rgb(161, 190, 161);">  <i>Yearly Total = <i style="color: green">{{ $yer }}</i> TaKa</i> </h4>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								 
                                  <th> Year</th>
                                  <th> Amount</th>
                                  <th> Details</th>
								
							  </tr>
						  </thead>   

                          @foreach ($yearly as $v_year)
						 
                          <tbody>
                              <tr>
                                  
                                  <td class="center">{{ $v_year->year }}</td>
                                  <td class="center">{{ $v_year->amount }}</td>
                                  <td class="center">{{ $v_year->details }}</td>

                              <td class="center">
                                  
                                  
                                  {{-- <a class="btn btn-info" href="{{URL::to('/edit_today',$v_today->expences_id)}}">
                                          <i class="halflings-icon white edit"></i>  
                                      </a>
                                    </a> --}}
                                  </td>
                              </tr>
                          </tbody>
                      @endforeach
                     
					  </table>            
					</div>
				</div><!--/span-->
			
            </div><!--/row-->
@endsection