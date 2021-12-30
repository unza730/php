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
if(isset($_POST['submit'])){
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$mail = "SELECT * FROM register WHERE email = '$email' ";
$mailquery = mysqli_query($conn, $mail);
if(mysqli_num_rows($mailquery) > 0){
   $row = mysqli_fetch_assoc($mailquery);
   $db_pass= $row['password'];
   $_SESSION = $row['username'];
   $pass_decode = password_verify($password, $db_pass);
   if($pass_decode){
       echo "Login SuccessFully";
       header("Location: http://localhost/phppracticecode/crud/home.php");
   }
   else{
       echo "Invalid Password";
   }} 
   else{
       echo "Invalid Email";
   }
    
}
?>
    <div class="maincontainer">
        <div class="innercontainer">
            <h1>Register Now</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="email">
           <label for="">Email Address</label>
            <br>
           <input type="text" name="email" placeholder="Enter mail Address" required>
        </div>
        <div class="password">
           <label for="">Password</label>
        <br>
           <input type="text" placeholder="Enter Password" name="password" required>
        </div>

        <div class="createaccount">
        <button name="submit">Login</button>
        </div>
        <div class="alreadyaccount">
            <p>Don't Have an account ? <a href="index.php"> Sign up Here </a></p>
               
        </div>
</form>
        </div>
    </div>

</body>
</html>