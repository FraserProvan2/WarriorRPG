<?php 
include 'include/db.php'; 
include 'include/auth.php'; 

//Gets users information
$current_user = $_SESSION['gatekeeper'][id];
$selectUser   = $conn->query("SELECT * FROM users WHERE id=$current_user");
$userData     = $selectUser->fetch();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title><?php echo ucfirst($_SESSION['gatekeeper'][username]); ?> - Warrior RPG</title>
</head>

<body style="background-image: url('img/dark_embroidery.png');">

    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <!--Nav-->
        <?php include 'include/nav.php'; ?>

        <!--Row 1-->
        <div class="row">
            
            <!--Play-->
            <div class="col-md-9 content-box">

                <h4 class="sub-heading">Play</h4>

                <div class="play-table levels-div">
                    <table class='table-striped'>
                            <thead>
                                <tr>
                                    <th scope='col' id='table-heading'>Opponent</th>
                                    <th scope='col' id='table-heading' class="table-toHide">Type</th>
                                    <th scope='col' id='table-heading'>Reward</th>
                                    <th scope='col' id='table-heading'>Cost</th>
                                    <th scope='col' id='table-heading'></th>
                                </tr>
                            </thead>
                            <tbody>

                            <!--Henchmen-->
                            <tr>
                                <td>Henchmen</td>
                                <td class="table-toHide">Normal</td>
                                <td></td>
                                <td></td>
                                <td><a href="fight_henchmen.php" class="btn fight-btn">Fight</a></td>
                            </tr> 

                            <tr>
                                <td>Vernox</td>
                                <td class="table-toHide">Normal</td>
                                <td>1 level, 1 token</td>
                                <td></td>
                                <td><a href="fight_vernox.php" class="btn fight-btn">Fight</a></td>
                            </tr> 

                            <tr>
                                <td>Margo</td>
                                <td class="table-toHide">Boss</td>
                                <td>10 levels</td>
                                <td>10 tokens</td>
                                <td> <!--only shows button if tokens is over 10-->
                                    <?php if ($userData[tokens] >= 10) { ;?> 
                                        <a href="fight_margo.php" onclick="spendTokens();" class="btn fight-btn">Fight</a>
                                    <?php } ?> 
                                </td> 
                            </tr> 

                            <!-- To add new opponent
                            <tr>
                                <td>Oppenent Name</td>
                                <td>Reward (In Levels)</td>
                                <td><a href="" class="btn fight-btn">Fight</a></td>
                            </tr> 
                            -->
                            </tbody>
                        </table>
                    </div>

            </div>

            <!--My Stats-->
            <div class="col-md content-box">

                <!--Username-->
                <h4 class="sub-heading">
                    <?php echo ucfirst($userData[username]); ?> </h4>

                <div class="row">
                    <div class="levels-div col-md">

                        <table class="table-hover">
                            <!--Level-->
                            <tr>
                                <td>Level</td>
                                <td><?php echo $userData[level]; ?></td>
                                <td></td>
                            </tr>
                            <!--Health-->
                            <tr>
                                <td>Health</td>
                                <td><?php echo $userData[health]; ?></td>
                                <td>
                                    <!--Level up button-->
                                    <?php if ($userData[unassigned_xp] >= 1) {?>
                                        <form action='level_health.php'>
                                            <button type="submit" class="btn level-button">+</button>
                                        </form>
                                    <?php }?>
                                </td>
                            </tr>
                            <!--Attack-->
                            <tr>
                                <td>Attack</td>
                                <td><?php echo $userData[attack]; ?></td>
                                <td>
                                    <!--Level up button-->
                                    <?php if ($userData[unassigned_xp] >= 1) {?>
                                        <form action='level_attack.php'>
                                            <button type="submit" class="btn level-button">+</button>
                                        </form>
                                    <?php }?>
                                </td>
                            </tr>
                            <!--Block-->
                            <tr>
                                <td>Block</td>
                                <td><?php echo $userData[block]; ?></td>
                                <td>
                                    <!--Level up button-->
                                    <?php if ($userData[unassigned_xp] >= 1) {?>
                                        <form action='level_block.php'>
                                            <button type="submit" class="btn level-button">+</button>
                                        </form>
                                    <?php }?>
                                </td>
                            </tr>
                            <!--Avaliable Points-->
                            <tr>
                                <td class="avaliable-tag">Avaliable Levels</td>
                                <td class="avaliable-tag"><?php echo $userData[unassigned_xp]; ?> </td>
                                <td></td>
                            </tr>
                            <!--Tokens-->
                            <tr>
                                <td class="avaliable-tag">Tokens</td>
                                <td class="avaliable-tag"><?php echo $userData[tokens]; ?> </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Leaderboard-->
        <div class="row">
            
            <div class="col-md content-box">
                <h4 class="sub-heading">Leaderboard</h4>
                <?php
                //selects all users
                $allUsers = $conn->query("SELECT * from users ORDER BY level DESC");
                ?>
                <div class="users-table levels-div">
                    <table class='table-striped'>
                        <thead>
                            <tr>
                                <th scope='col' id='table-heading'>Level</th>
                                <th scope='col' id='table-heading'>Name</th>
                                <th scope='col' id='table-heading' class="table-toHide">Health</th>
                                <th scope='col' id='table-heading' class="table-toHide">Attack</th>
                                <th scope='col' id='table-heading' class="table-toHide">Block</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //loops users results
                                while ($userList = $allUsers->fetch()) {
                            ?>
                            <tr>
                                <td> <?php echo $userList['level']; //level   ?></td>
                                <td><?php echo $userList['username']; //Username  ?></td>
                                <td class="table-toHide"><?php echo $userList['health']; //Health   ?></td>
                                <td class="table-toHide"><?php echo $userList['attack']; //Attack   ?></td>
                                <td class="table-toHide"><?php echo $userList['block']; //Block  ?></td>
                            </tr>
                            <?php }; //loop ends ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

        <!--Footer-->
        <div class="col-sm" id="footer">
            <p>Fraser Provan 2018</p>
        </div>

    </div>
    
    <!--tokens spent-->
    <script>
    function spendTokens() {
        var xhr2 = new XMLHttpRequest();
        xhr2.open('GET', 'rewards/reward_token-spent.php');
        xhr2.send();
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>