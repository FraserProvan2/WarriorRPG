<?php include 'include/db.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Warrior RPG</title>
  </head>

  <body>
    <div class="container">

        <h1 class="title">Warrior RPG</h1>
        
        <div class="row">
            <div class="col-md-9 left">
                    <div id="side-panel">

                        <!--Gets users information-->
                            <?php 
                            $current_user = $_SESSION['gatekeeper'][id];
                            $selectUser = $conn->query("SELECT * FROM users WHERE id=$current_user");
                            $userData = $selectUser->fetch();
                            ?>

                        <div class="row">
                            <!--Shows users levels-->
                            <div class="levels-div col-md-7">    
                                <h3><?php echo ucfirst($userData[username]); ?></h3> 
                                <h6>Level: <?php echo $userData[level]; ?></h6>
                                <h6>Health: <?php echo $userData[health]; ?></h6>
                                <h6>Attack: <?php echo $userData[attack]; ?></h6>
                                <h6>Agility: <?php echo $userData[agility]; ?></h6>
                                <h6>Avaliable levels: <?php echo $userData[unassigned_xp]; ?></h6>
                            </div>
                            <div class="col">
                                image here
                            </div>                            
                        
                        </div>
                    </div>  
            </div>

            <div class="col right">
                <?php include 'include/nav.php'; ?>
            </div>

        </div>   
        
    </div>
    <script type='text/javascript' src='scripts/interface.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>