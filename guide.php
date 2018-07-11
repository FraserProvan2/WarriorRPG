<?php 
include 'include/db.php'; 
include 'include/auth.php'; 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Guide</title>
</head>

<body style="background-image: url('img/dark_embroidery.png');">

    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <!--Nav-->
        <?php include 'include/nav.php'; ?>

        <!--Row 1-->
        <div class="row">

            <!--Stats Explained-->
            <div class="col-md content-box stats">

                <h4 class="sub-heading">Stats Explained</h4>

                <p class="stat-heading">Tokens</p>
                <p>Tokens are gained from fighting Normal Warriors. Spend tokens to fight Boss Warriors.</p>

                <p class="stat-heading">Health</p>
                <p>The level of your Health is the amount of HP your warrior has.</p>

                <p class="stat-heading">Attack</p>
                <p>The level of your Attack is the amount of damage your warrior does. Your warriors attacks hit accuracy is
                <a class="stat-highlight">66%</a>. Each attack has a <a class="stat-highlight">%16</a> chance of being a Critical Attack, which doubles the damage of the attack.</p>

                <p class="stat-heading">Block</p>
                <p>When your warrior blocks there is a <a class="stat-highlight">50%</a> chance of failing, <a class="stat-highlight">40%</a> chance of successfully blocking and <a class="stat-highlight">10%</a> chance
                    for a Perfect Block. A Perfect Block will restore your warriors health to full if its under the starting
                    HP. Each non-perfect successful block will restore HP depending on the warriors block level.</p>

                <table class="table-striped">
                    <tr>
                        <th>Level</th>
                        <th>HP % restored</th>
                    </tr>
                    <tr>
                        <td>1 - 25</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>26 - 55</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>85+</td>
                        <td>30</td>
                    </tr>
                </table>

            </div>

            <!--Opponents specials exaplined-->
            <div class="col-md content-box  stats">

                <h4 class="sub-heading">Opponents Special Abilities</h4>

            </div>

        </div>

        <!--Footer-->
        <div class="col-sm" id="footer">
            <p>Fraser Provan 2018</p>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>