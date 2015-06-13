/**
 * Created by Alex on 8/6/14.
 */


$(document).ready(function(){
$.ajaxSetup({global:true});
    var spwidth = $().width;
    console.log(spwidth);
    $('#splashScreen').css({
        background:"url('assets/background/splashScreen.png')"
    });
		
		
		
		$('#play_text').on('click',function(){
				
				$('#splashScreen').css({
						display:'none'
				})
				$("#loading").css({
						"display":"block"						
					});
				
				setTimeout(function(){
				$.ajax({
					url:'script/game.js'			
				});	
				},2000)
				
								
				$('body').css({
					'cursor':'url("http://www.cursor.cc/cursor/10/0/cursor.png"), auto'
				})
				
				
			
		})
		
})

function startGame(){
 
    //$.getScript("script/game.js");
		

		
 

}
