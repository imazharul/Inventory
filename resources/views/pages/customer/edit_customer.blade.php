@extends('layout.admin_layout')
@section('title')
    Update customer
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Customer Information</h2>
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
            <form class="form-horizontal" action="{{ url('/updatecustomer',$customer_info->customer_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Customer Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="name" value="{{$customer_info->name}}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Customer email :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="email" value="{{$customer_info->email}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer phone :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="phone" value="{{$customer_info->phone}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer shopname :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="shopname" value="{{$customer_info->shopname}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_name :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bank_name" value="{{$customer_info->bank_name}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_branch :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bank_branch" value="{{$customer_info->bank_branch}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_holder :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bank_holder" value="{{$customer_info->bank_holder}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_number :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bank_number" value="{{$customer_info->bank_number}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer city :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="city" value="{{$customer_info->city}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer address :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="address" value="{{$customer_info->address}}">
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