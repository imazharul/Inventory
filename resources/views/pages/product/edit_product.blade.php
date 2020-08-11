@extends('layout.admin_layout')
@section('title')
    Update product
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product Information</h2>
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
            <form class="form-horizontal" action="{{ url('/update_product',$product_info->product_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Category :</label>
                  @php
                      $cat=DB::table('category')->get();
                  @endphp
                    <div class="controls">
                        <select name="cat_id" class="form-control">
                               
                          @foreach ($cat as $row)
                            <option value="{{$row->category_id }}" <?php if ($product_info->cat_id==$row->category_id) 
                            { echo "selected";} ?> >{{$row->category_name}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
              
                  <div class="control-group">
                    <label class="control-label" for="date01">Supplier :</label>
                    
                    @php
                        $sup=DB::table('supplier')->get();
                    @endphp

                      <div class="controls">
                          <select name="sup_id" class="form-control">
                                   
                              @foreach ($sup as $row)
                                  <option value="{{$row->supplier_id }}" <?php if ($product_info->sup_id==$row->supplier_id) 
                                  { echo "selected";} ?> >{{$row->name}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div
                
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Code :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="product_code" value="{{$product_info->product_code}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Garage :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="product_garage" value="{{$product_info->product_garage}}">
                  </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Route :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="product_route" value="{{$product_info->product_route}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Buy_Date :</label>
                    <div class="controls">
                    <input type="date" class="input-xlarge" name="product_buy_date" value="{{$product_info->product_buy_date}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Expire_Date :</label>
                    <div class="controls">
                    <input type="date" class="input-xlarge" name="product_expire_date" value="{{$product_info->product_expire_date}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Buying_Price :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="product_buying_price" value="{{$product_info->product_buying_price}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Selling_Price :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="product_selling_price" value="{{$product_info->product_selling_price}}">
                    </div>
                  </div>
                 <div class="form-actions">
                  <button type="submit" class="btn btn-success"> Update </button>
                  </div>
                
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->
  </div>
@endsection()