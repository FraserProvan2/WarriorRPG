<?php 
//Content in include files
//Ensures session is kept
session_start();
$conn = new PDO("mysql:host=localhost;dbname=medotusc_warriorrpg;", "medotusc_fraser", "NHD4?oWU5Bpo");
//Ensures user is signed in
if (!isset($_SESSION["gatekeeper"])) {
    header('location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Hello, world!</title>
  </head>
  <body style="background-image: url('img/dark_embroidery.png');">
    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <div class="row">
            <div class="col-md content-box">

                <h4 class="sub-heading">Henchmen</h4>



            </div>
        </div>

            <!--Footer-->
    <div class="col-sm" id="footer">
            <p>Fraser Provan 2018</p>
            </div>
    </div>



    <script type='text/javascript' src='rewards/rewards.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>



<div id="claim_response"><button onclick="claim5()">Claim Reward</button></div>