<?php 

include 'include/db.php'; 

// Selects users information
$current_user = $_SESSION['gatekeeper'][id];
$selectUser = $conn->query("SELECT * FROM users WHERE id=$current_user");
$userData = $selectUser->fetch();

// Ensures user has enough points
if ($userData[unassigned_xp]  > 0) {

    // Adds one level to block
    $leveled_up_block= $userData[block] + 1;
    $levelup = $conn->prepare("UPDATE users SET block = $leveled_up_block WHERE id = $current_user");
    $levelup->execute();

    // Updates unassigned points
    $level_assigned = $userData[unassigned_xp] - 1;
    $level_spent = $conn->prepare("UPDATE users SET unassigned_xp = $level_assigned  WHERE id = $current_user");
    $level_spent->execute();

    // Adds on to level
    $new_total_level = $userData[level] + 1;
    $level_total = $conn->prepare("UPDATE users SET level= $new_total_level WHERE id = $current_user");
    $level_total->execute();

}

// Returns to stats page
header('location: main.php');