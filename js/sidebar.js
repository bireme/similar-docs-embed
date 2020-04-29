$('#btSidebar').click(function(){
	$("#sidebarOpacity").show();
	$("#mySidenav").addClass('sidenavMove');
})
$('#sidebarOpacity, #closeSidebar').click(function(){
	$("#sidebarOpacity").hide();
	$("#mySidenav").removeClass('sidenavMove');
})