<form class="global-submit" method="post" action="#">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Title</h4>
			<input type="hidden" name="_token" value="csrf_token()">
		</div>
		<div class="modal-body">
			<div class="form-group row clearfix">
				<div class="col-md-12">
					<small for="holiday_name">Holiday Name</small>
					<input class="form-control" id="holiday_name" type="text" name="holiday_name">
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-6">
					<small for="holiday_date">Holiday Date</small>
					<input class="form-control" id="holiday_date" type="date" name="holiday_date">
				</div>
				<div class="col-md-6">
					<small for="holiday_category">Holiday Category</small>
					<input class="form-control" id="holiday_category" type="text" name="holiday_category">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">create</button>
		</div>
	</div>
</form>
