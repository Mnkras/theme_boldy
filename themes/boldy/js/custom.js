$(document).ready(function(){

// SHOW/HIDE FOOTER ACTIONS
$('#showHide').click(function(){	
	if ($("#footerActions").is(":hidden")) { //if hidden
		$(this).css('background-position','0 0');
		$("#footerActions").slideDown("slow");	
	} else {
		$(this).css('background-position','0 -16px') //else shown
		$("#footerActions").slideUp("slow");
		}
	return false;			   
});		

// TOP SEARCH 
$('#s').focus(function() {
		$(this).animate({width: "215"}, 300 );	
		$(this).val('')
});

$('#s').blur(function() {
		$(this).animate({width: "100"}, 300 );
		if($(this).val() == '') {
			$(this).val('Search...');
		}
});
});