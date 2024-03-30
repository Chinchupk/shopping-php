<style>
      .log1{
         background: linear-gradient(#E4BBFA,#CCBBFA);
         min-height: 1000px;
      }
   </style>

<?php
include("header.php");

if(isset($_SESSION["loginuser"])){
    header("Location: products.php");
}

$scc = $err = $m ="";
if(isset($_POST["log_username"])){
    $log_username = $_POST["log_username"];
    $log_password = $_POST["log_password"];
     $sql = "SELECT * FROM registration WHERE reg_username='$log_username'AND reg_password='$log_password'";
     
     $result = $conn->query($sql);

     if($result->num_rows > 0){
        $_SESSION["loginuser"] =$log_username;
        header("Location: products.php");


     }else{
        $err = "invalid username or password";
        $m = 0;
     }
     $conn->close();
     $m =0;

}
?>
<section style="padding-top: 80px;;">
<section class="log1">
<h1 class="text-center">LOGIN</h1>
<div class="col-4 mx-auto">

<form action="login.php" method="POST">
    <?php if($m==1){?>
        <span class="text-success"><?php echo $scc; ?></span>
        <?php } else if($m==0){?>
            <span class="text-danger"><?php echo $err; ?></span>
            <?php } ?>
  <div class="mb-3 mt-3">
    <label for="username" class="form-label">username:</label>
    <input type="username" class="form-control" id="log_username" placeholder="Enter username" name="log_username">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="log_password" placeholder="Enter password" name="log_password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>
</section>


<?php include("footer.php")?>