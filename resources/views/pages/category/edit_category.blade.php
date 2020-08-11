@extends('layout.admin_layout')
@section('title')
    Update category
@endsection
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category Information</h2>
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
            <form class="form-horizontal" action="{{ url('/update_category',$category_info->category_id) }}" method="POST">
                {{ csrf_field() }}
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="date01">Category Name :</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" name="category_name" value="{{$category_info->category_name}}">
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-success"> Update </button>
                  
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

@endsection()