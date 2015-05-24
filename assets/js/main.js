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

    // project tab functionality
    $('#codeTab a:first').tab('show');

    // Ajax form request
    $('form').on('submit', function (event) {
        console.log($('form').serialize());
        console.log(window.location.pathname.replace(/[^\\\/]*$/, ''))
        $.ajax({
            type: 'POST',
            url: $(this).prop('action'),
            data: $(this).serialize(),
            dataType: 'json',
            encode:true,
            success: function(data){
                console.log(data);
            },
            error: function(xhr,ajaxoptions,thrownError){
                console.log(xhr.status)  
            }
        })
        event.preventDefault();

    });



// Google map view fuinctionality in contact page
var center = new google.maps.LatLng(43.744275,-79.273930);
function initialize() {
  var mapProp = {
    center:center,
    zoom:15,
    mapTypeIds:['HYBRID','SATELLITE','ROADMAP','TERRAIN']
};
var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
var marker = new google.maps.Marker({
    position:center,
    icon:'assets/images/map_marker.png',
    animation:google.maps.Animation.BOUNCE
});
marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);



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