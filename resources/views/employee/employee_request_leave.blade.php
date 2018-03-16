@extends('layout')
@section('content')
<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class="panel panel-default panel-block panel-title-block" id="top">
      <div class="panel-heading">
        <div class="row clearfix">
          <div class="col-md-6" style="text-align: left;">
             <h4><b>Leave Request History</b></h4>
          </div>
          <div class="col-md-6">
            <button class="pull-right btn btn-info btn-custom-primary request-leave" type="button"><i class="fa fa-reply" aria-hidden="true"></i> Request Leave</button>
            <button style="margin-right: 10px;" class="pull-right btn btn-primary btn-custom-primary set-approver" type="button"><i class="fa fa-cog" aria-hidden="true"></i> Request Setting</button>
          </div>
        </div>
        
      </div>
    </div>

    <div class=" panel panel-default panel-block panel-title-block" >
      <div class="panel-body form-horizontal">
        
        <div class="panel panel-default panel-block panel-title-block panel-gray "  style="margin-bottom: -10px;">
            <ul class="nav nav-tabs">
                <li class="active cursor-pointer change-tab approve-tab" mode="pending"><a class="cursor-pointer"><i class="fa fa-spinner fa-spin"></i> Pending</a></li>
                <li class="change-tab pending-tab cursor-pointer" mode="approved"><a class="cursor-pointer"><i class="fa fa-check-circle"></i> Approved</a></li>
                <li class="cursor-pointer change-tab approve-tab" mode="rejected"><a class="cursor-pointer"><i class="fa fa-times-circle-o"></i> Rejected</a></li>
            </ul>
            <!-- filter div -->
            <div class="tab-content codes_container" style="min-height: 300px;">
                <div id="all" class="tab-pane fade in active">
                    <div class="form-group order-tags"></div>
                    <div class="clearfix">
                        <div class="col-md-12">
                            <div class="table-responsive load-table-here">
                                
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript" src="/assets/js/request_leave.js?v=2"></script>
@endsection

