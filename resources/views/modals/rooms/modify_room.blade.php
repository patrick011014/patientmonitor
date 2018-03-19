<form class="global-submit form-horizontal" role="form" action="/member/modify-room" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">
        <div class="form-group">

            <input type="hidden" name="room_id" value="{{ $room_id }}">

            <div class="col-md-6">
                <label for="basic-input">Room Name</label>
                <input autocomplete="off" value="{{ $row->room_name }}" id="basic-input" type="text" class="form-control" name="room_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Room Type</label>
                <select class="form-control" name="room_type">
                    <option @if($row->room_type == 'Private Room') selected @endif >Private Room</option>
                    <option @if($row->room_type == 'Ward') selected @endif >Ward</option>
                </select>
            </div>
        </div> 

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Room Capacity</label>
                <input value="{{ $row->capacity }}" autocomplete="off" id="basic-input" type="text" class="form-control" name="room_capacity">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Room Level</label>
                <select class="form-control" name="room_level">
                    <option @if($row->room_level == '1st floor') selected @endif >1st floor</option>
                    <option @if($row->room_level == '2nd floor') selected @endif >2nd floor</option>
                </select>
            </div>
        </div> 

        @if($row->room_type != 'Ward')
        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Room Key</label>
                <input value="{{ $row->arduino_key }}" autocomplete="off" id="basic-input" type="text" class="form-control" name="arduino_key">
            </div>
        </div> 
        @endif

        {{-- for ward only --}}
        @if($row->room_type == 'Ward')
        <div class="form-group">
            @for($x=0;$x<count($beds);$x++)
            @if($beds[$x] != '')
            <div class="col-md-6">
                <label for="basic-input">Bed {{$x+1}} Key</label>
                <input value="{{ $beds[$x] }}" autocomplete="off" id="basic-input" type="text" class="form-control" name="arduino_key">
            </div>
            @endif
            @endfor
        </div> 
        @endif


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-custom-primary" type="submit">Save</button>
    </div>
</form>
<script type="text/javascript">
    function success(data)
    {
        toastr.success("Room updated");
        data.element.modal('hide');
        rooms.action_load_table();
    }
    function complete_fields(data)
    {
        toastr.error('Please complete all fields');
    }
    function invalid_capacity(data)
    {
        toastr.error('Invalid room capacity');
    }
</script>