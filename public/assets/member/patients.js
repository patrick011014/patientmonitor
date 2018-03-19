var patient = new patient();

function patient()
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
		event_action();
	}
	function action_table_loader()
	{
		$(".load-table-here").html('<div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
	}
	function action_load_table()
	{
		action_table_loader();
		var status = $('.change-tab.active').attr('mode');
		$.ajax(
		{
			url: '/member/patient-table',
			type: 'get',
			data: 'status='+status,
			success:function(data)
			{
				$('.load-table-here').html(data);
			}
		});

	}
	function event_change_tab()
	{
		$('.change-tab').click(function(e)
		{
			$('.change-tab').removeClass('active');
			$(e.currentTarget).addClass('active');
			action_load_table();
		});
	}
	function event_action()
	{
		$('body').on('click','.action',function(e)
		{
			var action = $(e.currentTarget).text();
			var id = $(e.currentTarget).closest('tr').attr('id');

			if(action == 'Archive' || action == 'Restore')
			{
				if(confirm('Are you sure you want to '+action.toLowerCase()+" this?"))
				{
					if(action == 'Restore')
					{
						action = 'pending';
					}
					else
					{
						action = 'archived';
					}
					$.ajax(
					{
						url: '/member/archive-patient',
						type: 'get',
						data: 'id='+id+'&action='+action,
						success: function(data)
						{
							action_load_table();
						}
					});	
				}

			}
			else if(action == 'Modify')
			{
				action_load_link_to_modal('/member/modify-patient?id='+id,'md');
			}
			else if(action == "Assign Room")
			{
				action_load_link_to_modal('/member/assign-room?id='+id,'md');
			}

		});
	}
}