<style>
  .cart1{

border: none;
color: black;
padding: 10px 20px;
text-align: center;
text-decoration: none;
display: inline-block;
margin: 4px 2px;
cursor: pointer;
border-radius: 16px;
font-weight:bold;
}
.pro_box{
  min-height: 300px;
  margin: 15px 0px;
}
img.pro_pic{
  max-width: 100%;
  max-height: 200px;
}
.propic_box{
  height: 200px;
}
</style>


<?php
  include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

  <title>PRODUCTS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">





  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="product.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php

if(isset($_GET["pid"])){
  if(!isset($_SESSION["loginuser"])){
    header("Location: login.php");
}
else{
  $pid =$_GET["pid"];
  $user=$_SESSION["loginuser"];

  $sql0 ="SELECT * FROM cart WHERE cart_user = '$user' AND prod_id ='$pid'";

  $result = $conn->query($sql0);

  if($result-> num_rows > 0){
   $row =$result->fetch_assoc();
   $cid = $row["id"];
   header("Location: cart-design.php?qi=$cid");
  }else{

  


 $sql ="SELECT * FROM products WHERE id = '$pid' ";

 $result = $conn->query($sql);

 if($result-> num_rows > 0) {

   while($row =$result->fetch_assoc() ){

      $cart_user = $_SESSION["loginuser"];
      $prod_id = $pid;
      $prod_name = $row["prod_name"];
      $prod_price = $row["prod_price"];
      $prod_image = $row["prod_image"];
      $prod_qty = 1;
      $prod_amount = $row["prod_price"];

      
$sql = "INSERT INTO cart (id, cart_user, prod_id, prod_name, prod_price, prod_image, prod_qty, prod_amount)
VALUES ('', '$cart_user','$prod_id', '$prod_name','$prod_price','$prod_image','$prod_qty','$prod_amount')";

if ($conn->query($sql) === TRUE) {
echo "product addeds to cart successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

   }
}
}
}
}
?>




  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
       
        <?php 

                $sql =  $sql = "SELECT * FROM category" ;


             
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>
                
            
                <a class="nav-link " href="products.php?cid=<?php echo $row["cat_id"]?>">
                  
                  <!-- <div class="prod_image"> -->
                  <i class="bi bi-grid"></i>  


                  <span><?php echo $row["cat_name"];?></span>
                 <!-- <h4> <button class="button"><?php echo $row["cat_name"];?></button></h4> -->
                </a>
                 <!-- </div>  -->
                 
                 <?php 
                }
              } else {
                echo "0 results";
              }

            ?>


      </li><!-- End Dashboard Nav -->

      <!-- End Forms Nav -->




       
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="mt-4">PRODUCTS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      <div class="row">

 

             

<?php 
  if(isset($_GET["cid"])){
    $cid =$_GET["cid"];
    $sql = "SELECT * FROM products WHERE cat_id = '$cid' " ;
  }else{
    $sql =  $sql = "SELECT * FROM products" ;
  }

 
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>

    <div class="col-sm-3 text-center">
      <div class="pro_box">
     <div class="propic_box">
     <img src="<?php echo $row["prod_image"]?>" alt=""
        class="pro_pic">
        </div>
        <h4><?php echo $row["prod_name"];?></h4>
        <p>Rs.<?php echo $row["prod_price"]?></p>
        <a href="products.php?pid=<?php echo $row["id"];?>">
      <button class="cart1 btn-warning"><i class="bi bi-cart2"></i></button>
      </a>
    </div>
    </div>
  
     <?php 
    }
  } else {
    echo "0 results";
  }
  $conn->close();  
?>


</div>
</div>
      </div>
    </div>
  </div>
</section>
 
                  
 
     
          
  
</body>

</html>