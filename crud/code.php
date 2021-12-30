<?php 
include("dbcon.php");

if(isset($_POST['update'])){
    $updateid = $_POST['editid'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $updatee = "UPDATE register SET id='$updateid', username='$user', email='$email' WHERE id = '$updateid'";
    $updatequeryy = mysqli_query($conn, $updatee);
    if($updatequeryy){
        echo "Update SuccessFully";
         header("Location: http://localhost/phppracticecode/crud/home.php");
    }
    else {
        echo "Not Successfully";
         header("Location: http://localhost/phppracticecode/crud/home.php");
    }

}


if(isset($_POST['deletebtn'])){
    $id = $_POST['deleteid'];
    $delete = "DELETE FROM register WHERE id = '$id' ";
    $deletequeryy = mysqli_query($conn, $delete);
    if($deletequeryy){
        echo "Update SuccessFully";
         header("Location: http://localhost/phppracticecode/crud/home.php");
    }
    else {
        echo "Not Successfully";
         header("Location: http://localhost/phppracticecode/crud/home.php");
    }

}

?>