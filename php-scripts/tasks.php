<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'functions.php';
include 'connection.php';

switch ($_GET['task']) {
    case 'update-user-data':
        $id = $_SESSION['id_user'];
        $name = $_POST['name'];
        $last_names = $_POST['last_names'];
        $email = $_POST['email'];
        
        break;
    
    default:
        # code...
        break;
}