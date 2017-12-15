@extends('layout')
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div style="text-align: left;" class="col-md-6">
          <h4><b> Request History</b></h4>
        </div>
        <div style="text-align: right;">
          <button class="btn btn-primary btn-custom-primary request-leave" type="button"> Request Leave</button>
        </div>
      </div>
    </div>
    <div class="panel panel-default panel-block panel-title-block panel-gray "  style="height:100%;margin-bottom: -10px;">
    <ul class="nav nav-tabs">
        <li class="active change-tab pending-tab cursor-pointer" mode="pending"><a class="cursor-pointer"><i class="fa fa-check-circle-o"></i> Approved</a></li>
        <li class="cursor-pointer change-tab approve-tab" mode="approved"><a class="cursor-pointer"><i class="fa fa-spinner fa-spin fa-fw"></i> Pending</a></li>
        <li class="cursor-pointer change-tab approve-tab" mode="approved"><a class="cursor-pointer"><i class="fa fa-times-circle"></i> Rejected</a></li>
    </ul>
    <!-- <div class="search-filter-box">
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
                <input type="text" class="form-control search-employee-name" placeholder="Search by employee name / number" aria-describedby="basic-addon1">
            </div>
        </div>
    </div> -->
    <div class="tab-content codes_container" style="min-height: 300px;">
        <div id="all" class="tab-pane fade in active">
            <div class="form-group order-tags"></div>
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-transform: uppercase">
                                @if(count($request)>0)
                                <tr>
                                    <th class="text-center">Date From</th>
                                    <th class="text-center">Date To</th>
                                    <th class="text-center">Reason</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                @else
                                <tr>
                                    <th class="text-center" colspan="5">No Request</th>
                                </tr>
                                @endif
                            </thead>
                            <tbody>
                                @foreach($request as $r)
                                <tr>
                                    <td class="text-center">Date From</td>
                                    <td class="text-center">Date To</td>
                                    <td class="text-center">Reason</td>
                                    <td class="text-center">Status</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.request-leave').click(function()
        {
            // action_load_link_to_modal(url, size);
            toastr.success("patri")
        })
    })
</script>
@endsection