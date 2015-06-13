/**
 * Created by Alex on 6/24/14.
 */

function SwitchScreenToStory(){
    var storyScreen = $("#storyScreen");         // select story screen
    var splashscreen = $("#splashscreen");      // select splash screen
    storyScreen.css({
        "display":"block"                       // display story screen on top of other screens
    });
    splashscreen.css({
        "display":"none"                        // hide splash screen
    });
}

var storyScreenCanvas = $("#storyScreenCanvas").get(0);   // get story screen canvas
var ctx = storyScreenCanvas.getContext("2d");
storyScreenCanvas.width = 800;                  //set canvas width
storyScreenCanvas.height = 600;                 // set canvas height


function update(){
    $("#storyButton").click(function(){         // once story button is clicked apply all these style to story
        $("#story").css({
            position:"relative",
            color:"white",
            fontSize:"1.5em",
            width:"500px",
            margin:"0 auto",
            textAlign:"justify",
            top:"600px"
        }).animate({
                top:"-=800px"               // move story up so reader can read
            },30000,"linear");

        $("#story img").css({           // at the end of story there is a play button which takes you to play screen from story screen
            paddingLeft:"163px",
            paddingTop:"15px"
        })
    })
}




function Loop()
{
    ctx.clearRect(0,0,storyScreenCanvas.width,storyScreenCanvas.height); // clearing canvas
    update(); // calling update method
};

Loop(); //call loop method

