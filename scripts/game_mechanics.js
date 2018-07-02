var playersFullHealth = player.health; //saves players health for perfect block

//Players moves
function attack() {
    var attackChance = Math.floor(Math.random() * 3) + 1;
    var criticalChance = Math.floor(Math.random() * 7) + 1;
    var critHit = player.attack * 2;
    if (criticalChance === 1) {
        opponent.health = opponent.health - critHit;
        console.log("player critically attacked opponent for " + critHit);
        log.innerHTML = "<p class='playerLog'>You CRITICALLY attacked for " + critHit + "!</p>";
        opponentAttackPlayer();
    }
    else {
        if (attackChance === 1) {
            console.log("player missed");
            log.innerHTML = "<p class='playerLog'>Your attack missed!</p>";
            opponentAttackPlayer();
        }
        else {
            opponent.health = opponent.health - player.attack;
            console.log("player attacked opponent for " + player.attack);
            log.innerHTML = "<p class='playerLog'>You attacked the opponent for " + player.attack + "!</p>";
            opponentAttackPlayer();
        }
        checkAlive(); //checks if either player or oppenent is alive
    }
}

function opponentAttackPlayer() {
    if (opponent.health >= 1) {
        var attackChance = Math.floor(Math.random() * 3) + 1;
        if (attackChance === 1) {
            console.log("opponent missed");
            log.innerHTML += "<p class='enemyLog'>Opponent missed!</p>";
        }
        else {
            player.health = player.health - opponent.attack;
            console.log("opponent attacked player for " + opponent.attack);
            log.innerHTML += "<p class='enemyLog'>Opponent attacked you for " + opponent.attack + "!</p>";
        }
    }
}

function block() {
    var blockChance = Math.floor(Math.random() * 10) + 1;
    if (blockChance <= 5) {
        console.log("block failed");
        log.innerHTML = "<p class='playerLog'>Block failed!</p>";
        opponentAttackPlayer(); 
    }
    if (blockChance === 10) {
        player.health = playersFullHealth; //returns players health to full
        console.log("perfect block, health restored back to " + playersFullHealth);
        log.innerHTML = "<p class='playerLog'>Perfect block! Players health restored to" + player.health + "HP!</p>";
    }
    else if (blockChance > 5 && blockChance < 9) {
        var percentHealed = (playersFullHealth / 1) * 0.25;
        player.health = player.health + percentHealed;  //heals 25% of players total health
        console.log("block success, health increased by " + percentHealed);
        log.innerHTML = "<p class='playerLog'>Block success! " + player.health + "HP restored!</p>";
    }
    checkAlive(); //checks if eithe rplayer or oppenent is alive
}