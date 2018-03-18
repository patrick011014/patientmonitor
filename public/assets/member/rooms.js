var rooms = new rooms();

var table_data = {};
var x = null;

function rooms()
{
	init();

	this.action_load_table = function()
	{
		action_load_table();
	}

	function init()
	{
		$(document).ready(function()
		{
			document_ready();
		});
	}
	function document_ready()
	{
		action_load_table();
		event_change_tab();
		event_filters();
		event_modify();
		event_search();
		event_archive();
		event_change_room_type();
	}
	function event_change_tab(e)
	{
		$('.change-tab').click(function(e)
		{
			$('.change-tab').removeClass('active');
			$(e.currentTarget).addClass('active');
			action_load_table();
		});
	}
	function action_table_loader()
	{
		$(".load-table-here").html('<div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
	}
	function action_load_table()
	{
		table_data.activetab = $('.change-tab.active').attr('mode');
		table_data.search = $('.search').val();
		table_data.type = $('.room_type').val();
		table_data.level = $('.room_level').val();
		// console.log(table_data);
		action_table_loader();
		$.ajax(
		{
			url: '/member/room-table',
			type: "get",
			data: table_data,
			success: function(data)
			{
				$('.load-table-here').html(data);
			}
		});
	}
	function event_search()
	{
		$('.search').keydown(function()
		{
			action_table_loader();
			clearTimeout(x);

			x = setTimeout(function()
			{
				action_load_table();
			}, 1000);
		});
	}
	function event_filters()
	{
		$('.room_type').change(function()
		{
			action_load_table();
		});
		$('.room_level').change(function()
		{
			action_load_table();
		});
	}
	function event_modify()
	{
		$('body').on('click','.action-modify',function(e)
		{
			var room_id = $(e.currentTarget).closest('tr').attr('id');
			action_load_link_to_modal('/member/modify-room?id='+room_id,'md');
			// console.log('clicked');
		});
	}
	function event_archive()
	{
		$('body').on('click','.action-archive',function(e)
		{
			var id = $(e.currentTarget).closest('tr').attr('id');
			var action = $(e.currentTarget).text();
			// console.log('archive');

			$.ajax(
			{
				url : "/member/archive",
				type: "get",
				data: {"id":id,"action":action},
				success: function(data)
				{
					action_load_table();
				}
			});

		});
	}
	function event_change_room_type()
	{
		$('body').on('change','.room_type',function()
		{
			var content = '';
			if(this.value == 'Ward')
			{
				content = ''+
				'<div class="form-group">'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Name</label>'+
	                    '<input autocomplete="off" id="basic-input" type="text" class="form-control" name="room_name">'+
	                '</div>'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Type</label>'+
	                    '<select class="form-control room_type" name="room_type">'+
	                        '<option>Private Room</option>'+
	                        '<option selected>Ward</option>'+
	                    '</select>'+
	                '</div>'+
	            '</div>'+
	            '<div class="form-group">'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Capacity</label>'+
	                    '<input onkeydown="event_capacity_change()" autocomplete="off" id="basic-input" type="text" class="form-control room_capacity" name="room_capacity">'+
	                '</div>'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Level</label>'+
	                    '<select class="form-control" name="room_level">'+
	                        '<option>1st floor</option>'+
	                        '<option>2nd floor</option>'+
	                    '</select>'+
	                '</div>'+
	            '</div>'+
	            '<div class="form-group arduino_key_bed">'+
	                
	            '</div>'
	            +'';
			}
			else
			{
				content = ''+
				'<div class="form-group">'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Name</label>'+
	                    '<input autocomplete="off" id="basic-input" type="text" class="form-control" name="room_name">'+
	                '</div>'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Type</label>'+
	                    '<select class="form-control room_type" name="room_type">'+
	                        '<option>Private Room</option>'+
	                        '<option>Ward</option>'+
	                    '</select>'+
	                '</div>'+
	            '</div>'+

	            '<div class="form-group">'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Key</label>'+
	                    '<input autocomplete="off" id="basic-input" type="text" class="form-control" name="arduino_key">'+
	                '</div>'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Level</label>'+
	                    '<select class="form-control" name="room_level">'+
	                        '<option>1st floor</option>'+
	                        '<option>2nd floor</option>'+
	                    '</select>'+
	                '</div>'+
	            '</div>'+

	            '<div class="form-group">'+
	                '<div class="col-md-6">'+
	                    '<label for="basic-input">Room Capacity</label>'+
	                    '<input autocomplete="off" id="basic-input" type="text" class="form-control" name="room_capacity">'+
	                '</div>'+
	            '</div>';
			}
			$('.content-holder').html(content);
		});
	}
}