<form class="global-submit form-horizontal" role="form" action="/member/add-room" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">
        <div class="content-holder">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="basic-input">Room Name</label>
                    <input autocomplete="off" id="basic-input" type="text" class="form-control" name="room_name">
                </div>
                <div class="col-md-6">
                    <label for="basic-input">Room Type</label>
                    <select class="form-control room_type" name="room_type">
                        <option>Private Room</option>
                        <option>Ward</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <label for="basic-input">Room Key</label>
                    <input autocomplete="off" id="basic-input" type="text" class="form-control" name="arduino_key">
                </div>
                <div class="col-md-6">
                    <label for="basic-input">Room Level</label>
                    <select class="form-control" name="room_level">
                        <option>1st floor</option>
                        <option>2nd floor</option>
                    </select>
                </div>
            </div>  

            <div class="form-group">
                <div class="col-md-6">
                    <label for="basic-input">Room Capacity</label>
                    <input autocomplete="off" id="basic-input" type="text" class="form-control" name="room_capacity">
                </div>
            </div>
        </div>    
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-def-white btn-custom-white" data-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-custom-primary" type="submit">Save</button>
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
    var t = null;
    function event_capacity_change()
    {
        clearTimeout(t);
        t = setTimeout(function()
        {
            var x = $('.room_capacity').val();

            if(x > 20)
            {
                toastr.error("Max of 10 beds per ward");
            }
            else if($.isNumeric(x))
            {
                var content = '';
                for(var i=0;i<x;i++)
                {
                    content += 
                    '<div class="col-md-6">'+
                        '<label for="basic-input">Bed '+(i+1)+' Key</label>'+
                        '<input autocomplete="off" id="basic-input" type="text" class="form-control" name="arduino_key'+(i+1)+'">'+
                    '</div>';
                }
            }
            else
            {
                $('.arduino_key_bed').html('');
            }

            $('.arduino_key_bed').html(content);

        }, 500);
    }
</script>