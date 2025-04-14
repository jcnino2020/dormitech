<?php
session_start();

if (!isset($_SESSION['user_id'])) {

    $_SESSION['next_url'] = $_SERVER['REQUEST_URI'];
    header("Location: ../login.php");
    exit;
}

$host = 'localhost';
$dbname = 'jcnino_db'; 
$username = 'jcnino_admin'; 
$password = 'Group5BSIT2B'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>