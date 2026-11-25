<?php
include 'function.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM stock WHERE id_barang='$id'");
header("Location: stock.php");
?>
