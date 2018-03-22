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
                    <div class="load-activation-here">
                        <div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>
                    </div>
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
    $(document).ready(function()
    {
        setInterval(function()
        {
            $.ajax(
            {
                url: '/member/activation-code',
                type: 'get',
                success: function(data)
                {
                    $('.load-activation-here').html(data);
                }
            });
        },1000);
    });
</script>
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