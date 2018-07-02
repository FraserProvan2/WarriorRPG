<?php 
include 'include/db.php'; 
include 'include/auth.php'; 

//Getting users stats
    $current_user = $_SESSION['gatekeeper'][id];
    $selectUser = $conn->query("SELECT * FROM users WHERE id=$current_user");
    $userData = $selectUser->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Fight vs. Henchmen</title>
  </head>
  <body style="background-image: url('img/dark_embroidery.png');">
    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <div class="row">
            <div class="col-md content-box">

                <h4 class="sub-heading">Henchmen</h4>



                <div id="claim-response">
                    <button onclick="attackHenchmen()">attack</button>
                    <button onclick="blockHenchmen()">block</button>

                    <div id="log">
                        <br><br>
                    </div>
                </div>

            </div>
        </div>

            <!--Footer-->
    <div class="col-sm" id="footer">
            <p>Fraser Provan 2018</p>
            </div>
    </div>

    
    <script>

    var div = document.getElementById('claim-response');
    var log = document.getElementById('log');

//Applying users stats for javascript variables
    //echos php variagles into havascript variables
    var playerHealth = "<?php echo $userData[health] ?>";
    var playerAttack = "<?php echo $userData[attack] ?>";
    var playerBlock = "<?php echo $userData[block] ?>";

    //creates object for player
    var player = new Object();
    player.health = playerHealth;
    player.attack = playerAttack; 
    player.block = playerBlock;

    //logs to confirm stats have been passed 
    console.log("players health is " + player.health);
    console.log("players attack is " + player.attack);
    console.log("players block is " + player.block);

    //creates object for henchmen
    var opponent = new Object();
    opponent.health = 10;
    opponent.attack = 1; 
    opponent.block = 1;

    //logs to confirm henchmens stats
    console.log("henchmens health is " + opponent.health);
    console.log("henchmens attack is " + opponent.attack);
    console.log("henchmens block is " + opponent.block);

//Henchmen Fight functions
function attackHenchmen() {
    attack();
}

function blockHenchmen() {
    block();
}

//Checks everyones alive
function checkAlive() {
    if (player.health <= 0) {
        console.log('player died');
        div.innerHTML = "<p>You Lost!</p>";
    }
    if (opponent.health <= 0) {
        console.log('opponent.died');
        log.innerHTML = "<p>Winner!</p>";
        div.innerHTML = "<button onclick='claim5()'>Claim Reward</button>";
    }
}

    </script>
    <script type='text/javascript' src='scripts/game_mechanics.js'></script>
    <script type='text/javascript' src='rewards/rewards.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>

