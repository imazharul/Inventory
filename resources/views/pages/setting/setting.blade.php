@extends('layout.admin_layout')
@section('title')
    Setting
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Setting Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>

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

        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/updatesetting', $sett->setting_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Company Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="company_name" value="{{$sett->company_name}}">
                  </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company address :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_address" value="{{$sett->company_address}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company email :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_email" value="{{$sett->company_email}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company phone :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_phone" value="{{$sett->company_phone}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company mobile :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_mobile" value="{{$sett->company_mobile}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company country :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_country" value="{{$sett->company_country}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company city :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_city" value="{{$sett->company_city}}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Company zipcode :</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="company_zipcode" value="{{$sett->company_zipcode}}">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="fileInput">Company Logo :</label>
                    <div class="controls">
                      <img id="image" src="#">
                      <input class="input-file uniform_on" name="conpany_logo" id="fileInput" type="file"accept="image*" class="upload" required onchange="readURL(this);"/>
                    </div>
                  </div>
                
                <div class="form-actions">
                  <button type="submit" class="btn btn-success"> Update </button>
                  
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
@endsection()