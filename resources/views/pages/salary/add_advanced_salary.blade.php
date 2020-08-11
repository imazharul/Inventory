@extends('layout.admin_layout')
@section('title')
   Add Advance Salary
@endsection

@section('content')
    
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/insert_advance_salary') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Add Advanced Salary</h2>
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
                  <label class="control-label" for="date01">Emplyee :</label>
                  <?php 
                      $emp=DB::table('emplyee')->get();
                  ?>
                  <div class="controls">
                      <select name="emp_id" class="form-control">
                          <option selected> Select Emplyee</option>
                          @foreach ($emp as $v_row)
                      <option value="{{ $v_row->emplyee_id }}"> {{ $v_row->name }}</option>
                          @endforeach
                          
                      </select>
                  </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="date01">Month :</label>
                <div class="controls">
                    <select name="month" class="form-control">
                        <option selected> Select Month</option>
                        <option value="January"> January</option>
                        <option value="February"> February</option>
                        <option value="March"> March</option>
                        <option value="April"> April</option>
                        <option value="May"> May</option>
                        <option value="June"> June</option>
                        <option value="July"> July</option>
                        <option value="August"> August</option>
                        <option value="September"> September</option>
                        <option value="October"> October</option>
                        <option value="November"> November</option>
                        <option value="December"> December</option>
                    </select>
                </div>
            </div>
                    <div class="control-group">
                      <label class="control-label" for="date01">Year :</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="year" required placeholder="Enter your year">
                      </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Advance Salary:</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="advance_salary" required placeholder="Enter your advance ">
                    </div>
                  </div>
                  <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Publication Status :</label>
                    <div class="controls">
                    <input type="checkbox" name="status" value="1">
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Salary </button>
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