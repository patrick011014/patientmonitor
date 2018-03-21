var doctors = new doctors();
var x = null;

function doctors()
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
		event_change_tab();
		event_search();
		action_load_table();
		event_archive();
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
			url: '/member/doctors-table',
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
			
			if(confirm("Are you sure you want to "+action.toLowerCase()+" this?"))
			{
				$.ajax(
				{
					url: '/member/archive-doctor',
					type: 'get',
					data: 'id='+id+'&action='+action,
					success: function(data)
					{
						action_load_table();
					}
				});
			}

		});
	}
}