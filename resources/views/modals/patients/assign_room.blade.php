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
                  @if(isset($no_room))
                  <option value="no_room">{{$no_room}}</option>
                  @else
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
                  @endif
                </select>
            </div>
        </div> 

        @if(!isset($no_room))
        @if($room_type == 'Ward')
        <div class="form-group">
            <div class="col-md-12">
                <label>Bed No</label>
                <select class="form-control bed-key" name="bed_key">
                  @foreach($room_beds as $key => $value)
                    @if($value != '')
                      @if(!in_array($value, $occupied_beds))
                      <option value="{{$value}}">Bed {{$key+1}}</option>
                      @endif
                    @endif
                  @endforeach
                </select>
            </div>
        </div>
        @endif
        @endif



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal">Close</button>
        @if(!isset($no_room))
        <button class="btn btn-primary btn-custom-primary" type="submit">Assign</button>
        @endif
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
    function no_room()
    {
      toastr.error('No room available');
    }
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.rooms').select2();
    });
</script>