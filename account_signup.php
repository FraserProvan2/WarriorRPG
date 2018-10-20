<?php

//Connets to Database
$conn = new PDO();

//gets
$username  = htmlentities($_GET["username"]);
$password  = htmlentities($_GET["password"]);
$password2 = htmlentities($_GET["confirm-password"]);

//default values for new characters
$unassigned_xp = 0;
$health = 10;
$attack = 1;
$block = 1;
$level = 1;

// Used later to check if user exists
$check_username = $conn->prepare("SELECT * FROM users WHERE username = ?");
$check_username->bindParam(1, $username);
$check_username->execute();
$rows_username = $check_username->fetch();

// Used later to check if email is in use
$check_email = $conn->prepare("SELECT * FROM df_users WHERE email = ?");
$check_email->bindParam(1, $email);
$check_email->execute();
$rows_email = $check_email->fetch();

// Checks theres a Username
if ($username == false) {
    echo "Please enter a Username";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// To check if user exists
else if ($rows_username['username'] === $username) {
    echo "User already exists";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// Makes sure word is atleast 5 letters
else if (strlen($username) < 5){
    echo "Username must be atleast 5 characters";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// Checks theres a Password
else if ($password == false) {
    echo "Please enter a Password";
    echo "<br><br><button onclick='window.history.back();'>Back</button>"; 
}

// Makes sure password is atleast 5 letters
else if (strlen($password) < 5){
    echo "Password must be atleast 5 characters";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// Checks if Passwords match
else if ($_GET["password"] != $_GET["confirm-password"]) {
    echo "Passwords do not match!";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

else {
    // Hashes password
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    // Query to insert new user
    $statement = $conn->prepare("INSERT INTO users (username, password, unassigned_xp, health, attack, block, level) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $statement->bindParam(1, $username);
    $statement->bindParam(2, $hashed_pass);
    $statement->bindParam(3, $unassigned_xp);
    $statement->bindParam(4, $health);
    $statement->bindParam(5, $attack);
    $statement->bindParam(6, $block);
    $statement->bindParam(7, $level);
    $statement->execute();

    echo "Warrior Created!";
    echo "<br><br><button onclick='window.history.back();'>Return to Log In</button>";
}