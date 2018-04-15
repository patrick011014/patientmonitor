<form class="global-submit form-horizontal" role="form" action="/member/modify-patient" method="post">
    {{csrf_field()}}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">{{$page}}</h4>
    </div>
    <div class="modal-body clearfix">
        <input type="hidden" name="patient_id" value="{{$row->patient_id}}">
        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">First Name</label>
                <input value="{{ $row->first_name }}" autocomplete="off" type="text" class="form-control" name="first_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Last Name</label>
                <input value="{{ $row->last_name }}" autocomplete="off" type="text" class="form-control" name="last_name">
            </div>
        </div>     

        <div class="form-group">
            <div class="col-md-6">
                <label for="basic-input">Middle Name</label>
                <input value="{{ $row->middle_name }}" autocomplete="off" type="text" class="form-control" name="middle_name">
            </div>
            <div class="col-md-6">
                <label for="basic-input">Sickness</label>
                <input value="{{ $row->sickness }}" autocomplete="off" type="text" class="form-control" name="sickness">
            </div>
        </div>  

        <div class="form-group">
            <div class="col-md-12">
                <label for="basic-input">Doctor</label>
                <select class="form-control doctors" name="doctor_id">
                  <option value="0">No doctor</option>
                  @foreach($doctors as $doctor)
                  <option @if($row->doctor_id == $doctor->doctor_id) selected @endif value="{{$doctor->doctor_id}}">{{$doctor->display_name}}</option>
                  @endforeach
                </select>
            </div>
        </div>

        <div class="pretty p-icon p-tada">
            <input type="checkbox" class="form-control" name="dex" @if($dex == 'on') checked @endif />
            <div class="state p-primary-o">
                <i class="icon fa fa-check"></i>
                <label>Dextrose</label>
            </div>
        </div>
        <div class="pretty p-icon p-tada">
            <input type="checkbox" class="form-control" name="temp" @if($temp == 'on') checked @endif />
            <div class="state p-primary-o">
                <i class="icon fa fa-check"></i>
                <label>Temperature</label>
            </div>
        </div>
        <div class="pretty p-icon p-tada">
            <input type="checkbox" class="form-control" name="pulse" @if($pulse == 'on') checked @endif />
            <div class="state p-primary-o">
                <i class="icon fa fa-check"></i>
                <label>Pulse</label>
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
        toastr.success("Successfully updated");
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