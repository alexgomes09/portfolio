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

    //menu style functionality
    $('.menu li a').mouseover(function(){
        $(this).addClass('hvr-ripple-out');
    });
    $('.menu li a').mouseout(function(){
       $(this).removeClass('hvr-ripple-out');
   })

    //rotate word at home page functionality
    var rotateWord = ["a Web Developer","a Desktop Application Developer","a Full-Stack Web Developer","an Android Developer","a Graphic Designer"];
    var counter = 0;
    $('.rotate-word').html("a Software Engineer");

    setInterval(function () {
        var w = rotateWord[counter];
        $('.rotate-word').fadeOut('fast', function () {
            $(this).html(w).fadeIn().addClass('magictime boingInUp');
        }).removeClass('magictime boingInUp');
        if(counter >= rotateWord.length-1){
            counter=0;
        }else{
            counter++;
        }
    }, 2000);

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
$('#codeTab a:first').tab('show')

// Ajax form request
$('form').on('submit', function (event) {
    $.ajax({
        type: 'POST',
        url: $(this).prop('action'),
        data: $(this).serialize(),
        dataType:'json',
        encode:true
    }).success(function(data){
        console.log(data)
        if(data.success == true){
            $('.modal-body').html(data.message);
            $('.modal').modal();
            $("#content-error-body, #content-error-name, #content-error-email").html('');
        }else{
            if(data.errors.body){
                $("#content-error-body").html(data.errors.body);
            }else{
                $("#content-error-body").html('');
            }
            if(data.errors.name){
                $("#content-error-name").html(data.errors.name);
            }else{
                $("#content-error-name").html('');
            }
            if(data.errors.email){
                $("#content-error-email").html(data.errors.email);
            }else{
                $("#content-error-email").html('');
            }
        }
    });
    event.preventDefault();
});

//form validation
$('.contact-form input[name=name]').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    return false;
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