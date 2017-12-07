<!DOCTYPE html>
<head>
	<title>Login</title>
	
	<link href="/assets/login/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/login/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	 -->
	<link rel="stylesheet" type="text/css" href="/assets/login/css/templatemo_style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

	<script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/assets/js/login.js"></script>

</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="login-title">Login as Employer</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="/login" method="post">
	        	<div class="form-group">
	        		{{ csrf_field() }}
		        	<ul class="nav nav-tabs">
				        <li class="active change-tab pending-tab cursor-pointer" mode="pending"><a class="cursor-pointer"><i class="fa fa-user"></i> Employer</a></li>
				        <li class="cursor-pointer change-tab approve-tab" mode="approved"><a class="cursor-pointer"><i class="fa fa-users"></i> Employee</a></li>
				    </ul>
				</div>
		        <div class="form-group">
		          <div class="col-md-12">		            
		            <div class="control-wrapper">
		            	<label for="email" class="control-label fa-label"><i class="fa fa-envelope"></i></label>
		            	<input name="email" type="text" class="form-control" id="email" placeholder="Email">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input name="pass" type="password" class="form-control" id="password" placeholder="Password">
		            </div>
		          </div>
		        </div>
		        
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Log in" class="btn btn-info">
		          		<a href="forgot-password.html" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
		      </form>
		      <div class="text-center">
		      	<a href="create-account.html" class="templatemo-create-new">Create new account <i class="fa fa-plus-circle"></i></a>	
		      </div>
		</div>
	</div>
</body>
</html>