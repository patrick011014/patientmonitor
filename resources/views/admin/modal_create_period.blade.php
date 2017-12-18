<form class="global-submit" method="post" action="#">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Create Period</h4>
			<input type="hidden" name="_token" value="csrf_token()">
		</div>
		<div class="modal-body">
			<div class="row clearfix">
				<div class="col-md-6">
					<small for="contribution_month">Contribution Month</small>
					<select class="form-control" id="contribution_month" name="period_contribution_month">
						<option value="Select Month">Select Month</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>
				</div>
				<div class="col-md-6">
					<small for="contribution_year">Contribution Year</small>
					<input class="form-control" id="contribution_year" type="text" name="period_contribution_year" value="2017">
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-6">
					<small for="period_start">Period Start</small>
					<input class="form-control" id="period_start" type="date" name="period_start" value="2017">
				</div>
				<div class="col-md-6">
					<small for="period_end">Period End</small>
					<input class="form-control" id="period_end" type="date" name="period_end" value="2017">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Create</button>
		</div>
	</div>
</form>
