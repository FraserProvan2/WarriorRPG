<div class="row">
    <a href="main.php" class="col btn button"><?php echo ucfirst($_SESSION['gatekeeper'][username]);?></a>
</div>
<div class="row">
    <a href="" class="col btn button">Play</a>
</div>
<div class="row">
    <a href="" class="col btn button">Guide</a>
</div>
<div class="row">
    <a href="" class="col btn button">Leaderboards</a>
</div>
<form action="signout.php" type="get "class="row">
         <button class="btn button col">Sign Out</button>
</form>