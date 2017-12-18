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
      	     <h4><b>Time Keeping</b></h4>
      	  </div>
      	  <div class="col-md-6">
      	    <button class="btn btn-primary pull-right popup" link="/admin/modal_create_period" size="md" style="margin-left: 5px">Create Period</button>
      	    <button class="btn btn-success pull-right popup" link="/admin/modal_import_time_sheet" size="md">Import Time Sheet</button>
      	  </div>
      	</div>
  	  </div>
  	</div>

  	<div class=" panel panel-default panel-block panel-title-block" >
  	  <div class="panel-body form-horizontal">
			<div class="panel-body form-horizontal">
			  <div class="table-responsive">
			    <table class="table table-striped table-hover table-bordered">
			      <thead>
			        <tr>
			          <th>#</th>
			          <th>Date Start</th>
			          <th>Date End</th>
			          <th>Contribution Month</th>
			          <th>Contribution Year</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
			          <td>1</td>
			          <td>January 1, 2017</td>
			          <td>January 30, 2017</td>
			          <td>January</td>
			          <td>2017</td>                    
			          <td>
			            <!-- Split button -->
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
			          <td>2</td>
			          <td>February 1, 2017</td>
			          <td>February 28, 2017</td>
			          <td>February</td>
			          <td>2017</td>                    
			          <td>
			            <!-- Split button -->
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
			          <td>3</td>
			          <td>March 1, 2017</td>
			          <td>March 30, 2017</td>
			          <td>March</td>
			          <td>2017</td>                    
			          <td>
			            <!-- Split button -->
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
			          <td>4</td>
			          <td>April 1, 2017</td>
			          <td>April 30, 2017</td>
			          <td>April</td>
			          <td>2017</td>                    
			          <td>
			            <!-- Split button -->
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
			  <ul class="pagination pull-right">
			    <li class="disabled"><a href="#">&laquo;</a></li>
			    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
			    <li><a href="#">&raquo;</a></li>
			  </ul>
			</div>
  	  </div>
  	</div>
  </div>
</div>
@endsection
@section('script')
@endsection