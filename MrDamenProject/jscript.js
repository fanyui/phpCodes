$(document).ready(function(){
	
	$("input").blur(function(){
		temp=$("input").val();
		if (temp==""){
			$("input").popover('show');
		
		}
	})

})

