$(document).ready(function(){
    function currentYear()
    {
        var year = new Date();
        return year.getFullYear();
    }
    $('#year').html(currentYear());

    $('#menu ul li a').on("mouseover",function(){
        $(this).animate({
            color:"#CC00CC"
        },300)
    }).on("mouseout",function(){
            $(this).animate({
                color:"#CACACA"
            },300)
        });

    $("input:text").focus(function(){
        $(this).addClass("inputTextBoxHover")
    }).focusout(function(){
            $(this).removeClass("inputTextBoxHover");
        });
    $('#my-slideshow').bjqs({
        'height' : 310,
        'width' : 960,
        'responsive' : true,
        showmarkers:false
    });

    var logoHeight = $('#logo img').height();
    var logoWidth = $("#logo img").width();
    $('#logo').css({
        'margin':'15px 0px 15px 15px',
        'width':logoWidth,
        'height':logoHeight,
        "backgroundRepeat":"no-repeat"
    })
    var count = 0;
    $('#menu a,a,input').not("#gallery a").click(function(){
        count+=1;
        if(count<2){
            showMessage("This is a demo template done by Alex Gomes")
        }
    })
    function showMessage(message){
        $('#message').html("<p>"+message+"</p>").slideDown('slow').delay(3000).fadeOut(3000);
    }
    showMessage("This is a demo template done by Alex Gomes")

});