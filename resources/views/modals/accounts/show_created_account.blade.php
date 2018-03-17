<form class="global-submit form-horizontal" role="form" action="/member/add-user" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">

        {{-- <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">First Name</label>
                <input disabled autocomplete="off" type="text" class="form-control" value="{{ $user->first_name }}">
            </div>
        </div>  

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Middle Name</label>
                <input disabled autocomplete="off" type="text" class="form-control" value="{{ $user->middle_name }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Last Name</label>
                <input disabled autocomplete="off" type="text" class="form-control" value="{{ $user->last_name }}">
            </div>
        </div> --}}

        {{-- <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Name</label>
                <input disabled autocomplete="off" type="text" class="form-control" value="{{  $user->first_name . " ". $user->middle_name . " " . $user->last_name }}">
            </div>
        </div> --}}

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Username</label>
                <b><input disabled autocomplete="off" type="text" class="form-control" value="{{ $user->username }}"><b>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Password</label>
                <b><input disabled autocomplete="off" type="text" class="form-control" value="{{ Crypt::decrypt($user->password) }}"><b>
            </div>
        </div>




    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info btn-custom-white" data-dismiss="modal">Close</button>
        {{-- <button class="btn btn-primary btn-custom-primary" type="submit">Create</button> --}}
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("Account Created");
        data.element.modal('hide');
        accounts.action_load_table();
    }
    function complete_fields(data)
    {
        toastr.error('Please complete all fields');
    }
</script>