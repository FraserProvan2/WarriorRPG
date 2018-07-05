//Player
var player = new Object();
player.name = "Player";
player.health = 100;
player.attackDamage = 20; 
player.attackAccuracy = 3;

//Henchman
var henchman = new Object();
henchman.name = "henchman";
henchman.health = 75;
henchman.attackDamage = 30; 
henchman.attackAccuracy = 3;
henchman.attackType = "clubbed";

//Vernox
var vernox = new Object();
vernox.name = "vernox";
vernox.health = 100;
vernox.attackDamage = 20; 
vernox.attackAccuracy = 2;
vernox.attackType = "Grappled";

//Gargon
var gargon = new Object();
gargon.name = "gargon";
gargon.health = 120;
gargon.attackDamage = 20; 
gargon.attackAccuracy = 3;
gargon.attackType = "Thursted";

//Zernoo
var zernoo = new Object();
zernoo.name = "zernoo";
zernoo.health = 150;
zernoo.attackDamage = 15; 
zernoo.attackAccuracy = 3;
zernoo.attackType = "Thrashed";

function startQuest() {
    location.replace("b432-stage2.html");
}

///////////////////////////////////////Henchman Fight
function checkAliveHenchman() {
    var div = document.getElementById('log');

    if (player.health <= 0) {
        alert("YOU DIED!");
        window.location.replace("index.html");
    }
    if (henchman.health <= 0 && player.health >= 1) {
        alert("Victory!");
        window.location.replace("c943-stage3.html");
    }
}

function attackHenchman() {
    var playerAttackChance = Math.floor(Math.random() * player.attackAccuracy) + 1;
    var playerCriticalChance = Math.floor(Math.random() * 5) + 1;
    var henchmanAttackChance = Math.floor(Math.random() * henchman.attackAccuracy) + 1;
    var div = document.getElementById('log');
    checkAliveHenchman();

    if (playerAttackChance <= 2) {
        if (playerCriticalChance === 1) {
            henchman.health = henchman.health - player.attackDamage * 2;
            div.innerHTML = "<p class='playerLog'>- You CRITICALLY attacked the opponent for " + player.attackDamage * 2 + "!</p>";

        } else {
            henchman.health = henchman.health - player.attackDamage;
            div.innerHTML = "<p class='playerLog'>- You attacked the opponent for " + player.attackDamage + "!</p>";
        }
    } 
    else {
        div.innerHTML = "<p class='playerLog'>- You missed!</p>";
    }

    if (henchmanAttackChance === 1 && henchman.health > 0) {
        player.health = player.health - henchman.attackDamage;
        div.innerHTML += "<p class='enemyLog'>- You were " + henchman.attackType +" for " + henchman.attackDamage + "!</p>";
    } else {
        div.innerHTML += "<p class='enemyLog'>- Opponent missed!</p>";
    }
}

function blockHenchman() {
    var block = Math.floor(Math.random() * 10) + 1;
    var div = document.getElementById('log');
    checkAliveHenchman();

    if (block <= 4) {
        player.health = player.health + 30;
        div.innerHTML = "<p class='playerLog'>- Block success! 30hp healed</p>";
    }
    else if (block === 10 || block === 9 && player.health < 100) {
        player.health = 100;
        div.innerHTML = "<p class='playerLog'>- Perfect block! Health restored</p>";
    }
    else if (block === 10 || block === 9  && player.health > 100) {
        div.innerHTML = "<p class='playerLog'>- Perfect block!</p>";
    }    
    else {
        player.health = player.health - henchman.attackDamage;
        div.innerHTML = "<p class='enemyLog'>- Block failed!, You were " + henchman.attackType +" for " + henchman.attackDamage + "!</p>";
    }
}

///////////////////////////////////////Vernox Fight
function vernoxPassive() {
    var div = document.getElementById('log');
    player.health = player.health - 5;
    div.innerHTML += "<p class='effect'>- Vernox pierces you with fear for 5 damage</p>";
}

function checkAliveVernox() {
    var div = document.getElementById('log');
    if (player.health <= 0) {
        alert("YOU DIED!");
        window.location.replace("index.html");
    }
    if (vernox.health <= 0 && player.health >= 1) {
        alert("Victory!");
        window.location.replace("d923-stage4.html");
    }
}

function attackVernox() {
    var div = document.getElementById('log');
    var playerCriticalChance = Math.floor(Math.random() * 5) + 1;
    var playerAttackChance = Math.floor(Math.random() * player.attackAccuracy) + 1;
    var vernoxAttackChance = Math.floor(Math.random() * vernox.attackAccuracy) + 1;
    checkAliveVernox();

    if (playerAttackChance >= 2) {
        var div = document.getElementById('log');

        if (playerCriticalChance === 1) {
            var playerCritical = vernox.health = vernox.health - player.attackDamage * 2;
            div.innerHTML = "<p class='playerLog'>- You CRITICALLY attacked the opponent for " + player.attackDamage * 2 + "!</p>";
            vernoxPassive();
        } else {
            vernox.health = vernox.health - player.attackDamage;
            div.innerHTML = "<p class='playerLog'>- You attacked the opponent for " + player.attackDamage + "!</p>";
            vernoxPassive();
        }
    } else {
        div.innerHTML = "<p class='playerLog'>- You missed!</p>";
        vernoxPassive();
    }

    if (vernoxAttackChance === 1 && vernox.health > 0) {
        player.health = player.health - vernox.attackDamage;
        div.innerHTML += "<p class='enemyLog'>- You were " + vernox.attackType + " for " + vernox.attackDamage + "!</p>";
    } else {
        div.innerHTML += "<p class='enemyLog'>- Opponent missed!</p>";
    }
}

function blockVernox() {
    var div = document.getElementById('log');
    var block = Math.floor(Math.random() * 10) + 1;
    checkAliveVernox();

    if (block <= 4) {
        player.health = player.health + 30;
        div.innerHTML = "<p class='playerLog'>- Block success! 30hp healed</p>";
        vernoxPassive();
    }
    else if (block === 10 && player.health < 100) {
        player.health = 100;
        div.innerHTML = "<p class='playerLog'>- Perfect block! Health restored</p>";
        vernoxPassive();
    }
    else if (block === 10 && player.health > 100) {
        div.innerHTML = "<p class='playerLog'>- Perfect block!</p>";
    }    
    else {
        player.health = player.health - vernox.attackDamage;
        div.innerHTML = "<p class='enemyLog'>- Block failed!, You were " + vernox.attackType +" for " + henchman.attackDamage + "!</a>";
        vernoxPassive();
    }
}

///////////////////////////////////////gargon Fight
function gargonSpecialMove() {
    var div = document.getElementById('log');
    var gargonStrike = Math.floor(Math.random() * 20) + 1;
    var gargonCritialDamage = Math.floor(Math.random() * 100) + 40;
    if (gargonStrike === 10) {
        var fatalBlow = player.health = player.health - gargonCritialDamage;
        div.innerHTML += "<p class='effect' style='font-size:23px;'>- Gargons overhead swing crits you for " + gargonCritialDamage + "!</p>";
    }
}

function gargonPassive() {
    var div = document.getElementById('log');
    gargon.health = gargon.health + 5;
    div.innerHTML += "<p class='effect'>- Gargons fury increases his Health by 5!</p>";
}

function checkAliveGargon() {
    var div = document.getElementById('log');
    if (player.health <= 0) {
        alert("YOU DIED!");
        window.location.replace("index.html");
    }
    if (gargon.health <= 0 && player.health >= 1){
        alert("Victory!");
        window.location.replace("e8345-stage5.html");
    }
}

function attackGargon() {
    var div = document.getElementById('log');
    var playerCriticalChance = Math.floor(Math.random() * 5) + 1;
    var playerAttackChance = Math.floor(Math.random() * player.attackAccuracy) + 1;
    var gargonAttackChance = Math.floor(Math.random() * gargon.attackAccuracy) + 1;
    checkAliveGargon();

    if (playerAttackChance >= 2) {
        if (playerCriticalChance === 1) {
            var playerCritical = gargon.health = gargon.health - player.attackDamage * 2;
            div.innerHTML = "<p class='playerLog'>- You CRITICALLY attacked the opponent for " + player.attackDamage * 2 + "!</p>";
            gargonSpecialMove();
            gargonPassive();
        } else {
            gargon.health = gargon.health - player.attackDamage;
            div.innerHTML = "<p class='playerLog'>- You attacked the opponent for " + player.attackDamage + "!</p>";
            gargonSpecialMove();
            gargonPassive();
        }

    } else {
        div.innerHTML = "<p class='playerLog'>- You missed!</p>";
        gargonSpecialMove();
    }

    if (gargonAttackChance >= 2 && gargon.health > 0) {
        player.health = player.health - gargon.attackDamage;
        div.innerHTML += "<p class='enemyLog'>- You were " + gargon.attackType +" for " + gargon.attackDamage + "!</p>";

    } else {
        div.innerHTML += "<p class='enemyLog'>- Opponent missed!</p>";
    }
}

function blockGargon() {
    var div = document.getElementById('log');
    var block = Math.floor(Math.random() * 10) + 1;
    checkAliveGargon();

    if (block <= 4) {
        player.health = player.health + 30;
        div.innerHTML = "<p class='playerLog'>- Block success! 30hp healed</p>";
        gargonPassive();
    }
    else if (block === 10 && player.health < 100) {
        player.health = 100;
        div.innerHTML = "<p class='playerLog'>- Perfect block! Health restored</p>";
        gargonPassive();
    }
    else if (block === 10 && player.health > 100) {
        div.innerHTML = "<p class='playerLog'>- Perfect block!</p>";
    }    
    else {
        player.health = player.health - gargon.attackDamage;
        div.innerHTML = "<p class='enemyLog'>- Block failed!, You were " + gargon.attackType +" for " + gargon.attackDamage + "!</p>";
        gargonSpecialMove();
    }
}

///////////////////////////////////////Zernoo Fight
function zernooSpecialMove() {
    var div = document.getElementById('log');

    player.health = player.health - zernoo.attackDamage;
    div.innerHTML += "<p class='enemyLog'>- You were " + zernoo.attackType +" for " + zernoo.attackDamage + "!</p>";
}

function zernooPassive() {
    var div = document.getElementById('log');

    if (zernoo.attackDamage <= 75) {
        zernoo.attackDamage = zernoo.attackDamage + 5;
        
        div.innerHTML += "<p class='effect'>- Zernoo increased his Damage by 5!</p>";
    }
}

function checkAliveZernoo() {
    var div = document.getElementById('log');

    if (player.health <= 0) {
        alert("YOU DIED!");
        window.location.replace("index.html");
    }
    if (zernoo.health <= 0 && player.health >= 1) {
        alert("Winner Winner");
    }
}

function attackZernoo() {
    var playerAttackChance = Math.floor(Math.random() * player.attackAccuracy) + 1;
    var playerCriticalChance = Math.floor(Math.random() * 5) + 1;
    var zernooAttackChance = Math.floor(Math.random() * zernoo.attackAccuracy) + 1;
    var div = document.getElementById('log');
    checkAliveZernoo();
    
    if (playerAttackChance <= 2) {
        if (playerCriticalChance === 1) {
            zernoo.health = zernoo.health - player.attackDamage * 2;
            div.innerHTML = "<p class='playerLog'>- You CRITICALLY attacked the opponent for " + player.attackDamage * 2 + "!</p>";
            zernooSpecialMove();
           
        } else {
            zernoo.health = zernoo.health - player.attackDamage;
            div.innerHTML = "<p class='playerLog'>- You attacked the opponent for " + player.attackDamage + "!</p>";
            zernooPassive();
        }
    } 
    else {
        div.innerHTML = "<p class='playerLog'>- You missed!</p>";
    }

    if (zernooAttackChance >= 2 && zernoo.health > 0) {
        player.health = player.health - zernoo.attackDamage;
        div.innerHTML += "<p class='enemyLog'>- You were " + zernoo.attackType +" for " + zernoo.attackDamage + "!</p>";
    } else {
        div.innerHTML += "<p class='enemyLog'>- Opponent missed!</p>";
    }
}

function blockZernoo() {
    var block = Math.floor(Math.random() * 10) + 1;
    var div = document.getElementById('log');
    checkAliveZernoo();

    if (block <= 4) {
        player.health = player.health + 30;
        div.innerHTML = "<p class='playerLog'>- Block success! 30hp healed</p>";
        zernooPassive();
    }
    else if (block === 10 && player.health < 100) {
        player.health = 100;
        div.innerHTML = "<p class='playerLog'>- Perfect block! Health restored</p>";
    }
    else if (block === 10 && player.health > 100) {
        div.innerHTML = "<p class='playerLog'>- Perfect block!</p>";
    }    
    else {
        player.health = player.health - zernoo.attackDamage;
        div.innerHTML = "<p class='enemyLog'>- Block failed!, You were " + zernoo.attackType +" for " + zernoo.attackDamage + "!</p>";
    }
}
