@extends('layout.admin_layout')
@section('title')
    Add expences
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/saveaddexpences') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Add Expences</h2>
                  </div>
                  <div class="row">
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
                  </div>
                </div><br>
                

                <div class="control-group">
                    <div class="controls">
                      <input type="hidden" class="input-xlarge" name="date" value="{{ date('d-m-y')}}" >
                    </div>
                </div>

                <div class="control-group">
                  <div class="controls">
                  <input type="hidden" class="input-xlarge" name="month" value="{{ date('F')}}" >
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                  <input type="hidden" class="input-xlarge" name="year" value="{{ date("Y") }}">
                  </div>
              </div>
                    <div class="control-group">
                      <label class="control-label" for="date01">Expences Amount :</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="amount" required placeholder="Enter your amount">
                      </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Expences Details :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="details" required placeholder="Enter your details">
                    </div>
                  </div>
         
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Expences </button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->
@endsection