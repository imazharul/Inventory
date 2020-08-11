@extends('layout.admin_layout')
@section('title')
    Add Product
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/saveaddproduct') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Add Product</h2>
                  </div>
                  <div class="row">
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
                  </div>
                </div><br>
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name" required placeholder="Enter your product name">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Code :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_code" required placeholder="Enter your product code">
                    </div>
                </div>
                    <div class="control-group">
                      <label class="control-label" for="date01">Category :</label>
                      @php
                          $cat=DB::table('category')->get();
                      @endphp
                        <div class="controls">
                            <select name="cat_id" class="form-control">
                                    <option selected> Select Category Name</option>
                                @foreach ($cat as $row)
                                    <option value="{{$row->category_id }}"> {{$row->category_name}}</option>
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
                                        <option selected> Select Supplier Name</option>
                                  @foreach ($sup as $row)
                                        <option value="{{$row->supplier_id }}"> {{$row->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product garage :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_garage" required placeholder="Enter your product garage">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product route :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_route" required placeholder="Enter your product route">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product buy_date :</label>
                    <div class="controls">
                      <input type="date" class="input-xlarge" name="product_buy_date" required placeholder="Enter your product buy_date">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product expire_date :</label>
                    <div class="controls">
                      <input type="date" class="input-xlarge" name="product_expire_date" required placeholder="Enter your expire_date">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product buying_price :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_buying_price" required placeholder="Enter your buying_price">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product selling_price :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_selling_price" required placeholder="Enter your selling_price">
                    </div>
                  </div>
                  
                  {{-- <div class="form-group">
                    <img id="image" src="#">
                    <label class="control-label" for="fileInput">Photo :</label>
                    <div class="controls">
                      <input type="file" name="photo" accept="image*" class="upload" required onchange="readURL(this);"/>
                    </div>
                  </div> --}}

                  <div class="control-group">
                    <label class="control-label" for="fileInput">Image :</label>
                    <div class="controls">
                      <img id="image" src="#">
                      <input class="input-file uniform_on" name="product_image" id="fileInput" type="file"accept="image*" class="upload" required onchange="readURL(this);"/>
                    </div>
                  </div>

                  <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Publication Status :</label>
                    <div class="controls">
                    <input type="checkbox" name="status" value="1">
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Product </button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->
    <script type="text/javascript">

      function readURL(input) {
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#image')
            .attr('src', e.target.result)
            .width(40);
            .height(40);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
    
@endsection