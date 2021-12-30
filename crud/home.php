<?php 
if(!isset($_SESSION['username'])){
    echo 'You are Logout';

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="home.css">
    <title>Hello, world!</title>
  </head>
  <body>
   <?php
       include("dbcon.php");

       $select = "SELECT * FROM register";
       $query = mysqli_query($conn, $select);

       if(mysqli_num_rows($query) > 0){
          
    ?>
      <div class="container maincontainer">
          <div class="heading">
    <h1>Hello, world!</h1>
<button type="button" name="register" class="btn btn-light">
    <a href="index.php"> Register </a>
   
</button>
</div>

    <table class="table maincontainer">
  <thead>
     
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
       <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    
    </tr>
  </thead>
  <tbody>
       <?php
       while($row = mysqli_fetch_assoc($query)){
         ?>     
           <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><button type="button" class="btn btn-light"><a href="register-edit.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>
     <td>
      <button type="button"  class="btn btn-light"><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a> </button></td>
     
    </tr>
    <?php   } ?>
  </tbody>
</table>
     
 

</div>
<?php } ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>