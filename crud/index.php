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
if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
// $phone = mysqli_real_escape_string($conn, $_POST['pno']);

$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$mail = "SELECT * FROM register WHERE email = '$email' ";
$mailquery = mysqli_query($conn, $mail);
if(mysqli_num_rows($mailquery) > 0){
    echo "Email Already Exist";
}
else{
    if($password === $cpassword){
        $insert = "INSERT INTO register(username, email, password, cpassword) VALUES ('$username', '$email', '$pass', '$cpass')";
       $insertquery = mysqli_query($conn, $insert);
       if($insertquery){
    ?>
    <script>
    alert("Insert Successfully!");
    </script>
    <?php
}else{
    ?>
 <script>
    alert("Insert Failed Failed!");
    </script>
    <?php
}

    }
    else {
        echo "password are not matching";
        }
}
}
?>

    <div class="maincontainer">
        <div class="innercontainer">
            <h1>Register Now</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="username">
            <label for="">UserName</label>
            <br>
            <input type="text" name="username" placeholder="Enter  UserName" required>
        </div>
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
        <div class="cpassword">
            <label for="">Confirm Password</label>
            <br>
            <input type="text" placeholder="Enter Confirm Password" name="cpassword" required>
        </div>
        <div class="createaccount">
        <button name="submit">Create Account</button>
        </div>
        <div class="alreadyaccount">
            <p>Have an Account ? <a href="login.php"> Login </a></p>
               
        </div>
</form>
        </div>
    </div>
</body>
</html>