@extends('layout.admin_layout')
@section('title')
    Update emplyee
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Emplyee Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>

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

        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/updateemplyee', $emplyee_info->emplyee_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Emplyee Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="name" value="{{$emplyee_info->name}}">
                  </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee phone :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="phone" value="{{$emplyee_info->phone}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Salary :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="salary" value="{{$emplyee_info->salary}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Experience :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="experience" value="{{$emplyee_info->experience}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee address :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="address" value="{{$emplyee_info->address}}">
                    </div>
                  </div>

                
                <div class="form-actions">
                  <button type="submit" class="btn btn-success"> Update </button>
                  
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

@endsection()