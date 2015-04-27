$(document).ready(function() {
	
    //skill bar function
    $('progress').each(function(index,element){
    	var max = $(this).attr("value")
    	$(this).val(0).animate({
    		value: max
    	},{
    		duration:2000,
    		easing:"easeOutCirc",
    	});
    });
});