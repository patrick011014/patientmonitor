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