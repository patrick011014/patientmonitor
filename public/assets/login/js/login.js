var login = new login();

function login()
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
		event_change_tab();
	}
	function event_change_tab()
	{
		$('.change-tab').click(function(e)
		{
			$('.change-tab').removeClass('active');
			$(e.currentTarget).addClass('active');
			var tab = $(e.currentTarget).text();
			$('.login-title').text('Login as '+tab);
		});
	}
}