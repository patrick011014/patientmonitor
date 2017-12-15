@extends('layout')
@section('css')
<style type="text/css">

  .btn-success
  {
     vertical-align: middle;
     float: right;
     margin-top: 12px;
     margin-right: 15px;
  }
  .btn-primary 
  {
     vertical-align: middle;
     float: right;
     margin-top: 12px;
     margin-right: 15px;
  }



  @media screen and (max-width: 500px)
  {
    .btn-primary
    {
      float: none;
    }
  }

</style>

@endsection
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">

    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div class="row clearfix">
          <div class="col-md-6">
             <h1> Admin Dashboard > Employee List</h1>
          </div>    
            <button class="btn btn-primary popup" link="/admin/modal_create_employee" size="lg">Create Employee</button>
            <button class="btn btn-success popup" link="/admin/modal_import_201_file" size="lg">Import 201 File</button>
        </div>
      </div>
    </div>

    <div class=" panel panel-default panel-block panel-title-block" >
      <div class="panel-body form-horizontal">
        Hello Admin
      </div>
    </div>

  </div>
</div>
@endsection