$( document ).ready(function() {
	
    //skill bar function
    $('progress').each(function() {
    	var max = $(this).val();
    	$(this).val(0).animate({ value: max }, { duration: 2500, easing: 'easeOutCirc' });
    	$('.percentage').css({
    		"color":"black"
    	});
    });
});