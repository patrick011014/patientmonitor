<form class="global-submit form-horizontal" role="form" action="/employee/set_approver" method="post">
	{{csrf_field()}}
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h4 class="modal-title">{{$page}}</h4>
	</div>
	<div class="modal-body clearfix">
		
		<div class="form-group">
            <div class="col-md-12">
                <select style="width: 100%;" class="form-control select2" name="approver_employee_id">
				  @foreach($employee as $emp)
				  <option value="{{$emp->employee_id}}">{{$emp->employee_first_name." ".$emp->employee_last_name}}</option>
				  @endforeach
				</select>
                <input type="hidden" name="approver_type" value="{{$approver_type}}">
            </div>
        </div>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger btn-custom-white" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
		<button class="btn btn-primary btn-custom-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
	</div>
</form>

<script type="text/javascript">
	function success(data)
	{
		toastr.success('Line Manager Set');
		data.element.modal('hide');
	}
	function error_employee_name()
	{
		toastr.error('Invalid Manager Name');
	}
	$(document).ready(function() 
	{
	    $('.select2').select2();
	});
</script>