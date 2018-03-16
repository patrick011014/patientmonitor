@extends('patientlayout')
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    {{-- <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div class="row clearfix">
          <div class="col-md-6" style="text-align: left;">
             <h4><b>Admin Dashboard</b></h4>
          </div>
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>

    <div class=" panel panel-default panel-block panel-title-block" >
      <div class="panel-body form-horizontal">
        Hello Admin
      </div>
    </div> --}}

    <div class="panel panel-default panel-block panel-title-block panel-gray "  style="margin-bottom: -10px;">
    <ul class="nav nav-tabs">
        <li class="active change-tab pending-tab cursor-pointer" mode="1st floor"><a class="cursor-pointer"><i class="fa fa-check"></i> 1st floor</a></li>
        <li class="cursor-pointer change-tab approve-tab" mode="2nd floor"><a class="cursor-pointer"><i class="fa fa-first-aid"></i> 2nd floor</a></li>
    </ul>
    {{-- <div class="search-filter-box">
        <div class="col-md-3" style="padding: 10px">
            <select class="form-control">
                <option value="0">Filter Sample 001</option>
            </select>
        </div>
        <div class="col-md-3" style="padding: 10px">
            <select class="form-control">
                <option value="0">Filter Sample 002</option>
            </select>
        </div>
        <div class="col-md-2" style="padding: 10px">
        </div>
        <div class="col-md-4" style="padding: 10px">
            <div class="input-group">
                <span style="background-color: #fff; cursor: pointer;" class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control search" placeholder="Search by item name" aria-describedby="basic-addon1">
            </div>
        </div>
    </div> --}}
    <div class="tab-content codes_container" style="min-height: 300px;">
        <div id="all" class="tab-pane fade in active">
            <div class="form-group order-tags"></div>
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="table-responsive load-table-here">
                    	{{-- <div class="col-md-2" style="padding:10px;">
                        	<button onclick="" class="btn btn-danger"><i class="fa fa-building"></i> <br>Room 201</button>
                        </div>
                    	@for($x=2;$x<10;$x++)
                        <div class="col-md-2" style="padding:10px;">
                        	<button onclick="" class="btn btn-primary"><i class="fa fa-building"></i> <br>Room 20{{$x}}</button>
                        </div>
                    	@endfor
                    	<div class="col-md-2" style="padding:10px;">
                        	<button onclick="" class="btn btn-warning"><i class="fa fa-building"></i> <br>Room 210</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="/assets/member/dashboard.js"></script>
@endsection