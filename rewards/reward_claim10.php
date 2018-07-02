<?php

session_start();

//Connets to Database
$conn = new PDO("mysql:host=localhost;dbname=medotusc_warriorrpg;", "medotusc_fraser", "NHD4?oWU5Bpo");

// Selects current users data
$current_user = $_SESSION['gatekeeper'][id];
$selectUser   = $conn->query("SELECT * FROM users WHERE id=$current_user");
$userData     = $selectUser->fetch();

// Applies reward to users profile
$reward_claimed = $userData[unassigned_xp] + 10;
$claim= $conn->prepare("UPDATE users SET unassigned_xp = $reward_claimed WHERE id = $current_user");
$claim->execute();

// Message to user
echo "10 levels awarded!";