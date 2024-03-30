<?php
 include("header.php");

 if(!isset($_SESSION['loginuser'])){
    header("Location: login.php");
    }   
    
    $user = $_SESSION['loginuser'];
    
    
    $shp = $tax = $tot = 0;

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div class="container mt-5">
        <h1 class="display-2 text-center mb-5">PRODUCTS ORDER</h1>
</head>
<body>
<!-- <div class="cart-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="cart-page">
        <div class="row">
            <div class ="col-sm-8"> -->

         
      
<div class="container">
    <div class="row">
        <div class="col-sm-8">
        <div class="col-sm-3">
        <p class="col-mt-5"><b>Product list</b></p>
        </div>


        <?php
        if(!$_SESSION['loginuser']){
            header("Location: login.php");
        }

        $user = $_SESSION["loginuser"];


        if(isset($_POST['order_name'])){
            $user = $_SESSION["loginuser"];
            $order_name=$_POST['order_name'];
            $order_address=$_POST['order_address'];
            $order_type=$_POST['order_type'];
            $order_status=1;
            $sql="UPDATE `orders` SET `order_name`='$order_name',`order_address`='$order_address',`order_type`='$order_type',`order_status`='$order_status'";
            if($conn->query($sql)===TRUE){
               header("Location: ordersuccess.php");
            }
            $sql1 = "DELETE FROM `cart` WHERE `cart_user` = '$user'";
            if($conn->query($sql1)===TRUE){
                echo "success";
            }
        }

        if(isset($_GET["fromcart"])){

        //delete checkout data

// sql to delete a record
// $sql = "DELETE FROM cart WHERE order_user ='$user'  AND order_status='0'";
// $conn->query($sql);






        //close delete checkout








        //close delete checkout
        $sql="DELETE FROM orders WHERE order_user = '$user' AND order_status='0'";
        if($conn->multi_query($sql)){
            $sql="SELECT * FROM cart WHERE cart_user ='$user'";

            $result=$conn->query($sql);

            if($result->num_rows > 0) {



                $sql="";
                

                while($row = $result->fetch_assoc()) { 

                    $prod_id = $row['prod_id'];
                    $prod_name = $row['prod_name'];
                    $prod_price = $row['prod_price'];
                    $prod_image = $row['prod_image'];
                    $prod_qty = $row['prod_qty'];
                    $prod_amount = $row['prod_amount'];
                    

                    $sql .="INSERT INTO `orders`(`id`, `order_name`, `order_address`, `order_type`, `order_status`, `order_user`, `prod_id`, `prod_name`, `prod_price`, `prod_image`, `prod_qty`, `prod_amount`) VALUES ('','','','','0','$user','$prod_id','$prod_name','$prod_price','$prod_image','$prod_qty','$prod_amount');";

                 }
            }else {
                echo"0 results";        
            }

            //echo $sql; die;

            if ($conn->multi_query($sql) === TRUE) {
                echo "New records created successfully";
                header("Location: checkout.php");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }

            }
        }

        ?>



<?php 

                $sql = "SELECT * FROM orders WHERE order_user = '$user' AND order_status='0'" ;

              
              
              $result = $conn->query($sql);
              $sub = 0;
              if ($result->num_rows > 0) {
                // output data of each row
                
                while($row = $result->fetch_assoc()) {

                    
                    $qty =$row["prod_qty"];
                    $amt=$qty * $row["prod_price"];
                    $sub += $amt;
                    

                    ?>
               

    <div class="row my-3">

    <div class="col-sm-3 img">
    <img src="<?php echo $row["prod_image"]?>" alt=""
                    class="w-50">
        </div>


        <div class="col-sm-5  bb">
            <div class="">
           <h4> <?php echo $row["prod_name"];?></h4>
                  <p>Qty :<?php echo $row["prod_qty"];?></p>
                  </div>
        </div>

        <div class="col-sm-2  cc">
        <div class="">
        <p>Rs.<?php echo $row["prod_price"]?></p>
        </div>
        </div>

        <div class="col-sm-2 dd" >
        <div class="">
        <p><?php echo $row ["prod_amount"]?></p>
        </div>
        </div>
        </div>

                    

        <?php 
                }

                    $shp= $sub*5/100;
                    $tax =$sub*18/100;
                    $tot= $sub+$shp+$tax;
                } else {
                    echo "0 results";
                  }
            //   $conn->close();  
            ?>






<!-- <div class="cart1">
    <div class="row">
        
    </div>
    </div> -->
    </div>
    <div class="col-sm-4 my-4">
<div class="check-sum">
    <div class="p-3">
    <p>SUMMARY</p>
   
              <hr>
              <p>SUBTOTAL : ₹<?php echo $sub;?></p>
            <P>Shipping : ₹<?php echo $shp;?></P>
            <p>Sales Tax : ₹<?php echo $tax;?></p>

            <hr>

            <p>ESTIMATED TOTAL : ₹<?php echo $tot;?> </p>

            <hr>

            

            <form action="" method="post">
              
            <div class="mb-3 mt-3">
                        <label for="order_name" class="form-label">Name:</label>
                         <input type="text" class="form-control" id="order_name" placeholder="Enter your name" name="order_name">
                    </div>
                    <label for="order_address">Address:</label>
                    <textarea class="form-control" rows="5" id="order_address" name="order_address"></textarea>
                    <div class=" mt-3">
                    <input type="checkbox" name="order_type" id="" value="cod"> <span>Cash on delivery</span>
                    </div>


                    

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>


    <!-- <div class> -->
        <!-- <a href="checkout.php?fromcart=1">
    <button class="check-out">SUBMIT</button></a>
     
    </div> -->


            </div>

</div>
 

    </div>
</div>
</div>





    <style>
    .check-sum{
        min-height: 300px;
        background-color: #f4f5f5; 
    }
</style>
        
</body>
</html>

<?php include("footer.php")?>