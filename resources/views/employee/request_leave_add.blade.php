<form class="global-submit form-horizontal" role="form" action="/employee/leave_request_add" method="post">
	<div class="modal-header">
		{{csrf_field()}}
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h4 class="modal-title">{{$page}}</h4>
	</div>
	<div class="modal-body clearfix">

		<div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Date From</label>
                <input required id="basic-input"  type="date"  class="form-control date_from" name="date_from">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Date To</label>
                <input required id="basic-input" type="date"  class="form-control date_to" name="date_to">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Reason</label>
                <textarea required class="form-control" name="reason"></textarea>
            </div>
        </div>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger btn-custom-white" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
		<button class="btn btn-primary btn-custom-primary" type="submit"><i class="fa fa-share-square-o" aria-hidden="true"></i> Submit</button>
	</div>
</form>

<script type="text/javascript">
	function success(data)
	{
		toastr.success("Request Send");
    	data.element.modal("hide");
	}
	function error(data)
	{
		toastr.error("An unexpected error occurs");
	}
</script>