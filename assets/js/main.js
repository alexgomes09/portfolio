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

    //MixItUp function
    $('#Container').mixItUp({
        controls: {
            enable: true,
        },
        load: {
            sort: 'random:true',
        },
        animation: {
            enable: true,
            duration: 500,
            effects: 'rotateX stagger fade',
            staggerSequence : function(i){
                return (2*i) - (5*((i/3) - ((1/3) * (i%3))));
            }
        }

    });

    $('#codeTab a:first').tab('show')


    // get parameter for filter based on url query http://localhost/portfolio/projects?filter=Node
    var link = window.location.href;
    if (link) {
        var filter = getUrlParameter('filter');
        setTimeout( function () { $('[data-filter="'+filter+'"]').click(); }, 0);
    } 

    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return "."+sParameterName[1];
            }
        }
    }    

});