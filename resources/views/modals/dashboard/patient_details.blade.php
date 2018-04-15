@foreach($patient as $value)
<div class="form-group">
    <div class="col-md-12">
        <label>Patient's Name:</label>
        <label for="basic-input" >{{ $value->patient_display_name }}</label>
    </div>

    @if($value->active_dex == '1')
    <div class="col-md-12">
        <label>Dextrose level:</label>
        <label for="basic-input" >{!! $value->display_dex !!}</label>
    </div>
    @endif

    @if($value->active_temp == '1')
    <div class="col-md-12">
        <label>Temperature:</label>
        <label for="basic-input" >{!! $value->display_temp !!}</label>
    </div>
    @endif

    @if($value->active_pulse == '1')
    <div class="col-md-12">
        <label>Pulse:</label>
        <label for="basic-input" >{!! $value->display_pulse !!}</label>
    </div>
    @endif

    <div class="col-md-12">
        {{-- <label>Pulse:</label> --}}
        <label for="basic-input" >{!! $value->date_created !!}</label>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary btn-custom-primary notify-doctor" id="{{ $value->patient_id }}" type="button">Notify Doctor</button>
    </div>

</div> 
@endforeach
<div class="pull-right">
    <center>
    <b>
    <h6>
    {{ $date }}
    </h6>
    <h6>
    {{ $time }}
    </h6>
    </b>
    </center>
</div>