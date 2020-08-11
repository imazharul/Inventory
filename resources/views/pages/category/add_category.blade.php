@extends('layout.admin_layout')
@section('title')
    Add Category
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/saveadd_category') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Add Category</h2>
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
                  <label class="control-label" for="date01">Category Name :</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="category_name" required placeholder="Enter your full name">
                  </div>
                </div>

                
                  

               

                  <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Publication Status :</label>
                    <div class="controls">
                    <input type="checkbox" name="status" value="1">
                    </div>
                
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Category </button>
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