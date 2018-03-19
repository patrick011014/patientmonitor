<div class="col-md-12">
	<div class="col-md-12">
		<h4 class="pull-left">
			<b>
			@if(count($private)<1)
			No
			@endif
			Private Rooms
			</b>
		</h4>
	</div><br><br>
	<div class="col-md-12"></div>
	@foreach($private as $room)
	<div class="col-md-2" style="padding:10px;">
		<center>
		@if($room->occupant > 0)
			@if($room->status == 'emergency')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-danger"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@elseif($room->status == 'assistance')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-warning"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@elseif($room->status == 'normal')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@else
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-info"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			<br> <h6>Device Not Connected</h6>
			@endif
		@else
			<button onclick="" class="btn btn-default"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
		@endif
		</center>
	</div>
	@endforeach
	{{-- <div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-default"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div> --}}
</div>

<div class="col-md-12">
	<div class="col-md-12">
		<h4 class="pull-left">
			<b>
			@if(count($ward)<1)
			No
			@endif
			Ward
			</b>
		</h4>
	</div><br><br>
	<div class="col-md-12"></div>
	@foreach($ward as $room)
	<div class="col-md-2" style="padding:10px;">
		<center>
		@if($room->occupant > 0)
			@if($room->status == 'emergency')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-danger"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@elseif($room->status == 'assistance')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-warning"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@elseif($room->status == 'normal')
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			@else
			<button onclick="action_load_link_to_modal('/member/show-patient-details?id={{ $room->room_id }}','md')" class="btn btn-info"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
			<br> <h6>Device Not Connected</h6>
			@endif
		@else
			<button onclick="" class="btn btn-default"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
		@endif
		</center>
	</div>
	@endforeach
</div>