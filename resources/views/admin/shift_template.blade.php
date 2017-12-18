@extends('layout')
@section('css')
<style type="text/css">
  th{
    text-align: center;
  }
  td{
    text-align: center;
  }
</style>
@endsection
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
      	<div class="row clearfix">
      	  <div class="col-md-6" style="text-align: left;">
      	     <h4><b>Shift Template</b></h4>
      	  </div>
      	  <div class="col-md-6">
      	    <button class="btn btn-primary pull-right popup" link="/admin/modal_create_shift" size="lg" style="margin-left: 5px">Create Shift</button>
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