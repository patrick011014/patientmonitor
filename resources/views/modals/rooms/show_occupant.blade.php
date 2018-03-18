<form class="global-submit form-horizontal" role="form" action="/member/add-room" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">

        <div class="form-group">
            <div class="col-md-12">
                <center>
                    @if(count($rows)<1)
                    <label for="basic-input">No occupants</label>
                    @endif
                    @foreach($rows as $row)
                    <label for="basic-input">{{ $row->patient_display_name }}</label>
                    @endforeach
                </center>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info btn-custom-white" data-dismiss="modal">Close</button>
        {{-- <button class="btn btn-primary btn-custom-primary" type="submit">Save</button> --}}
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("New room created");
        data.element.modal('hide');
        rooms.action_load_table();
    }
    function complete_fields(data)
    {
        toastr.error('Please complete all fields');
    }
    function invalid_capacity(data)
    {
        toastr.error("Invalid Room Capacity");
    }
</script>