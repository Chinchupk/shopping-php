<style>
.button {
  background-color: transparent;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
  font-weight:bold;
  text-shadow:0px 0px 10px black;
}

.button:hover {
  /* background-color: #f1f1f1; */
}
.catbox{
  height:250px;
  background-color:black;
  margin: 15px 0px;
  background-size:cover;
  position:relative;

}
h4.catname{
  position:absolute;
  bottom:0px;
  text-align:center;
  width:100%;
  background-color:rgb(0,0,0,0.5);
}
</style>



<?php include("header.php")?>

<section id="index">
<div class="p-5 bg-primary text-white banner">
<h1>Home</h1>
  </div>
<div class="p-5 bg-primary text-white">
 </div>
 </section>
<section class="sec1">
  <div class="container mt-5">
    <h1 class="display-2 text-center mb-5">catagories</h1>
    <div class="row">

    <?php
    
    $sql =   $sql = "SELECT * FROM category" ;
  
  

$result = $conn->query($sql);

if ($result->num_rows  > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { ?>

  <div class="col-sm-3 text-center">
    <a href="products.php?cid=<?php echo $row["cat_id"]?> ">
    <div class="catbox" style="background-image:url('<?php echo $row["cat_image"]; ?>')">
 
  <!-- <img src=" alt=""
  class="w-100" height="100%"> -->

  <h4 class="catname"> <button class="button"><?php echo $row["cat_name"]; ?></button></h4>
  <!-- <p><?php echo $row["cat_desc"] ?></p> -->

  </a>
  
  </div>
  </div>
  <?php
  }
}else{
  echo "0 results";
}
$conn->close();
  ?>
 </div>
  </div>

  </section>


<?php include("footer.php")?>
