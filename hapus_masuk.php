<?php
include 'function.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM masuk WHERE id_masuk='$id'");
header("Location: masuk.php");
?>
