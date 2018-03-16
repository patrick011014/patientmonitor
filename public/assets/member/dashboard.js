var dashboard = new dashboard();

function dashboard()
{
	init();
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
	}
	function action_table_loader()
	{
		$(".load-table-here").html('<div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
	}
	function action_load_table()
	{
		action_table_loader();
		var activetab = $('.change-tab.active').attr('mode');
		$.ajax(
		{
			url: '/member/dashboard-table',
			type: 'get',
			data: 'room_level='+activetab,
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
}