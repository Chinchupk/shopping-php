<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
    </a>
  </div>
</nav>



<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


<?php
if(isset($_POST["reg_name"])){
$reg_name =$_POST["reg_name"];
$reg_email =$_POST["reg_email"];
$reg_phone =$_POST["reg_phone"];
$reg_password =$_POST["reg_password"];



if(isset($_POST["reg_name"])){
    $reg_name =$_POST["reg_name"];
    $reg_email =$_POST["reg_email"];
    $reg_phone =$_POST["reg_phone"];
    $reg_username =$_POST["reg_username"];

    if($reg_name==""){
        $err = "Name should not  be blank";
        $m=0;
    }else if($reg_email==""){
        $err = "Email should not  be blank";
        $m=0;
    }else if($reg_phone==""){
        $err = "phone should not  be blank";
        $m=0;
    }else if($reg_username==""){
        $err = "username should not  be blank";
        $m=0;
    }





}
if($m!=0){
$sql = "INSERT INTO registration (id, reg_name, reg_email, reg_phone,reg_password)
VALUES ('','$reg_name','$reg_email','$reg_phone','$reg_password,')";

if ($conn->query($sql) === TRUE) {
  $scc= "New record created successfully";
} else {
  $err= "Error: " . $sql . "<br>" . $conn->error;
  $m=0;
}
    }

$conn->close();
?>


<h1 class="text-center">Registration</h1>
<div class="container">
    <div class="col-sm-6">
    <div class="mb-3 mt-3">
<form action="reg.php" method="POST">


<?php if($m==1){?>
        <span class="text-success"><?php echo $scc; ?></span>
        <?php } else if($m==0){?>
            <span class="text-danger"><?php echo $err; ?></span>
            <?php } ?>
    <label for="name" class="form-label">name:</label>
    <input type="name" class="form-control" id="reg_name" placeholder="Enter name" name="reg_name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">email:</label>
    <input type="email" class="form-control" id="reg_email" placeholder="Enter email" name="reg_email">
  </div>
  <div class="mb-3 mt-3">
  <label for="phone" class="form-label">phone:</label>
    <input type="phone" class="form-control" id="reg_phone" placeholder="Enter phone" name="reg_phone">
  </div>
  <div class="mb-3 mt-3">
  <label for="password" class="form-label">password:</label>
    <input type="password" class="form-control" id="reg_password" placeholder="Enter password" name="reg_password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>

  
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>