<form class="global-submit form-horizontal" role="form" action="/member/add-patient" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">

        <div class="form-group">
            <div class="col-md-12">
                <center>
                {!! $qrcode !!}
                {{$string}}
                </center>
            </div>
        </div>     

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-custom-white" data-dismiss="modal">Close</button>
        {{-- <button class="btn btn-primary btn-custom-primary" type="submit">Add</button> --}}
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