var request_leave = new request_leave();
var table_data = {};
function request_leave()
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
		add_request();
		set_approver();
	}
	function action_table_loader()
	{
		$(".load-table-here").html('<div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
	}
	function action_load_table()
	{
		table_data.activetab = $('.change-tab.active').attr("mode");
		// table_data.search = $('.search').val(); // here

		action_table_loader();
		$.ajax(
		{
			url: '/employee/leave_request_table',
			data: table_data,
			type: "get",
			success: function(data)
			{
				$('.load-table-here').html(data);
			}
		});
	}
	function event_change_tab(e)
	{
		$(".change-tab").click(function(e)
		{
			$('.change-tab').removeClass('active');
			$(e.currentTarget).addClass('active');
			action_load_table();
		});
	}
	function add_request()
	{
		$('.request-leave').click(function()
        {
            action_load_link_to_modal('/employee/leave_request_add', 'md');
        })
	}
	function set_approver()
	{
		$('.set-approver').click(function()
        {
            action_load_link_to_modal('/employee/set-approver', 'md');
        })
	}
}