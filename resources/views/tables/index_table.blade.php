<div class="col-md-12">
	<h1 class="pull-left">
		@if(count($private)<1)
		No
		@endif
		Private Rooms
	</h1>
	<div class="col-md-12"></div>
	@foreach($private as $room)
	<div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div>
	@endforeach
</div>

<div class="col-md-12">
	<h1 class="pull-left">
		@if(count($ward)<1)
		No
		@endif
		Ward Rooms
	</h1>
	<div class="col-md-12"></div>
	@foreach($ward as $room)
	<div class="col-md-2" style="padding:10px;">
		<button onclick="" class="btn btn-primary"><i class="fa fa-building"></i> <br> {{ $room->room_name }} </button>
	</div>
	@endforeach
</div>