@extends('layout.admin_layout')
@section('title')
    Add Product
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
          <form accept="#" method="GET">
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Product Details</h2>
                  </div>
                  
                </div><br>
                <div class="control-group">
                <label class="control-label" for="date01"> Product ID : {{ $view_product_info->product_id }}</label>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name : {{ $view_product_info->product_name }} </label>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Code : {{ $view_product_info->product_code }}</label>
                    
                </div>
                    <div class="control-group">
                      <label class="control-label" for="date01">Category : {{ $view_product_info->category_name }}</label>
                     
                    </div>
                  
                    <div class="control-group">
                        <label class="control-label" for="date01">Supplier : {{ $view_product_info->name }}</label>
                        
                       
                      </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product garage : {{ $view_product_info->product_garage }}</label>
                   
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product route : {{ $view_product_info->product_route }}</label>
                    
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product buy_date : {{ $view_product_info->product_buy_date }}</label>
                    
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product expire_date : {{ $view_product_info->product_expire_date }}</label>
                    
                  <div class="control-group">
                    <label class="control-label" for="date01">Product buying_price : {{ $view_product_info->product_buying_price }}</label>
                    
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product selling_price : {{ $view_product_info->product_selling_price }}</label>

                  </div>

                  <div class="control-group">
                    <label class="control-label" for="date01">Supplier Photo :  <img style="height: 80px; width:80px;" src="{{ URL::to( $view_product_info->product_image) }}"/></label>
                
                  </div>

                  
                <div class="form-actions">
                 
                  <a class="btn btn-success" href="{{URL::to('/pcancle')}}" >Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->
    
@endsection