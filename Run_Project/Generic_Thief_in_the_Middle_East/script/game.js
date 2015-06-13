/**
 * Created by Alex on 7/5/14.
 */

var game = new Phaser.Game(800, 600, Phaser.CANVAS, 'game', { preload: preload, create: create, update:update});    // using/creating game object

var map;
var layer = {
    foreground : 'Foreground'
};
var platform;
var music;
var player;
var playerLife;
var bombs;
var tank;
var tankLife = 500;
var explosions;
var facing = 'left';
var background;
var stars;
var starCollected = 0;
var text = {
    score:0,
    stateText:'',
    tankLifeText:'',
    reloadText:''
};
var particle={
    fire:""
}
var firingTimer = 0;
var bullets;
var fireRate = 200;
var generateBombRate = 400;
var nextFire = 0;
var lclStorage={
    score:0,
    starCollected:0
}



// setup for easy mode
if($('input[name=difficulty]:checked').val()=='easy'){
    tankLife = 250;
    fireRate = 300;
    generateBombRate = 1000;
}
//setup for medium mode
if($('input[name=difficulty]:checked').val()=='medium'){
    tankLife = 500;
    fireRate = 200;
    generateBombRate = 400;
}
//setup for hard mode. You would have to keep moving and keep shooting otherwise you will be dead
if($('input[name=difficulty]:checked').val()=='hard'){
    tankLife = 1500;
    fireRate = 100;
    generateBombRate = 150;
}

//preload function helps adding/loading all the assets that will be used in the game
function preload() {
    game.load.tilemap('level1','assets/map/map.json',null,Phaser.Tilemap.TILED_JSON);     // we used a tiled map here
    game.load.image('tile3', 'assets/map/tile3.png');                                    //load tileset
    game.load.audio('music', 'assets/sound/background_sound.mp3');
    game.load.audio('coin_sound', 'assets/sound/coin_sound.mp3');
    game.load.audio('fire_sound', 'assets/sound/fire_sound.mp3');
    game.load.audio('bullet_hit_tank','assets/sound/bullet_hit_tank.mp3')
    game.load.image('background', 'assets/background/background1.jpg');
    game.load.spritesheet('player', 'assets/player.png', 32, 48);                     //player width = 32 height = 48
    game.load.spritesheet('explosion', 'assets/explosion.png', 64, 64,23);
    game.load.image('star', 'assets/star.png');
    game.load.image('bullet', 'assets/bullet.png');
    game.load.image('bomb', 'assets/bomb.png');
    game.load.image('tank', 'assets/tank.png');
    game.load.image('smoke','assets/smoke.png')
}

function create() {
		game.physics.startSystem(Phaser.Physics.ARCADE);                             //create physics all over the world. but not on the different object
    music = game.sound.play('music',1,true);                                    // play background music

    background = game.add.tileSprite(0, 0, 800, 600, 'background');             // background image
    background.fixedToCamera = true;                                            // we didnt really need this for our game purpose, but we kept it
    
    map = game.add.tilemap('level1');                                          //create tilemap (level1)
    map.addTilesetImage('tile3','tile3');                                      // add tile set

    layer.foreground = map.createLayer(layer.foreground);                      // this function will create and make tileset visible on canvas
    layer.foreground.resizeWorld();                                            // resizing the world depending on tileset width

    // create invisible platform where player can land. Since our background has ground we created invisible level there. so that it feels like player
    // lands on ground.
    platform = game.add.sprite(0, game.world.height-50,'',null);
    game.physics.enable(platform, Phaser.Physics.ARCADE);
    platform.body.setSize(800, 10);
    platform.body.immovable = true;
    platform.body.collideWorldBounds = true;

    // create stars and add them to group
    stars = game.add.group();
    stars.enableBody = true;                        // also give each star a body so it can collide with other sprites/objects
    stars.physicsBodyType = Phaser.Physics.ARCADE;  // this will define which type of physics body will be used for stars
    stars.createMultiple(1, 'star');                // create 1 star at a time
    stars.setAll('anchor.x', 0.5);                 //star position basically anchor sprite image to its body x
    stars.setAll('anchor.y', 1);                   //star position basically anchor sprite image to its body y
    stars.setAll('outOfBoundsKill', true);         // if star goes out of world then kill them
    stars.setAll('checkWorldBounds', true);        // this checks whether star  goes out of bounds/world;

    //create bullets and put them in a group since there would a lot of them on the screen
    bullets = game.add.group();
    bullets.enableBody = true;                            // each bullet has body
    bullets.physicsBodyType = Phaser.Physics.ARCADE;      // physics body type ARCADE in this case "Phaser offers 3 types of physics body"
    bullets.createMultiple(50, 'bullet');                 // create/allow 50 bullets on the screen to render.
    bullets.setAll('checkWorldBounds', true);             // this checks whether bullets  goes out of bounds/world;
    bullets.setAll('outOfBoundsKill', true);              // if bullet goes out of the boundary then kill them

    player = game.add.sprite(150, game.world.height-150, 'player');      // add player to the level x =150, y = canvas height -350
    game.physics.enable(player);                                         // enable physics to the player body
    player.body.bounce.y = 0.1;                                          // add bounce to player
    player.body.gravity.y = 600;                                         // set player gravity
    player.body.collideWorldBounds = true;                               // whether player should collide with world boundary or not
    game.camera.follow(player);                                          // camera follow player. we dont really need this but we kept it.
    player.animations.add('left', [0, 1, 2, 3], 10, true);              // player animation frame when player walks left
    player.animations.add('right', [5, 6, 7, 8], 10, true);             // player animation frame when player walks right
    playerLife = game.add.group();                                  // also add playerLife to the group since there would be more than one on the screen

    //create 4 life for player
    for (var i = 0; i < 4; i++) {
        var life = playerLife.create(game.world.width - 150 + (30 * i), player.height-20, 'player');
        life.anchor.setTo(0.5, 0.5);

    }

    // create bomb and give each bomb physics body
    bombs = game.add.group();
    bombs.enableBody = true;
    bombs.physicsBodyType = Phaser.Physics.ARCADE;
    bombs.createMultiple(30, 'bomb');
    bombs.setAll('anchor.x', 0.5);
    bombs.setAll('anchor.y', 1);
    bombs.setAll('outOfBoundsKill', true);
    bombs.setAll('checkWorldBounds', true);

    tank = game.add.sprite(0, 0, 'tank');       // create tank sprite at 0,0 position
    game.physics.enable(tank);                  // create physics body for tank

    //create explosion and add them to group since there might be more than one explosions on the screen
    explosions = game.add.group();
    for (var e = 0; e < 30; e++) {
        var explosionAnimation = explosions.create(0, 0, 'explosion', [0], false);
        explosionAnimation.anchor.setTo(0.5, 0.5);
        explosionAnimation.animations.add('explosion');
    }

    //create smoke particle
    particle.fire = game.add.emitter(game.world.width-150,game.world.height-30,200);
    particle.fire.makeParticles('smoke');              // use smoke image for particles
    particle.fire.minParticleSpeed.set(10,20);         // particles min speed when they are born
    particle.fire.maxParticleSpeed.set(0,-50);         // particles max speed before they die
    particle.fire.gravity = -80;                       // give gravity to particles
    particle.fire.setScale(0.1,0.1);                  // set particle scale
    particle.fire.setAlpha(0.3,0,3500);               // set particle transparency  from 0.3 to 0 with in 3.5 secs
    particle.fire.start(false,3500,80);               // start the particle and play it for 3.5 secs. 80 is how fast the particle will be generated


    // this part is all about text create show  different types of text
    text.stateText = game.add.text(game.world.centerX, game.world.centerY, '', { font: '84px Arial', fill: 'red' ,align:"center"});  // basically win/gameover text
    text.reloadText = game.add.text(game.world.centerX, game.world.centerY+150, '', { font: '24px Arial', fill: 'black' ,align:"center"});   // give user a hint that page will refresh in 6 secs
    text.stateText.anchor.setTo(0.5, 0.5);
    text.reloadText.anchor.setTo(0.5, 0.5);
    text.stateText.visible = false;

    $('#pScore').text("Previous Score: "+JSON.parse(localStorage.getItem('score')));
    $('#pStar_collected').text("Star Collected: "+JSON.parse(localStorage.getItem('starCollected')));

    game.time.events.loop(10000, makeStarFall, this);   //this makeStarFall() function is not supposed to be called from create function
                              // but we spent a lot of time behind this. It didnt work in update function. phaser calls update function every 1ms.
                             //doesnt matter how much time interval we use phaser would make star fall whenever star dies. which is right after another. But we didnt want that. we wanted every 10 secs.
}

function update() {

    tankDead();                     // call tank dead function

    game.physics.arcade.collide(player, [layer.collision, platform]);        // make player collide with collision layer from Tiled map and also invisible layer we created.
    game.physics.arcade.overlap(player, stars, collect, null, this);        // if player and star overlap then call collect function which will collect star
    game.physics.arcade.overlap(bombs,player, bombHitsPlayer, null, this);  // if bombs overlap with player then call bombHitsPlayer function
    game.physics.arcade.overlap(bullets, tank, tankCollision, null, this); // if bullets overlap tank sprite then call tankCollision function

    player.body.velocity.x = 0;          // players movement without key input.

    //  Move player to the left
    if (game.input.keyboard.addKey(Phaser.Keyboard.A).isDown)
    {
        player.body.velocity.x = -200;
        if (facing != 'left') {
            player.animations.play('left');
            facing = 'left';
        }
    }
    //  move player to the right
    else if (game.input.keyboard.addKey(Phaser.Keyboard.D).isDown)
    {
        player.body.velocity.x = 200;
        if (facing != 'right') {
            player.animations.play('right');
            facing = 'right';
        }
    }
    //  make player idle
    else {
        if (facing != 'idle') {
            player.animations.stop();
            player.frame = 4;
            facing = 'idle';
        }
    }
    //make player jump
    if (game.input.keyboard.addKey(Phaser.Keyboard.W).isDown)
    {
        if (player.body.onFloor() || player.body.y >=510)
        {
            player.body.velocity.y = -400;
        }
    }

    // if mouse is down and player life is larger than 0 then fire
    if (game.input.activePointer.isDown && !playerLife.countLiving() <=0) {
        fire();
    }

    // if now is greater than firing time and player life is larger than 0 and tank life is not less than equal to 0 then generate bomb
    if (game.time.now > firingTimer && !playerLife.countLiving() <=0 && !tankLife <=0) {
         generateBomb();
    }

    //make bullets and bombs collide and call bullet hit bombs.
    for (var i = 0; i < bombs.length; i++) {
       game.physics.arcade.overlap(bullets, bombs, bulletHitBombs, null, this);
            
    }
    //if player life is not less than or equal to 0 then move tank
    if (!playerLife.countLiving() <= 0) {
        moveTank();
    }

    lclStorage.score = text.score;
    lclStorage.starCollected = starCollected;
    localStorage.setItem('score',JSON.stringify(lclStorage.score));
    localStorage.setItem('starCollected',JSON.stringify(lclStorage.starCollected));

    //post the text info to our scoreboard which slide out by the canvas
    $('#score').text("Score: "+text.score);
    $('#tank_life').text("Tank Life: "+tankLife);
    $('#star_collected').text("Star Collected: "+ starCollected);

}

//make the tank move
var flip = false;
var tankx = 0;
function moveTank() {
    if (tank.x + tank.width == game.world.width) {
        flip = false;
    }
    if (tank.x  == 0) {
        flip = true;
    }
    if (flip == true) {
        tank.x += 5;
    } else {
        tank.x -= 5;
    }
    tankx = tank.x;
}

// make the tank collision
function tankCollision(tank, bombs) {
    game.sound.play('bullet_hit_tank');
    if (tankLife <= 0) {
        tank.kill();
        bombs.kill();
    } else {
        tankLife -= 2;
        text.score += 1;
    }
}
// this function will make star fall
function makeStarFall() {
    var star = stars.getFirstExists(false);                                     // get the first star in the group
    var random = game.rnd.integerInRange(0, game.world.width - 30);				// generate random x value for star to fall at random x position
    if (stars.getFirstDead()) {
        star.reset(random, 0);                                                   //if star is dead then reset star position
        star.rotation = game.physics.arcade.moveToXY(star, random, 600, 150);    // move star towards 600 y position which is staright down.  
    }
}

//this function will collect star
function collect(player, stars) {
    game.sound.play('coin_sound');                                              // if star is collected then make coin sound                    
    stars.kill();                       										// kill the star
    text.score += 20;                                                           // add 20 pt for each collected star
    if(stars.kill()){
        starCollected = starCollected+1;                                        // update star collected
    }
}

// this function will call if bomb hits player 
function bombHitsPlayer(playerlife,bombs) {
    var life = playerLife.getFirstAlive();       
    bombs.kill();
    life.kill();
    if (bombs.kill()) {
        makeExplosion(bombs);                     //make explosion if bomb is killed
    }
    if (playerLife.countLiving() <= 0) {
        player.kill();
        text.stateText.text = "GAME OVER";             //if player life is less than 0 then show Game over text
        text.stateText.visible = true;

        text.reloadText.text = "game will restart in 6 secs";

        setTimeout(function(){
            window.location.reload();                             // if game is over the reload game with in 6 secs
        }, 6000);
    }
}

// this method will generate explosion
function makeExplosion(bombs) {
    var explosionAnimation = explosions.getFirstExists(false);
    explosionAnimation.reset(bombs.x, bombs.y);                    // reset explosion position to bomb position
    explosionAnimation.play('explosion', 30, false, true);          // playe explosion method 30 fps
}
// if bullet hits bombs then this method will be called
function bulletHitBombs(bombs, bullet) {
    bullet.kill();
    bombs.kill();
    if (bombs.kill()) {
        makeExplosion(bombs);
        text.score += 2;

        $("#scoreBoard").animate({                                 // animate scoreBoard 
            'right':-230
        },1000)

        $("#previousScore").animate({ 								// animate previousScore
            'left':-200
        },1000)
    }
}
// this method will generate bomb
function generateBomb() {
    var bomb = bombs.getFirstExists(false);							//get first existed bomb in the group
    //var random = game.rnd.integerInRange(0, game.world.width);		
    bomb.reset(tank.x + 50, 50);
    bomb.rotation = game.physics.arcade.moveToObject(bomb, player, 300);   // move the bomb towards the player
    firingTimer = game.time.now + generateBombRate;
}

//this function will allow player to fire
function fire() {
    if (game.time.now > nextFire && bullets.countDead() > 0) {
        nextFire = game.time.now + fireRate;
        var bullet = bullets.getFirstDead();                        // bullets are added to the group and therefore get the first bullet dead
        bullet.reset(player.x + 10, player.y + 30);					// reset bullet position to player.x and player.y					
        game.physics.arcade.moveToPointer(bullet, 400);             // move the bullet towards mouse cursor
        game.sound.play('fire_sound', 3, false);                     // play bullet sound
    }
}

// check whether tank is dead or not
function tankDead(){
    if(tankLife <=0){
        player.kill();
        game.input.activePointer = false;               // if tank is dead the make mouse pointer disable
        game.input.destroy();                           // disable all the inputs
        text.stateText.text = "YOU WON\n PLAY AGAIN";     // show state Text
        text.stateText.visible = true;                      // text visibility
        text.reloadText.text = "game will restart in 6 secs";     //reload text

        setTimeout(function(){
            window.location.reload();                             // reload screen in 6 secs
        }, 6000);
    }

}
