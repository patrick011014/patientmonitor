<div class="col-md-12">
	<h4 class="pull-left">
		<b>
		@if(count($private)<1)
		No
		@endif
		Private Rooms
		</b>
	</h4>
	<div class="col-md-12"></div>
	@foreach($private as $room)
	<div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div>
	@endforeach
	{{-- <div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-default"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div> --}}
</div>

<div class="col-md-12">
	<h4 class="pull-left">
		<b>
		@if(count($ward)<1)
		No
		@endif
		Ward
		</b>
	</h4>
	<div class="col-md-12"></div>
	@foreach($ward as $room)
	<div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div>
	@endforeach
</div>