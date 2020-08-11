@extends('layout.admin_layout')
@section('title')
   Today Expences
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
                    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="btn btn-primary" href="{{ URL::to('/all_expences') }}">All Expences</a>
                            <a class="btn btn-warning" href="{{ URL::to('/monthexpences') }}">Monthly Expences</a>
                            <a class="btn btn-success" href="{{ URL::to('/year_expences') }}">Yearly Expences</a>
                          </li>
                        </ul>
                     </nav>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Today Expences</h2>
                    </div>

                    @php
                        $date= date('d-m-y');
                        $ex=DB::table('expences')->where('date',$date)->sum('amount');
                    @endphp

                    <h4 style="text-align:center; color:red; font-size:25px;">  <i>Today Total Expences = {{ $ex }} TaKa</i> </h4>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								 
                                  <th>  Date</th>
                                  <th> Amount</th>
                                  <th> Details</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                          @foreach ($today as $v_today)
						 
                          <tbody>
                              <tr>
                                  
                                  <td class="center">{{ $v_today->date }}</td>
                                  <td class="center">{{ $v_today->amount }}</td>
                                  <td class="center">{{ $v_today->details }}</td>

                              <td class="center">
                                  
                                  
                                  <a class="btn btn-info" href="{{URL::to('/edit_today',$v_today->expences_id)}}">
                                          <i class="halflings-icon white edit"></i>  
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