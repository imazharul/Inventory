@extends('layout.admin_layout')
@section('title')
    View supplier
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            
        <form accept="{{ URL::to('/cancle_sup') }}" method="GET">
                <fieldset>
                    <div class="container-fluid">
                      <div class="row" style="background-color: #4c88d8">
                        <h2 class="text-center"> Supplier Details </h2>
                      </div>
                      
                    </div><br>
                    <div class="control-group">
                      <label class="control-label" for="date01">Supplier ID :  {{ $single_supplier->supplier_id }} </label>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Supplier name :  {{ $single_supplier->name }} </label>
                      </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Supplier email :  {{ $single_supplier->email }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier phone :  {{ $single_supplier->phone }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier shop :  {{ $single_supplier->shop }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier Type :  {{ $single_supplier->type }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier bank_name :  {{ $single_supplier->bankname }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier bank_branch :  {{ $single_supplier->bankbranch }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier bank_holder :  {{ $single_supplier->bankholder }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier bank_number :  {{ $single_supplier->banknumber }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier address :  {{ $single_supplier->address }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Supplier city :  {{ $single_supplier->city }} </label>
                      </div>
                      <div class="control-group">
                      <label class="control-label" for="date01">Supplier Photo :  <img style="height: 80px; width:80px;" src="{{ URL::to($single_supplier->photo) }}"/></label>
                      </div>
    
    
                      <a class="btn btn-success" href="{{URL::to('/cancle_sup')}}" >Cancle
                         
                    </a>
                     
                      {{-- <button type="reset" class="btn">Cancel</button> --}}
                    </div>
              
              </fieldset>
            </form>
            

        </div>
    </div><!--/span-->

@endsection