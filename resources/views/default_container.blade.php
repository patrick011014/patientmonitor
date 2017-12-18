@extends('layout')
@section('css')
@endsection
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
      	<div class="row clearfix">
      	  <div class="col-md-6" style="text-align: left;">
      	     <h4><b>Employee List</b></h4>
      	  </div>
      	  <div class="col-md-6">
      	    <button class="btn btn-primary pull-right popup" link="/admin/modal_create_employee" size="lg" style="margin-left: 5px">Create Employee</button>
      	    <button class="btn btn-success pull-right popup" link="/admin/modal_import_201_file" size="lg">Import 201 File</button>
      	  </div>
      	</div>
  	  </div>
  	</div>

  	<div class=" panel panel-default panel-block panel-title-block" >
  	  <div class="panel-body form-horizontal">
        
  	  </div>
  	</div>
  </div>
</div>
@endsection
@section('script')
@endsection