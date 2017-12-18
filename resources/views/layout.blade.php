<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>sgsco</title>      
  <link rel="stylesheet" href="/assets/layoutdashboard/css/templatemo_main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="/assets/login/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/login/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" type="text/css" href="/assets/login/css/templatemo_style.css">
  <link rel="stylesheet" type="text/css" href="/assets/toaster/toastr.css?v=1">
  <link href="/assets/select2/select2.min.css" rel="stylesheet" type="text/css">

   @yield('css')
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Dashboard - Admin Template</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
          @if(Session::get('user_level') == 'admin')
          <li class="{{Request::segment(2) == 'dashboard' ? 'active' : ''}}"><a href="/admin/dashboard"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="{{Request::segment(2) == 'employee_list' ? 'active' : ''}}"><a href="/admin/employee_list"><i class="fa fa-cubes"></i>Employee List</a></li>
          <li class="{{Request::segment(2) == 'time_keeping' ? 'active' : ''}}"><a href="/admin/time_keeping"><i class="fa fa-map-marker"></i>Time Keeping</a></li>
          <!-- <li class="{{Request::segment(2) == 'employee_approver' ? 'active' : ''}}"><a href="/admin/employee_approver"><i class="fa fa-map-marker"></i>Employee Approver</a></li> -->
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Configuration <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="/admin/holiday">Holiday</a></li>
              <li><a href="/admin/shift_template">Shift Template</a></li>
            </ul>
          </li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
          @else
          <li class="{{Request::segment(2) == 'dashboard' ? 'active' : ''}}"><a href="/employee/dashboard"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="{{Request::segment(2) == 'profile_information' ? 'active' : ''}}"><a href="/employee/profile_information"><i class="fa fa-user"></i>Profile</a></li>
          <li class="{{Request::segment(2) == 'company_information' ? 'active' : ''}}"><a href="/employee/company_information"><i class="fa fa-map-marker"></i>Company Information</a></li>
          <li class="{{Request::segment(2) == 'leave_request' ? 'active' : ''}}"><a href="/employee/leave_request"><i class="fa fa-users"></i>Leave Request</a></li>
          <li class="{{Request::segment(2) == 'leave_approver' ? 'active' : ''}}"><a href="/employee/leave_approver"><i class="fa fa-cog"></i>Account Setting</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
          @endif
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        @yield('content')
      </div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="/logout" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>

      <div id="global_modal" class="modal fade" role="dialog" >
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content modal-content-global">
              </div>
          </div>
      </div>
      <!-- END GLOBAL MODAL -->
      <!-- GLOBAL MULTIPLE MODAL -->
      <div class="multiple_global_modal_container"></div>
      <!-- END GLOBAL MULTIPLE MODAL -->
      
    </div>
    <div class="modal-loader hidden"></div>
    <script src="/assets/layoutdashboard/js/jquery.min.js"></script>
    <script src="/assets/layoutdashboard/js/bootstrap.min.js"></script>
    <script src="/assets/layoutdashboard/js/Chart.min.js"></script>
    <script src="/assets/layoutdashboard/js/templatemo_script.js"></script>
    <script type="text/javascript" src="/assets/toaster/toastr.min.js?v=1"></script>
    <script src="/assets/select2/select2.min.js"></script>
    
    <!-- start global js -->
    <script src="/assets/layoutdashboard/global.js"></script>
    <!-- end global  js-->

    <!-- start datetimepicker ui js -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- end datetimepicker ui js -->
    @yield('scripts')
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(220,220,220,0.2)",
        strokeColor : "rgba(220,220,220,1)",
        pointColor : "rgba(220,220,220,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
  });
  </script>
</body>
</html>