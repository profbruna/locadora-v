$(document).ready(function(){
	addStyle();
});



function addStyle(){
	var box = $(".pagination");
	
	//englobando elementos não principais
	$(box).find('a')
		  .wrap('<li/>');
	
	//englobando elemento principal
	$(box).find('strong')
		  .wrap('<li class="active" />')
		  .wrap('<a/>')
		  
}