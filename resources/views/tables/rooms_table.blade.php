<table class="table table-bordered table-striped table-condensed">
    <thead style="text-transform: uppercase">
        <tr>
            @if(count($rows)!=0)
            <th class="text-center">Room ID</th>
            <th class="text-center">Room Name</th>
            <th class="text-center">Room type</th>
            <th class="text-center">Room level</th>
            <th class="text-center">Room Key</th>
            <th class="text-center">Room Capacity</th>
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
        <tr id="{{ $row->room_id }}">
            <td class="text-center">{!! $row->room_id !!}</td>
            <td class="text-center">{!! $row->room_name !!}</td>
            <td class="text-center">{!! $row->room_type !!}</td>
            <td class="text-center">{!! $row->room_level !!}</td>
            <td class="text-center">{!! $row->display_arduino_key !!}</td>
            <td class="text-center"><a onclick="action_load_link_to_modal('/member/show-occupant?id={{$row->room_id}}','md')">{{ $row->occupant."/".$row->capacity }}</a></td>
            <td class="text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        <li style="">
                            @if($row->archived==0)
                            <a class="action-archive" href="javascript:">Archive</a>
                            @else
                            <a class="action-archive" href="javascript:">Restore</a>
                            @endif
                        </li>
                        <li>
                            <a class="action-modify" href="javascript:">Modify</a>
                        </li>
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