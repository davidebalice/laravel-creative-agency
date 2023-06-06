$(document).ready(function(){
	$("#datatable").DataTable(
		{paging: false,
			language:{
			paginate:{previous:"<i class='mdi mdi-chevron-left'>",
			next:"<i class='mdi mdi-chevron-right'>"}},
			drawCallback:function(){
				
				}
			});
	});
