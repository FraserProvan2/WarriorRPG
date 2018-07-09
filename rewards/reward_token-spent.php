<?php

session_start();

//Connets to Database
$conn = new PDO("mysql:host=localhost;dbname=medotusc_warriorrpg;", "medotusc_fraser", "NHD4?oWU5Bpo");

// Selects current users data
$current_user = $_SESSION['gatekeeper'][id];
$selectUser   = $conn->query("SELECT * FROM users WHERE id=$current_user");
$userData     = $selectUser->fetch();

// Applies token reward to users profile
$reward_claimed = $userData[tokens] - 10;
$claim= $conn->prepare("UPDATE users SET tokens = $reward_claimed WHERE id = $current_user");
$claim->execute();