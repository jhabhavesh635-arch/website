<?php
include 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM complaints WHERE id=$id";
mysqli_query($conn,$query);

header("Location: my_complaints.php");
?>