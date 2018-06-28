//Loads game (Play)
function load_game() {
    document.getElementById("side-panel").innerHTML='<object type="text/html" data="game/stage1.html" ></object>';
}

//Loads character (Levels)
function load_stats() {
    document.getElementById("side-panel").innerHTML='<object type="text/html" data="stats.html" ></object>';
}

//Loads leaderboards
function load_leaderboards(){
    document.getElementById("side-panel").innerHTML='<object type="text/html" data="leaderboard.html" ></object>';
}

//Loads guide
function load_guide() {
    document.getElementById("side-panel").innerHTML='<object type="text/html" data="guide.html" ></object>';
}

//Signs out
function signout() {
    document.getElementById("side-panel").innerHTML='<object type="text/html" data="guide.html" ></object>';
}