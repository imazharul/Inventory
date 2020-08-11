@extends('layout.admin_layout')
@section('title')
    import 
@endsection

@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <fieldset>
                <div class="container-fluid">
                  <div class="row" style="background-color: #4c88d8">
                    <h2 class="text-center">Product Import and Export</h2>
                  <a href="{{ url('/export') }}"  class="pull-right btn btn-danger btn-sm" >Dowanlod</a>
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
                  <label class="control-label" for="date01">XL File Import :</label>
                  <div class="controls">
                    <input type="file"  name="import_file" required >
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Upload</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

    
@endsection