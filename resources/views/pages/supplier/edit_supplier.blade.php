@extends('layout.admin_layout')
@section('title')
    Update supplier
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Supplier Information</h2>
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
            <form class="form-horizontal" action="{{ url('/update_supplier',$all_supplier_info->supplier_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Customer Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="name" value="{{$all_supplier_info->name}}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Customer email :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="email" value="{{$all_supplier_info->email}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer phone :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="phone" value="{{$all_supplier_info->phone}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer shop :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="shop" value="{{$all_supplier_info->shop}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Supplier type :</label>
                    <div class="controls">
                        <select name="type" class="form-control">
                            <option> Select Supplier</option>
                            <option value="Distributor"> Distributor</option>
                            <option value="Distributor"> Whole Seller</option>
                            <option value="Distributor"> Broker</option>
                        </select>
                    </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_name :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bankname" value="{{$all_supplier_info->bankname}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_branch :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bankbranch" value="{{$all_supplier_info->bankbranch}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_holder :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="bankholder" value="{{$all_supplier_info->bankholder}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer bank_number :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="banknumber" value="{{$all_supplier_info->banknumber}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer city :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="city" value="{{$all_supplier_info->city}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Customer address :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="address" value="{{$all_supplier_info->address}}">
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