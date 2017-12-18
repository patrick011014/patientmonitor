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
        <div class="form-group clearfix row">
          <div class="col-md-12">
            <input class="form-control" type="text" name="search_name" placeholder="search employee name">
          </div>
          
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John</td>
                <td>Henry</td>
                <td>@jh</td>
                <td>a@company.com</td>                    
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Bill</td>
                <td>Goods</td>
                <td>@bg</td>
                <td>bg@company.com</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Authen</td>
                <td>Jobs</td>
                <td>@aj</td>
                <td>aj@company.com</td>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Jesica</td>
                <td>High</td>
                <td>@jh</td>
                <td>jh@company.com</td>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Tom</td>
                <td>Grace</td>
                <td>@tg</td>
                <td>tg@company.com</td>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Book</td>
                <td>Rocker</td>
                <td>@br</td>
                <td>br@company.com</td>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Archived</a></li>
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
@endsection