<?php
include 'include/db.php';
include 'include/auth.php';

//Getting users stats
$current_user = $_SESSION['gatekeeper'][id];
$selectUser   = $conn->query("SELECT * FROM users WHERE id=$current_user");
$userData     = $selectUser->fetch();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>vs. Vernox</title>
</head>

<body style="background-image: url('img/dark_embroidery.png');">
    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <!--Nav-->
        <?php include 'include/nav.php'; ?>

        <div class="row">
            <div class="col-md content-box fightBox">

                <!--Names-->
                <div class="row">
                    <h6 class="col playerName">
                        <?php echo $_SESSION['gatekeeper'][username]; ?>
                    </h6>
                    <h6 class="col oppName">Vernox</h6>
                </div>

                <!--Artwork-->
                <img src="img/fights/vernox.png" class="img-fluid rounded artwork">

                <!--HP-->
                <div class="row">
                    <h6 class="col playerHP">HP:
                        <a id="playerHP" class="hpLarge"></a>
                    </h6>
                    <h6 class="col oppHP">HP:
                        <a id="enemyHP" class="hpLarge"></a>
                    </h6>
                </div>

                <!--Claim rewards-->
                <div id="claim-response" class="row tools-div">
                    <button onclick="attackVernox()" class="col-md attack-block btn">Attack</button>
                    <button onclick="blockVernox()" class="col-md attack-block btn">Block</button>
                </div>

                <h6 class="turn">Turn
                    <a id="turn"></a>
                </h6>

                <!--Combat log-->
                <div class="row">
                    <div class="col" id="log">
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
        var playerHealth = "<?php echo $userData[health]; ?>";
        var playerAttack = "<?php echo $userData[attack]; ?>";
        var playerBlock = "<?php echo $userData[block]; ?>";
        var playerLevel = "<?php echo $userData[level]; ?>";

        //creates object for player
        var player = new Object();
        player.health = playerHealth;
        player.attack = playerAttack;
        player.block = playerBlock;

        //logs to confirm stats have been passed
        console.log("players health is " + player.health);
        console.log("players attack is " + player.attack);
        console.log("players block is " + player.block);

        //creates object for vernox
        var opponent = new Object();
        opponent.health = 10;
        opponent.attack = 1;

        //logs to confirm vernox stats
        console.log("vernoxs health is " + opponent.health);
        console.log("vernoxs attack is " + opponent.attack);

        //Vernox Abilities
        function vernoxAbility() {
            player.health = player.health - 1;
            log.innerHTML += "<p class='effect'>- Vernox pierces you with fear for 1!</p>";
        }

        //Vernox Fight functions
        function attackVernox() {
            if (playerLevel < 20) {
                attack();
                vernoxAbility();
            }
            else {
                log.innerHTML += "<p class='effect'>- Vernox cant be hit if you are over level 20!</p>";
            }
        }

        function blockVernox() {
            block();
            vernoxAbility();
        }

        //Checks everyones alive
        function checkAlive() {
            if (player.health < 1) {
                console.log('player died');
                log.innerHTML += "<p class='loss'>You Lost!</p>";
                div.innerHTML = "<button onclick='window.history.back()' class='col-md attack-block btn' >Return Home</button>";
            }
            if (opponent.health < 1) {
                console.log('opponent.died');
                log.innerHTML += "<p class='victory'>Winner!</p>";
                div.innerHTML = "<a onclick='claim1();' href='http://fraserprovan.co.uk/projects/warriorRPG/main.php' class='col-md attack-block btn' >Claim Reward</a>";
            }
        }

        //Interface
        //Current Turn:
        var vernoxHealth = setInterval(function () {
            document.getElementById("turn").innerHTML = turn;
        }, 1);

        //Players health:
        var playerHealth = setInterval(function () {
            document.getElementById("playerHP").innerHTML = player.health;
        }, 1);

        //vernox health:
        var vernoxHealth = setInterval(function () {
            document.getElementById("enemyHP").innerHTML = opponent.health;
        }, 1);

    </script>
    <script type='text/javascript' src='scripts/game_mechanics.js'></script>
    <script type='text/javascript' src='rewards/rewards.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>