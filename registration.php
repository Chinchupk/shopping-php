<style>
      .reg1{
         background: linear-gradient(#E4BBFA,#CCBBFA);
         min-height: 1000px;
      }
   </style>

<?php include("header.php");
if(isset($_SESSION["loginuser"])){
    header("location:account.php");
}

$scc =$err =$m="";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chinchu_db";

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
    $reg_username =$_POST["reg_username"];
    $reg_password =$_POST["reg_password"];

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
  }else if($reg_password==""){
    $err = "password should not  be blank";
    $m=0;
}


    if($m!=0){
    $sql = "INSERT INTO registration (id, reg_name, reg_email,reg_phone,reg_username,reg_password)
VALUES ('', '$reg_name', '$reg_email','$reg_phone','$reg_username','$reg_password')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  $err= "Error: " . $sql . "<br>" . $conn->error;
  $m=0;
}
    }
  }
$conn->close();
?>

<section style="padding-top: 80px;;">
<section class="reg1">
<h1 class="text-center">REGISTRATION</h1>
<div class="col-4 mx-auto">

<form action="registration.php" method="POST">
<div class="mb-3 mt-3">
    <label for="name" class="form-label">Name:</label>
    <input type="name" class="form-control" id="log_name" placeholder="Enter name" name="reg_name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="log_email" placeholder="Enter email" name="reg_email">
  </div>
  <div class="mb-3 mt-3">
    <label for="phone" class="form-label">Phonenumber:</label>
    <input type="phone" class="form-control" id="log_phone" placeholder="Enter phone" name="reg_phone">
  </div>
  <div class="mb-3 mt-3">
    <label for="username" class="form-label">username:</label>
    <input type="username" class="form-control" id="log_username" placeholder="Enter username" name="reg_username">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="log_password" placeholder="Enter password" name="reg_password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>
</section>