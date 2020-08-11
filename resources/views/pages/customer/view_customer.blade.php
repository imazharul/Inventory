@extends('layout.admin_layout')
@section('title')
    View customer
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            
        <form accept="#" method="GET">
                <fieldset>
                    <div class="container-fluid">
                      <div class="row" style="background-color: #4c88d8">
                        <h2 class="text-center"> customer Details </h2>
                      </div>
                      
                    </div><br>
                    <div class="control-group">
                      <label class="control-label" for="date01">Customer ID :  {{ $single_customer->customer_id }} </label>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Customer name :  {{ $single_customer->name }} </label>
                      </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Customer email :  {{ $single_customer->email }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer phone :  {{ $single_customer->phone }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer shopname :  {{ $single_customer->shopname }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer bank_name :  {{ $single_customer->bank_name }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer bank_branch :  {{ $single_customer->bank_branch }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer bank_holder :  {{ $single_customer->bank_holder }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer bank_number :  {{ $single_customer->bank_number }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer address :  {{ $single_customer->address }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Customer city :  {{ $single_customer->city }} </label>
                      </div>
                      <div class="control-group">
                      <label class="control-label" for="date01">Customer Photo :  <img style="height: 80px; width:80px;" src="{{ URL::to($single_customer->photo) }}"/></label>
                      </div>
    
    
                      <a class="btn btn-success" href="{{URL::to('/ccancle')}}" >Cancle
                         
                    </a>
                     
                      {{-- <button type="reset" class="btn">Cancel</button> --}}
                    </div>
              
              </fieldset>
            </form>
            

        </div>
    </div><!--/span-->

@endsection