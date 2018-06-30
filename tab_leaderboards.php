<?php include 'include/db.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Tab name- Warrior RPG</title>
</head>

<body style="background-image: url('img/dark_embroidery.png');">
    <div class="container">

        <h1 class="title">Warrior RPG</h1>

        <div class="row">

            <div class="col-md-9 left">

                <h4 class="sub-heading">Leaderboards</h4>

                <div id="side-panel">

                    <div class="row">

                        <div class="levels-div col-md">

                        <!--Leaderboard-->
                        <?php
                        //selects all users
                        $allUsers = $conn->query("SELECT * from users ORDER BY level DESC");
                        ?>
                        <div class="users-table">
                        <table class='table table-striped' id='myTable'>
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
                                    while ($userList = $allUsers ->fetch()) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $userList['level']; //level  ?>
                                    </td>
                                    <td>
                                            <?php echo $userList['username']; //Username ?>
                                    </td>
                                    <td class="table-toHide">
                                        <?php echo $userList['health']; //Health  ?>
                                    </td>
                                    <td class="table-toHide">
                                        <?php echo $userList['attack']; //Attack  ?>
                                    </td>
                                    <td class="table-toHide">
                                        <?php echo $userList['block']; //Block ?>
                                    </td>
                                </tr>
                                <?php }; //loop ends ?>
                            </tbody>
                            
                        </table>
                    </div>



                        </div>

                    </div>

                </div>

            </div>

            <!--Navs-->
            <div class="col right">
                <?php include 'include/nav.php';?>
            </div>

        </div>
    </div>
    <script type='text/javascript' src='scripts/interface.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>