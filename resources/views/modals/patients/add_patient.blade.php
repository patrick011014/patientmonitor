<form class="global-submit form-horizontal" role="form" action="/member/add-patient" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">First Name</label>
                <input autocomplete="off" type="text" class="form-control" name="first_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Last Name</label>
                <input autocomplete="off" type="text" class="form-control" name="last_name">
            </div>
        </div>     

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Middle Name</label>
                <input autocomplete="off" type="text" class="form-control" name="middle_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Sickness</label>
                <input autocomplete="off" type="text" class="form-control" name="sickness">
            </div>
        </div>   



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-custom-primary" type="submit">Add</button>
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("Patient Added");
        data.element.modal('hide');
        patient.action_load_table();
    }
    function complete_fields(data)
    {
        toastr.error('Please complete all fields');
    }
    function not_match(data)
    {
        toastr.error("Password didn't match")
    }
</script>