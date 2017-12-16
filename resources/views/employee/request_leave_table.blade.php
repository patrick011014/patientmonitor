<table class="table table-bordered table-striped table-condensed">
    <thead style="text-transform: uppercase">
        @if(count($request)>0)
            <tr>
                <th class="text-center" width="150px">Date From</th>
                <th class="text-center" width="150px">Date To</th>
                <th class="text-center">Reason</th>
                @if($activetab == 'approved')
                <th class="text-center" width="200px">Approved By</th>
                @elseif($activetab == 'pending')
                <th class="text-center" width="150px">Status</th>
                @elseif($activetab == 'rejected')
                <th class="text-center" width="200px">Rejected By</th>
                @endif
            </tr>
        @else
        <tr>
            <th class="text-center" colspan="5">No Data</th>
        </tr>
        @endif
    </thead>
    <tbody>
        @foreach($request as $r)
        <tr>
            <td class="text-center" width="150px">{{$r->date_from}}</td>
            <td class="text-center" width="150px">{{$r->date_to}}</td>
            <td class="text-center">{{$r->reason}}</td>
            @if($r->status == 'approved')
            <td class="text-center" width="200px">{{$r->approve_two_by}}</td>
            @elseif($r->status == 'pending')
                @if($r->approve_one_by == '')
                <td class="text-center" width="150px">Pending</td>
                @else
                <td class="text-center" width="150px">Approved(Not Final)</td>
                @endif
            @elseif($r->status == 'rejected')
            <td class="text-center" width="200px">{{$r->rejected_by}}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>