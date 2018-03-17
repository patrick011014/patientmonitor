<table class="table table-bordered table-striped table-condensed">
    <thead style="text-transform: uppercase">
        <tr>
            @if(count($rows)!=0)
            <th class="text-center">Patient Name</th>
            <th class="text-center">Sickness</th>
            <th class="text-center">Room Name</th>
            <th class="text-center">Room Level</th>
            <th class="text-center">Room Type</th>
            <!-- <th class="text-center">Shop Id</th> -->
            <th class="text-center"></th>
            @else
            <tr>
                <th class="text-center" colspan="5">NO DATA</th>
            </tr>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
        <tr id="{{ $row->patient_id }}">
            <td class="text-center">{{ $row->patient_display_name }}</td>
            <td class="text-center">{{ $row->sickness }}</td>
            <td class="text-center">{{ isset($row->room_name) ? $row->room_name : 'N/A' }}</td>
            <td class="text-center">{{ isset($row->room_level) ? $row->room_level : 'N/A' }}</td>
            <td class="text-center">{{ isset($row->room_type) ? $row->room_type : 'N/A' }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        @if($row->status == 'pending')
                        <li><a class="action" href="javascript:">Assign Room</a></li>
                        <li><a class="action" href="javascript:">Archive</a></li>
                        <li><a class="action" href="javascript:">Modify</a></li>
                        @elseif($row->status == 'archived')
                        <li><a class="action" href="javascript:">Restore</a></li>
                        @elseif($row->status == 'on_room')
                        <li><a class="action" href="javascript:">Assign Room</a></li>
                        <li><a class="action" href="javascript:">Archive</a></li>
                        <li><a class="action" href="javascript:">Modify</a></li>
                        @endif
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <div class="pull-right">
    {!! $rows->render() !!}
</div> --}}