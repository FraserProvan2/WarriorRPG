<?php

// Keeps session
session_start();

// Destroys the session
session_destroy();
unset($_SESSION['gatekeeper']);

// Sends user back to homepage
header('location: index.php');