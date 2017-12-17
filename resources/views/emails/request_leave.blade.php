<!DOCTYPE html>
<html>
<head>
<style>
.background-container
{
	position: relative;
	width: 100%;
	background-position: center;
	padding: 10px 0px;
}
.container
{
	background-color: #f1f1f1;
	margin: 0px 100px;
	padding: 40px 40px;
	border-radius: 10px;
}
div
{
	text-align: justify;
    text-justify: inter-word; 
}
.message
{
	text-align: justify;
    text-justify: inter-word;
    width: 52%;
}
.header 
{
	margin-left: 100px;
}
.footer
{
	margin-left: 100px;
}

.approve 
{
	border: none; /* Remove borders */
    color: white; /* Add a text color */
    padding: 14px 28px; /* Add some padding */
    cursor: pointer; /* Add a pointer cursor on mouse-over */
	background-color: #2ecc71;
	border-radius: 3px;
}
.approve:hover 
{
	background: #27ae60;
}
.reject 
{
	border: none; /* Remove borders */
    color: white; /* Add a text color */
    padding: 14px 28px; /* Add some padding */
    cursor: pointer; /* Add a pointer cursor on mouse-over */
	background-color: #e74c3c;
	border-radius: 3px;
}
.reject:hover 
{
	background: #c0392b;
}
</style>

</head>
<body>
	<div class="background-container">
		<div class="container">
			<div class="header">
				<h3>Dear {{$recipient_name}},</h3>
			</div>
			<center>
			<div class="message">
				 	I would like to request a formal leave of absence from my job. I plan to be away from
				    <font color="#f39c12">{{$date_from}} - {{$date_to}}</font>, 
				    because {{$reason}}.
					<br><br>
					If approved, I would be glad to help with a plan to cover my workload in my absence.
					I would also be available to answer questions and provide assistance while I am away.
					<br><br>
					Please let me know if you need any additional information. Thank you very much for your
					consideration of my request.
			</div>
			<div class="footer">
				<h4>
				Sincerely,<br>
				{{$sender_name}}
				</h4>
			</div>
			<a target="_blank" href="{{$domain}}/respond_to_request/approve?{{$link}}" ><button class="approve">Approve</button></a>
			<a target="_blank" href="{{$domain}}/respond_to_request/reject?{{$link}}" ><button class="reject">Reject</button></a>
			</center>
		</div>
	</div>
</body>
</html>


