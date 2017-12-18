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
      	     <h4><b>Holiday</b></h4>
      	  </div>
      	  <div class="col-md-6">
      	    <button class="btn btn-primary pull-right popup" link="/admin/modal_create_holiday" size="lg" style="margin-left: 5px">Create Holiday</button>
      	  </div>
      	</div>
  	  </div>
  	</div>

  	<div class=" panel panel-default panel-block panel-title-block" >
  	  <div class="panel-body form-horizontal">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>Holiday Name</th>
                <th>Date</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>New Year</td>
                <td>January 1, 2018</td>
                <td>Regular</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Delete</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Special Non-Working</td>
                <td>January 26, 2018</td>
                <td>Special</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Delete</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Government Declared Holiday</td>
                <td>February 15, 2018</td>
                <td>Regular</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Delete</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
  	  </div>
  	</div>
  </div>
</div>
@endsection
@section('script')
@endsection