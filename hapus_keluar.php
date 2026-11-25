<?php
include 'function.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM keluar WHERE id_keluar='$id'");
header("Location: keluar.php");
?>