@extends('layout.admin_layout')
@section('title')
   POS
@endsection

@section('content')

<div class="container-fluid">
    <div class="row" style="background-color: #4c88d8">
      <h2 class="text-center" style="color: rgb(235, 229, 233)">All product</h2>
    </div> <br><br>
    <div class="row">
        <table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable display">							
            <thead>
                <tr>
                    <th> Image</th>
                    <th>Product Name</th>    
                    <th>Product Code</th>
                    <th>Category Name</th>
                    <th>Actions</>
                </tr>
            </thead>   
            @foreach ($product as $v_row)          
            <tbody>
              <form class="form-horizontal" action="{{ url('/add_cart') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <tr>

                  <input type="hidden" name="id" value="{{$v_row->product_id }}">
                  <input type="hidden" name="name" value="{{$v_row->product_name }}">
                  <input type="hidden" name="quantity" value="1">
                  <input type="hidden" name="price" value="{{$v_row->product_selling_price }}">

                <td><img src="{{ URL::to($v_row->product_image) }}" style="width: 120px; height: 120px"></td>
                <td class="center">{{ $v_row->product_name }}</td>
                <td class="center">{{ $v_row->product_code }}</td>
                <td class="center">{{ $v_row->category_name }}</td>
                <td class="center">
                  
                        <button type="submit" class="btn btn-info" style="width: 40px; height: 40px;" href="{{URL::to('add_cart')}}">
                            <i class="halflings-icon white plus"></i> 
                        </button>    
                      </a>
                    </td>
                </tr>
              </form>
                  </tbody>
                @endforeach
              </table>          
     
           </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="background-color: #4c88d8">
            <h2 class="text-center" style="color: rgb(235, 229, 233)">Add Customer</h2>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Customer</a>
                </div>
            </div>
            <div class="row text-md-center">
              <p class="alert-success ">
                <?php
    
                  $message=Session::get('message');
                  if($message)
                  {
                    echo $message;
                    Session::put('message',null);
                  }	
    
                ?>
              </p>
            </div>
        </div>
      <br> <br>
       {{-- <div class="btn-group btn-group-lg">
           <h2 style="color: sienna"> => Please see the category list </h2>
        @foreach ($category as $v_category)
       <button type="button" class="btn btn-primary">{{ $v_category->category_name }}</button>
        @endforeach
      </div>
      <br> <br> <br>

        <select class="from-control">
            <option style="color: red" disabled selected >Select Customer</option>

            @foreach ($customer as $v_customer)
                <option> {{ $v_customer->name}}</option>
            @endforeach
        </select>
         --}}
        <br><br>
    <!--invoice section-->
        <div class="container">
            <div class="row">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quentity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                              <?php
                              $contents=Cart::getContent();
                                  // echo "<pre>";
                                  // print_r($contents);
                                  // echo "</pre>";
                                
                              ?>
                    <tbody>
            @foreach ($contents as $v_add)
              <tr>
                <td>{{ $v_add->name }}</td>
                  <td>
                    <form class="form-horizontal" action="{{ url('/cart_update/'.$v_add->id) }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <input type="number" name="quantity" value="{{$v_add->quantity}}"> 
                          <button type="submit" class="btn btn-sm btn-success active" style="margin-top:-4px;"><i class="halflings-icon white check"></i></button>
                        </form>
                  </td>
                  <td>{{$v_add->price}}</td>
                  <td>{{$v_add->price*$v_add->quantity}}</td>
                  <td class="text-center"> <a href="{{URL::to('/cart_remove/'.$v_add->id)}}" class="btn btn-danger btn-xs"><i class="halflings-icon white trash"></i> </a></td>
                    </tr>
                      @endforeach
                    </tbody>
                    
                </table>
            </div>
            <div>
            <h3>Quentity: {{ Cart::getTotalQuantity() }}</h3>
            <h3>Sub Total: {{ Cart::getSubTotal() }}</h3>
            <h3>Vat: 00</h3>
                
                <hr>
            <h2>Total: {{ Cart::getTotal() }}</h2>
             </div>
             <br><br>

            <form action="{{ url('create_invoice')}} " method="POST">
              {{ csrf_field() }}

              <div class="panel"><br><br>
                <h4>See Category</h4>
                @foreach ($category as $v_category)
                <button type="button" class="btn btn-primary">{{ $v_category->category_name }}</button>
                 @endforeach
                <h4>Must be Select A customer, other ways customer invoice not added....!</h4>
                @php
                    $cus=DB::table('customer')->get();
                @endphp

                <select class="from-control" name="cus_id">
                  <option style="color: red" disabled selected >Select Customer</option>
                   
                  @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors -> all() as $error)
                          <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                    @endif

                  @foreach ($cus as $v_cus)
                <option required value="{{ $v_cus->customer_id }}">{{ $v_cus->name}}</option>
                  @endforeach
              </select>
              </div>
                <button type="submit" class="btn btn-success">Create Invoice</button>
             </form>
        	</div>
        </div>
    </div>
</div>


{{-- model page  --}}
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('/saveaddcustomer') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}          
                        <div class="container-fluid">
                            <div class="row">
                                <div class="control-group">
                                    <label class="control-label" for="date01">Customer Name :<input type="text" class="input-xlarge" name="name" required placeholder="Enter your full name"></label>
                                  </div>
                    
                                  <div class="control-group">
                                      <label class="control-label" for="date01">Customer Email : <input type="text" class="input-xlarge" name="email" required placeholder="Enter your email"></label>
                                      
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="date01">Customer Phone :<input type="text" class="input-xlarge" name="phone" required placeholder="Enter your phone"></label>
                                  
                                </div>
                                      <div class="control-group">
                                        <label class="control-label" for="date01">Customer shopname : <input type="text" class="input-xlarge" name="shopname" required placeholder="Enter your shopname"></label>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer bank_name : <input type="text" class="input-xlarge" name="bank_name" required placeholder="Enter your bank_name"></label>
                                      
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer bank_holder :<input type="text" class="input-xlarge" name="bank_holder" required placeholder="Enter your bank_holder"></label>
                                      
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer bank_branch : <input type="text" class="input-xlarge" name="bank_branch" required placeholder="Enter your bank_branch"></label>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer bank_number :<input type="text" class="input-xlarge" name="bank_number" required placeholder="Enter your bank_number"></label>
                                     
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer city : <input type="text" class="input-xlarge" name="city" required placeholder="Enter your city"></label>
                                    </div>
                                  
                                    <div class="control-group">
                                      <label class="control-label" for="date01">Customer Address :<input type="text" class="input-xlarge" name="address" required placeholder="Enter your address"></label>
                                    </div>
                    
                    
                                    <div class="control-group">
                                      <label class="control-label" for="fileInput">Image : <input class="input-file uniform_on" name="photo" id="fileInput" type="file"accept="image*" class="upload" required onchange="readURL(this);"/></label>
                                      
                                    </div>
                    
                                    <div class="control-group hidden-phone">
                                      <label class="control-label" for="textarea2">Publication Status : <input type="checkbox" name="status" value="1"></label>
                                      
                                    </div>
                                  
                        </div>     
                        <button type="submit" class="btn btn-primary">Add Customer </button>
                            
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
