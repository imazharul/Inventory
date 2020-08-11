@extends('layout.admin_layout')
@section('title')
    Add supplier
@endsection
@section('content')
<div class="row-fluid sortable">
  <div class="box span12">
      <div class="box-content">
          <form class="form-horizontal" action="{{ url('/saveaddsupplier') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <fieldset>
              <div class="container-fluid">
                <div class="row" style="background-color: #4c88d8">
                  <h2 class="text-center">Add Supplier</h2>
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
                <label class="control-label" for="date01">Supplier Name :</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="name" required placeholder="Enter your full name">
                </div>
              </div>

              <div class="control-group">
                  <label class="control-label" for="date01">Supplier Email :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="email" required placeholder="Enter your email">
                  </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="date01">Supplier Phone :</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="phone" required placeholder="Enter your phone">
                </div>
            </div>
           
                <div class="control-group">
                    <label class="control-label" for="date01">Supplier shop :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="shop" required placeholder="Enter your shopname">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Supplier type :</label>
                    <div class="controls">
                        <select name="type" class="form-control">
                            <option selected> Select Supplier</option>
                            <option value="Distributor"> Distributor</option>
                            <option value="WholeSeller"> Whole Seller</option>
                            <option value="Broker"> Broker</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Supplier bank_name :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="bankname" required placeholder="Enter your bank_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Supplier bank_holder :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="bankbranch" required placeholder="Enter your bank_holder">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Supplier bank_branch :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="bankholder" required placeholder="Enter your bank_branch">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Supplier bank_number :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="banknumber" required placeholder="Enter your bank_number">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="date01">Supplier city :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="city" required placeholder="Enter your city">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="date01">Supplier Address :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="address" required placeholder="Enter your address">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="fileInput">Photo :</label>
                  <div class="controls">
                    <img id="image" src="#">
                    <input class="input-file uniform_on" name="photo" id="fileInput" type="file"accept="image*" class="upload" required onchange="readURL(this);"/>
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Publication Status :</label>
                  <div class="controls">
                  <input type="checkbox" name="status" value="1">
                  </div>
                </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Supplier </button>
                {{-- <button type="reset" class="btn">Cancel</button> --}}
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