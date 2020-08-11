@extends('layout.admin_layout')
@section('title')
    Order Confirm
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <br>
            <div class="col-sm-12">
                <h2 class="text-center" style="background-color: rebeccapurple; color:white"> Confirm </h2>
            </div>
            <div class="col-sm-12">
           
            <h2 style="color: rebeccapurple"> Customer information </h2>
            <h2>Order Date :{{ $ordetails->order_date }}</h2>
                <h4> Name: {{ $ordetails ->name}}</h4>
                <h4> Shope Name: {{ $ordetails ->shopname}}</h4>
                <h5> email: {{ $ordetails ->email}}</h5>
                <h5> Phone: {{ $ordetails ->phone}}</h5>
                <h5> Address: {{ $ordetails ->address}}</h5>

                <h2  class="text-center"style="color: rebeccapurple"> Order information </h2>
                <h2 class="text-center">Order Date :{{date('d-m-y')}}</h2>
                <h4 class="text-center">Order Status: <span style="color: red" class="badge badge-info"> panding </span> </h4>
                @php
                    $order=DB::table('order')->select('id')->first();
                @endphp
                <h4 class="text-center">Order ID: {{ $ordetails ->orderdetails_id}} </h4>
               
                <br><br>
              
            </div>
            <br><br>
            <div class="col-sm-12">
                <h2 class="text-center" style="background-color: rebeccapurple; color:white"> Order Details </h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Product Code</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Sub Total</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    

                    @foreach ($ordetails as $v_con)
                    <tr>
                  
                        <td>{{$v_con->product_name}}</td>
                        <td>{{$v_con->product_code}}</td>
                        <td>{{$v_con->quantity}}</td>
                        <td>{{$v_con->price}}</td>
                        <td>{{$v_con->price*$v_con->quantity}}</td>
                        <td>{{ Cart::getTotal() }}</td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
    <div class="text-left" style="color: rebeccapurple">
        <div>
            <div class="mb-2"><strong>Grand Total : {{ $ordetails->total }} TK</strong> </div>
        </div>
        <div>
            <div class="mb-2">Total Quentity : 00</div>
        </div>
        <div>
            <div class="mb-2">Vat : {{ $ordetails->vat }}</div>
        </div>
        <div>
            <div class="mb-2">Sub - Total amount :{{ $ordetails->sub_total }}</div>
        </div>
        <br>
        {{-- Not show Approved button --}}
       
    {{-- @if ($order_status=='Approved')
    @else --}}
            <a href="#" onclick="window.print();" type="submit" class="btn btn-primary text-md-center" > Pdf 
            </a> <a href="{{URL::to('/order_approved/'.$ordetails->orderdetails_id)}}" type="submit" class="btn btn-success text-md-center"> Done </a>
    {{-- @endif --}}
        
    
    </div>
    <h2  class="text-center"style="color: rebeccapurple"> Payment information </h2>
                <h2 class="text-center">Payment By :{{ $ordetails->payment_status }}</h2>
                <h4 class="text-center">Pay : {{ $ordetails->pay }}</h4>
                <h4 class="text-center">Due : {{ $ordetails->due }}</h4>

    <!--invoice-->
    <!-- The Modal -->
 {{-- <div class="modal fade" id="myModal">
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
  </div>  --}}
@endsection

