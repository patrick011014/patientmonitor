<form class="global-submit form-horizontal" role="form" action="/member/assign-room" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">
        <input type="hidden" name="patient_id" value="{{ $patient_id }}">
        <div class="form-group">
            <div class="col-md-12">
                <label>Room</label>
                <select class="form-control rooms" name="room_id">
                  <optgroup label="1st floor">
                      @foreach($first_floor as $room)
                      <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                      @endforeach
                  </optgroup>
                  <optgroup label="2st floor">
                      @foreach($second_floor as $room)
                      <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                      @endforeach
                  </optgroup>
                </select>
            </div>
        </div> 



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-custom-primary" type="submit">Assign</button>
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("Room successfully assigned");
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
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.rooms').select2();
    });
</script>