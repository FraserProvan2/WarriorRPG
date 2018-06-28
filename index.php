<?php include 'include/db.php'; ?>
<script type='text/javascript' src='scripts/interface.js'></script>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Log In - Warrior RPG</title>
  </head>
  <body>

    <div class="container">
        <div class="row">

            <!--Log In -->
            <div class="col-md">
                <form method='get'  action="signin.php">
                <input class="form-control mr-sm-1" type="search" name="user" placeholder="Username">
                <input class="form-control mr-sm-2" type="password" name="pass" placeholder="Password">
                <button class="btn col" type="submit">Login</button>
                </form>
            </div>

            <!--Sign Up -->
            <div class="col">
                <form method='get' action="signup.php">
                    <input class="form-control mr-sm-1" type="search" name="username" placeholder="Username">
                    <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
                    <input class="form-control mr-sm-2" type="password" name="confirm-password" placeholder="Confirm Password">
                    <button class="btn col" type="submit">Sign Up</button>
                </form>
            </div>

        </div>
      </div>
      
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>