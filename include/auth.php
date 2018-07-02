<?php 
if (!isset($_SESSION["gatekeeper"])) {
   header('location: index.php');
}