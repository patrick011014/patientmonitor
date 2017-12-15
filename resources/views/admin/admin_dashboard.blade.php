@extends('layout')
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div>
          <h1>
          <span class="page-title">Admin Dashboard</span>
          </h1>
        </div>
      </div>
    </div>

    <div class=" panel panel-default panel-block panel-title-block" >
      <div class="panel-body form-horizontal">
        Hello Admin
        <button class="btn btn-primary popup" link="/admin/sample_modal" size="md">Modal</button>
      </div>
    </div>
  </div>
</div>
@endsection