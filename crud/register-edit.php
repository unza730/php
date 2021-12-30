<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
<?php 
include 'dbcon.php';
$id = $_GET['id'];
$update = "SELECT * FROM register WHERE id = '$id' ";
$update_query = mysqli_query($conn, $update);
if(mysqli_num_rows($update_query)>0){
   
  

?>

    <div class="maincontainer">
        <div class="innercontainer">
            <h1>Register Now</h1>
            <form action="code.php" method="POST">
                <?php  while ($row = mysqli_fetch_assoc($update_query)){

    
    ?>
    <input type="hidden" name="editid"  value="<?php echo $row['id']?>" required>
        
         <div class="username">
            <label for="">UserName</label>
            <br>
            <input type="text" name="username" placeholder="Enter  UserName"  value="<?php echo $row['username']?>" required>
        </div>
        <div class="email">
           <label for="">Email Address</label>
            <br>
           <input type="text" name="email" placeholder="Enter mail Address"value="<?php echo $row['email']?>" required>
        </div>
       
        <div class="update">
      <button type="submit" class="btn btn-light" name="update"><a href="home.php"> Update </a></button>
        </div>
        
               <?php } ?>
</form>
        </div>
    </div>
    <?php } ?>
</body>
</html>