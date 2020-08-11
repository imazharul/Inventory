@extends('layout.admin_layout')
@section('title')
    Add Invoice
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <br>
            <div class="col-sm-12">
                <h2 class="text-center" style="background-color: rebeccapurple; color:white"> Invoice </h2>
            </div>
            <div class="col-sm-12">
           
            <h2 style="color: rebeccapurple"> Customer information </h2>
            <h2>Date :{{date('d-m-y')}}</h2>
                <h4> Name: {{ $customer->name}}</h4>
                <h4> Shope Name: {{ $customer->shopname}}</h4>
                <h5> email: {{ $customer->email}}</h5>
                <h5> Phone: {{ $customer->phone}}</h5>
                <h5> Address: {{ $customer->address}}</h5>

                <h2  class="text-center"style="color: rebeccapurple"> Order information </h2>
                <h2 class="text-center"> Date :{{date('d-m-y')}}</h2>
                <h4 class="text-center"> Status: panding</h4>
                {{-- @php
                    $order=DB::table('order')->select('id')->first();
                @endphp --}}
                <h4 class="text-center"> ID: {{ $customer->customer_id}} </h4>
                {{-- {{ $order++} --}}
                <br><br>
                {{-- <div class="text-left" style="color: rebeccapurple">
                    <p class="font-weight-bold mb-4" ><strong> Payment Details</strong></p>
                    <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                    <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                    <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                    <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                </div> --}}
            </div>
            <br><br>
            <div class="col-sm-12">
                <h2 class="text-center" style="background-color: rebeccapurple; color:white"> Product Details </h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                        {{-- <th class="border-0 text-uppercase small font-weight-bold">Sub Total</th> --}}
                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                    </tr>
                </thead>
                <tbody>
                    

                    @foreach ($contents as $v_con)
                    <tr>
                    <td>1</td>
                        <td>{{$v_con->name}}</td>
                        <td>{{$v_con->quantity}}</td>
                        <td>{{$v_con->price}}</td>
                        <td>{{$v_con->price*$v_con->quantity}}</td>
                        {{-- <td>{{ Cart::getTotal() }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-left" style="color: rebeccapurple">
        <div>
            <div class="mb-2"><strong>Grand Total : {{ Cart::getTotal() }} TK</strong> </div>
        </div>
        <div>
            <div class="mb-2">Total Quentity : {{ Cart::getTotalQuantity() }}</div>
        </div>
        <div>
            <div class="mb-2">Vat : 00 Tk</div>
        </div>
        <div>
            <div class="mb-2">Sub - Total amount :{{ Cart::getSubTotal() }}</div>
        </div>
        <br>
        <a href="#" onclick="window.print();" type="submit" class="btn btn-primary text-md-center" > Pdf 
        </a> <a href="#" type="submit" class="btn btn-success text-md-center" data-toggle="modal" data-target="#myModal"> Submit </a>
    </div>


    <!--invoice-->
    <!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title text-md-center" style="color: rebeccapurple">Invice of {{ $customer->name}} </h4> 
        <span class="pull-right" style="color: royalblue">Total : {{ Cart::getTotal() }} TK</span> <br>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form class="form-horizontal " action="{{ url('/final_invoice')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}  
               
                        <div class="form-group">
                            <label class="control-label">Payment  </label>
                            <select class="form-control" name="payment_status">
                                <option value="HandCash"> HandCash</option>
                                <option value="Check"> Check</option>
                                <option value="Due"> Due</option>

                            </select>
                        </div>
                        <div class="form-group">
                            Pay : <input type="text" class="form-control" name="pay" value="">
                        </div>
                        <br>
                        <div class="form-group">
                           Due :  <input type="text" class="form-group" name="due" value="">
                        </div>
                        <div>
                            <input type="hidden" name="customer_id" value="{{ $customer->customer_id}}">
                            <input type="hidden" name="order_date" value="{{ date('d-m-y')}}">
                            <input type="hidden" name="order_status" value="panding">
                            <input type="hidden" name="total_product" value="{{ Cart::getSubTotal() }}">
                            <input type="hidden" name="sub_total" value="{{ Cart::getSubTotal() }}">
                            <input type="hidden" name="vat" value="5">
                        <input type="hidden" name="total" value="{{ Cart::getSubTotal() }}">
                            
                        </div>
                    </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary pull-left">Add Payment </button> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>                 
    </form>
      </div>
    </div>
  </div>
@endsection

