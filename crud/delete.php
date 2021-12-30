<?php 
include("dbcon.php");
  $id = $_GET['id'];
    $delete = "DELETE FROM register WHERE id = '$id' ";
    $deletequeryy = mysqli_query($conn, $delete);
 header("Location: http://localhost/phppracticecode/crud/home.php");
?>