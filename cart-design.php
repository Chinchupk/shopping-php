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
    <body>
    <div class="container mt-5 pt-3 cartpage">
        <h1 class="display-2 text-center mb-5 pt-5">MY SHOPPING BAG</h1>
</head>

<div class="cart-box">
    <div class="row">
        <div class="col-sm-12">

     


    <div class="cart-page">
        <div class="row">
            <div class ="col-sm-8">

         
      
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        <p class="col-mt-5"><b>Products</b></p>
        </div>

        <div class="col-sm-5">
            <p></p>
        </div>

        <div class="col-sm-2">
        <p class="col-mt-5"><b>Price</b></p>
        
        </div>

        <div class="col-sm-2" >
        <p class="col-mt-5"><b>Total</b></p>
        </div>

    </div>

   

    
    <?php    
             


              if(isset($_GET["did"])){
                $did =$_GET["did"];
                $sql = "DELETE FROM cart WHERE id = '$did'";
                if($conn->query($sql)===TRUE){
                    header("Location:cart-design.php");
                }
                else{
                    echo "Error";
                   }
              }
              
              if(isset($_GET['qi'])){
                $qi =$_GET['qi'];
                $sql ="UPDATE  `cart` SET `prod_qty`=`prod_qty`+1, `prod_amount`=`prod_price`*`prod_qty` WHERE `id`=$qi";

                if($conn->query($sql)===TRUE){
                 header("Location:cart-design.php");
                }
                else{
                 echo "Error";
                }
             
             }
             
             if(isset($_GET['qd'])){
                 $qd = $_GET['qd'];
                 $sql ="UPDATE `cart` SET `prod_qty`=`prod_qty`-1, `prod_amount`=`prod_price`*`prod_qty` WHERE `id`=$qd AND `prod_qty`>1";
             
                if($conn->query($sql)===TRUE){
                 header("Location:cart-design.php");
                }
                else{
                 echo "Error";
                }
             
             }
              
             $sql =  "SELECT * FROM cart WHERE cart_user='$user'";
             $sub= 0;
              
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

    <div class="col-sm-3 image">
    <img src="<?php echo $row["prod_image"]?>" alt=""
                    class="w-50">
        </div>


        <div class="col-sm-5  bb">
            <div class="">
           <h4> <?php echo $row["prod_name"];?></h4>

           <a href="cart-design.php?qd=<?php echo $row ["id"];?>">
        <button class="neg">-</button></a>

                    <?php echo $row["prod_qty"];?>
                    <a href="cart-design.php?qi=<?php echo $row ["id"];?>">
                <button class="post">+</button>
                </a>

                   
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
        <a href="cart-design.php?did=<?php echo $row ["id"];?>"><button class="btn btn-warning">
        <i class="bi bi-trash3-fill"></i></button>
         </a>
        </div>
        </div>
        </div>



        <?php 
                }

                    $shp= $sub*5/100;
                    $tax =$sub*18/100;
                    $tot= $sub+$shp+$tax;
              
            //   $conn->close();  
            ?>


<!-- <div class="cart1">
    <div class="row">
        
    </div>
    </div> -->

</div>
    
    </div>
    <div class="col-sm-4 my-4">
<div class="cart-sum">
    <div class="p-3">
    <p>SUMMARY</p>
   
              <hr>
              <p>SUBTOTAL : ₹<?php echo $sub;?></p>
            <P>Shipping : ₹<?php echo $shp;?></P>
            <p>Sales Tax : ₹<?php echo $tax;?></p>

            <hr>

            <p>ESTIMATED TOTAL : ₹<?php echo $tot;?> </p>

            <hr>

            <div >
                <a href="checkout.php?fromcart=1">
              <button class="check-out">CHECKOUT</button></a>     
            </div>

            


              


            </div>

</div>

 
    </div>
    <?php 
        $empty = 0;       
} else {
         $empty = 1;
        }
             ?>
    
</div>

</div>
 </div>
    </div>


    </div>
    </div>
    </div>
    </div>
    </div>
    

    <?php
    if($empty==1){?>

<style>.cartpage{display:none;}</style>

<img src="images/cart-empty.jpg" alt="" style="width: 100%;margin-top:100px">

        <?php }
    ?>
    

<style>
    
    div.blue{
        background-color: blue;
        
    
      
    }
    .black{
        background-color: green;
       
    }
    .yellow{
        background-color: yellow;
       
    }
    .black{
        background-color: black;
   
    }
    .green{
        background-color: green;
 
    }
    .img{
        /* background-color: black; */
 
       min-height: 50px;

    }
    .bb{
        /* background-color: blue; */
 
        min-height: 50px;

    }
    .cc{
        /* background-color: red; */
        
        min-height: 50px;

    }
    .dd{
        /* background-color: green; */
        
        min-height: 50px;

    }
    
    /* .my-4{
         background-color: green; 
        border: 1px sol;
    } */

    .cart-sum{
        min-height: 300px;
        background-color: #f4f5f5; 
    }
   .check-out{
 background-color: black;   
 border: none;
color:white;
padding: 10px 20px;
text-align: center;
text-decoration: none;
display: inline-block;
margin: 4px 2px;
cursor: pointer;
border-radius: 16px;
font-weight:bold;
text-shadow: 0px 0px 10px black;
   }
   .post{
        color:black;
        background-color: green;
    }
    .neg{
        color:black;
        background-color: red;
    }
 
    
    

</style>


    
</body>
</html>

<?php include("footer.php")?>