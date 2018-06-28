<?php

// First session start
session_start();

// Connects to Database
$conn = new PDO("mysql:host=localhost;dbname=medotusc_warriorrpg;", "medotusc_fraser", "NHD4?oWU5Bpo");

// Gets users login info
$username = htmlentities($_GET["user"]);
$password = htmlentities($_GET["pass"]);

// Rehash
$hashedPwdInDb = password_hash($password, PASSWORD_DEFAULT);

// Query to check username
$statement = $conn->prepare("SELECT * FROM users WHERE username=:theusername");
$statement->bindParam(":theusername", $username);
$statement->execute();
$row = $statement->fetch();

// Checks theres a username
if ($username == false) {
    echo "Please enter a Username";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// Checks theres a password
else if ($password == false) {
    echo "Please enter a Password";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}

// If username is valid assign to session + open homepage
// Check if password matches hashed PW (algorithm to see if it corresponds to the given hash)
else if (password_verify($password, $row['password'])) {
    $session_array          = array('id' => $row['id'], 'username' => $row['username']);
    $_SESSION['gatekeeper'] = $session_array;
    header('location: main.html');
}

// If details are incorrect
else {
    echo "Username or Password is Incorrect";
    echo "<br><br><button onclick='window.history.back();'>Back</button>";
}