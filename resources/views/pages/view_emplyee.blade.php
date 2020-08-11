@extends('layout.admin_layout')
@section('title')
    View emplyee
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            
        <form accept="#" method="GET">
                <fieldset>
                    <div class="container-fluid">
                      <div class="row" style="background-color: #4c88d8">
                        <h2 class="text-center"> Emplyee Details </h2>
                      </div>
                      
                    </div><br>
                    <div class="control-group">
                      <label class="control-label" for="date01">Emplyee ID :  {{ $singleemplyee->emplyee_id }} </label>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Emplyee name :  {{ $singleemplyee->name }} </label>
                      </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Emplyee email :  {{ $singleemplyee->email }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee phone :  {{ $singleemplyee->phone }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee n_id :  {{ $singleemplyee->n_id }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee experience :  {{ $singleemplyee->experience }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee salary :  {{ $singleemplyee->salary }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee vacation :  {{ $singleemplyee->vacation }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee city :  {{ $singleemplyee->city }} </label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="date01">Emplyee address :  {{ $singleemplyee->address }} </label>
                      </div>
                      <div class="control-group">
                      <label class="control-label" for="date01">Emplyee Photo :  <img style="height: 80px; width:80px;" src="{{ URL::to($singleemplyee->photo) }}"/></label>
                      </div>
    
    
                      <a class="btn btn-success" href="{{URL::to('/cancle')}}" >Cancle
                         
                    </a>
                     
                      {{-- <button type="reset" class="btn">Cancel</button> --}}
                    </div>
              
              </fieldset>
            </form>
            

        </div>
    </div><!--/span-->

@endsection