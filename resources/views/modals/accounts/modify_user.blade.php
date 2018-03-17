<form class="global-submit form-horizontal" role="form" action="/member/modify-account" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">

        <input type="hidden" name="user_id" value="{{ $user->user_id }}">

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">First Name</label>
                <input value="{{ $user->first_name }}" autocomplete="off" type="text" class="form-control" name="first_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Middle Name</label>
                <input value="{{ $user->middle_name }}" autocomplete="off" type="text" class="form-control" name="middle_name">
            </div>
        </div>     

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Last Name</label>
                <input value="{{ $user->last_name }}" autocomplete="off" type="text" class="form-control" name="last_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Contact Number</label>
                <input value="{{ $user->contact_number }}" autocomplete="off" type="text" class="form-control" name="contact">
            </div>
        </div>   

        {{-- <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Password</label>
                <input autocomplete="off" type="password" class="form-control" name="password">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Confirm Password</label>
                <input autocomplete="off" type="password" class="form-control" name="confirm_pass">
            </div>
        </div>   --}}



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button class="btn btn-primary btn-custom-primary" type="submit"><i class="fa fa-edit"></i> Update</button>
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("Account Updated");
        data.element.modal('hide');
        accounts.action_load_table();
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