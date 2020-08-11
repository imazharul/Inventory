@extends('layout.admin_layout')
@section('title')
    Add emplyee
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/saveaddemplyee') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Add Emplyee</h2>
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
                  <label class="control-label" for="date01">Emplyee Name :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="name" required placeholder="Enter your full name">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Email :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="email" required placeholder="Enter your email">
                    </div>
                </div>
                    <div class="control-group">
                      <label class="control-label" for="date01">Emplyee N_id :</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="n_id" required placeholder="Enter your n_id">
                      </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Phone :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="phone" required placeholder="Enter your phone number">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Experience :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="experience" required placeholder="Enter your experience">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Salary :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="salary" required placeholder="Enter your salary">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Vacation :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="vacation" required placeholder="Enter your vacation">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee City :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="city" required placeholder="Enter your city">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Emplyee Address :</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="address" required placeholder="Enter your address">
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
                  <button type="submit" class="btn btn-primary">Add Emplyee </button>
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