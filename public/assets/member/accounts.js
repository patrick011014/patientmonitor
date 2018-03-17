var accounts = new accounts();
var x = null;

function accounts()
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
		event_search();
		event_archive();
		event_modify();
	}
	function action_table_loader()
	{
		$(".load-table-here").html('<div style="padding: 100px; text-align: center; font-size: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
	}
	function action_load_table()
	{
		action_table_loader();
		var activetab = $('.change-tab.active').attr('mode');
		var search = $('.search').val();

		$.ajax(
		{
			url: '/member/accounts-table',
			type: 'get',
			data: 'activetab='+activetab+'&search='+search,
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
	function event_search()
	{
		$('.search').keydown(function(e)
		{
			action_table_loader();
			clearTimeout(x);

			x = setTimeout(function()
			{
				action_load_table();
			}, 1000);
		});
	}
	function event_archive()
	{
		$('body').on('click','.action-archive',function(e)
		{
			var id = $(e.currentTarget).closest('tr').attr('id');
			var action = $(e.currentTarget).text();
			$.ajax(
			{
				url: '/member/archive-account',
				type: 'get',
				data: 'id='+id+'&action='+action,
				success: function(data)
				{
					action_load_table();
				}
			});
		});
	}
	function event_modify()
	{
		$('body').on('click','.action-modify',function(e)
		{
			var id = $(e.currentTarget).closest('tr').attr('id');
			action_load_link_to_modal('/member/modify-account?id='+id,'md');
		});
	}
}