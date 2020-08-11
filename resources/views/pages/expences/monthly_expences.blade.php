@extends('layout.admin_layout')
@section('title')
   Monthly Expences
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
                    <div>
                        <a href="{{ URL::to('/January') }}" class="btn btn-primary">January</a>
                        <a href="{{ URL::to('/February') }}" class="btn btn-info">February</a>
                        <a href="{{ URL::to('/March') }}" class="btn btn-success">March</a>
                        <a href="{{ URL::to('/April') }}" class="btn btn-warning">April</a>
                        <a href="{{ URL::to('/May') }}" class="btn btn-primary">May</a>
                        <a href="{{ URL::to('/June') }}" class="btn btn-success">June</a>
                        <a href="{{ URL::to('/July') }}" class="btn btn-primary">July</a>
                        <a href="{{ URL::to('/August') }}" class="btn btn-info">August</a>
                        <a href="{{ URL::to('/September') }}" class="btn btn-success">September</a>
                        <a href="{{ URL::to('/October') }}" class="btn btn-warning">October</a>
                        <a href="{{ URL::to('/November') }}" class="btn btn-info">November</a>
                        <a href="{{ URL::to('/December') }}" class="btn btn-warning">December</a>

                    
                    </div>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Monthly Expences</h2>
                    </div>
                    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="btn btn-warning" href="{{ URL::to('/all_expences') }}">All Expences</a>
                            <a class="btn btn-primary" href="{{ URL::to('/today_expences') }}">Today Expences</a>
                            <a class="btn btn-info" href="{{ URL::to('/year_expences') }}">Yearly Expences</a>
                          </li>
                        </ul>
                     </nav>
                    @php
                    $month= date('F');
                    $mon=DB::table('expences')->where('month',$month)->sum('amount');
                    @endphp

                    <h4 style="text-align:center; color:red; font-size:20px; background-color: rgb(161, 190, 161);">  <i>Monthly Total = <i style="color: green">{{ $mon }}</i> TaKa</i> </h4>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">
							
						  <thead>
							  <tr>
								 
                                  <th> Month</th>
                                  <th> Amount</th>
                                  <th> Details</th>
								
							  </tr>
						  </thead>   

                          @foreach ($monthly as $v_today)
						 
                          <tbody>
                              <tr>
                                  
                                  <td class="center">{{ $v_today->month }}</td>
                                  <td class="center">{{ $v_today->amount }}</td>
                                  <td class="center">{{ $v_today->details }}</td>

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