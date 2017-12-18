var modal_import_201_file = new modal_import_201_file();

function modal_import_201_file()
{
	init();

	function init()
	{
		document_ready();
	}

	function document_ready()
	{
		$(document).ready(function() {
			bio_file_change();
			import_201_file();
		});
	}

	function bio_file_change()
	{
		$("#201_file").unbind("change");
		$("#201_file").bind("change", function()
		{
			var file_name = $(this)[0].files[0].name;
			$(".file-name").html(file_name);
		});
	}

	function import_201_file()
	{
	   $('.import-file').unbind('click');
	   $('.import-file').bind('click', function()
	   	{
	   		var file = $("#201_file")[0].files[0];
	   		if(file != undefined)
	   		{
	   			// var formdata = new FormData();
	   			// formdata.append('_token', $('#_token').val());
	   			// formdata.append('file', file);

	   			// $.ajax(
	   			// {
	   			// 	url: '/admin/save_201_file',
	   			// 	type: 'post',
	   			// 	data: {file : file, _token : $('#_token').val()  },
	   			// 	success : function(data)
	   			// 	{
	   			// 		console.log('done');
	   			// 	}
	   			// });

	   			var formdata 	= new FormData();
	   			var ajax 		= new XMLHttpRequest();

	   			formdata.append("_token", $("#_token").val());
	   			formdata.append("file",file);

	   			ajax.upload.addEventListener("progress",function(event)
	   			{
	   				// $(".import-status").html(loader);
	   			},false);

	   			ajax.addEventListener("load",function(event)
	   			{
	   				// $(".import-status").html(event.target.responseText);
	   			},false);

	   			ajax.open("POST","/admin/save_201_file");
	   			ajax.send(formdata);
	   			
	   		}
	   	});
	}
}

function reload_employee_list()
{
	console.log('done');
}