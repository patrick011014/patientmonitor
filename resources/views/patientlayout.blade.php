<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width"> 
  <title>Patient Monitoring System</title>      
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
        <div class="logo"><h1>Patient Monitoring System</h1></div>
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
          {{-- <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li> --}}
          <li class="{{Request::segment(2) == '' ? 'active' : ''}}"><a href="/member"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="{{Request::segment(2) == 'rooms' ? 'active' : ''}}"><a href="/member/rooms"><i class="fa fa-building"></i>Manage Rooms</a></li>
          <li class="{{Request::segment(2) == 'patients' ? 'active' : ''}}"><a href="/member/patients"><i class="fa fa-wheelchair"></i>Patients</a></li>
          <li class="{{Request::segment(2) == 'accounts' ? 'active' : ''}}"><a href="/member/accounts"><i class="fa fa-users"></i>Manage Accounts</a></li>
          <li class="{{Request::segment(2) == 'doctors' ? 'active' : ''}}"><a href="/member/doctors"><i class="fa fa-user-md"></i>Doctors</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>

        </ul>
      </div><!--/.navbar-collapse -->

       @yield('content')


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
    
</body>
</html>