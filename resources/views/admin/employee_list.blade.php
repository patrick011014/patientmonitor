@extends('layout')
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div style="text-align: left;" class="col-md-6">
          <h4><b>Admin Dashboard &nbsp; Employee List</b></h4>
        </div>
        <div style="text-align: right;">
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