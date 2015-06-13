/**
 * Created by Alex on 6/24/14.
 */


function SwitchScreenToPlay(){
    var playScreen = $("#playScreen");                  // select playscreen
    var splashscreen = $("#splashscreen");              //select splash screen
    var storyScreen = $("#storyScreen");                // select storyscreen
    playScreen.css({
    display:"block"          // display play screen and playscreen canvas upon clicking Play Button from splash screen or story screen
    });
    splashscreen.css({
        display:"none"      // hide splash screen
    });
    storyScreen.css({
        display:"none"      //  hide story screen
    });
}


var playScreen = $("#playScreenCanvas").get(0);              // select playscreen ->canvas
playScreen.width = 800;         // set canvas width
playScreen.height = 600;       // set canvas height
var ctx = playScreen.getContext('2d');

var score = 0;
var reputation = 200;

var duckSprite = document.getElementById("duckSprite");      // select duckSprite

var duck = new Motio(duckSprite,{      // I had to use a small library to save some time. this library helps converting any sprite to frame
    fps:10,
    frames: 20,
    vertical:true,
    speedX:0.2,
    speedY:0.2,
    width:120,
    height:157
});

function RandomTop(min,max){
    return Math.floor(Math.random() * (max - min + 1) + min);   // generate random height
}
function RandomHorizontal(min,max){
    return Math.floor(Math.random() * (max - min + 1) + min);   // generate random width
}

duck.play();   // play duck sprite (frames)

function Update()
{

    $("#duckSprite").animate({
        top:RandomTop(-141,-611),                       //call RandomTop method which return random height value
        left:RandomHorizontal(-6,694)                   //call RandomHorizontal method which return random width value
    },500).css({
            position:'relative',
            opacity:1                                   //bring duck opacity to visible level
        });

    $("#duckSprite").click(function(){
        score = score+1;                                // update score
        duck.pause();                                   // once duck is killed pause frame
        $(this).stop();                                 // stop any previous frame animation

        $(this).addClass('dead').animate({              // call dead class
            top: "500px",                               // make the duck fall once duck is dead
            opacity:0                                   // hide the duck once duck is close to ground
        },1500,function(){
            $(this).removeClass("dead");duck.play();    // remove dead class and restart duck from random position
        });

        $("#updatedReputation").animate({
            width:reputation-=1                         // update reputation bar upon killing ducks
        },1)
    });
    $("#updatedScore").text(score);                     //draw score

}

// draw reputation and also update reputation bar
$("#updatedReputation").css({
    width:reputation,
    backgroundColor:'red',
    height:"7px",
    position:"relative",
    top:"-13px",
    display:"block",
    left:"100px"
})


function GameLoop()
{
    if(reputation <= 0){
        $("#badRep").css({
            display:"block"                 // display ending messsage if reputation less than or equal to 0
        })
        clearInterval(time);               // while reputation less than 0 clear the game time interval
        duck.destroy();                     // destroy duck object
    }else{
        Update(); // calling update method only if reputation larger than 0
    }
}

var time = $(function(){
    setInterval(function(){GameLoop();},700); // calling main game loop
});
