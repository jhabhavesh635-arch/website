<?php
session_start();
include 'config.php';

// check admin login
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

// check id exists
if(isset($_GET['id'])){
    $id = intval($_GET['id']); // security (avoid SQL injection)

    $query = "UPDATE complaints SET status='Resolved' WHERE id=$id";
    mysqli_query($conn,$query);
}

header("Location: admin.php");
?>