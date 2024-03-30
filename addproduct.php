
    <?php
    include("header-admin.php");
    if(isset($_POST["submit"])){
 $uploadOk=0;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["prod_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

 $check = getimagesize($_FILES["prod_image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["prod_image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "webp" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["prod_image"]["name"])). " has been uploaded.";
    $uploaded = 1;
  } else {
    echo "Sorry, there was an error uploading your file.";
    $uploaded = 0;
  }
}
if($uploaded==1){
 
$prod_name = $_POST["prod_name"];
$cat_id = $_POST["cat_id"];
$prod_price = $_POST["prod_price"];
$prod_image =$target_file;

$sql = "INSERT INTO products (id, prod_name,cat_id,prod_price,prod_image)
VALUES ('', '$prod_name','$cat_id', '$prod_price','$prod_image')";

if ($conn->query($sql) === TRUE) {
  echo "New product added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}
    }
?> 
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-4">

       <h2>upload product</h2>
      <form action="addproduct.php" method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="prod_name" class="form-label">product name:</label>
    <input type="text" class="form-control" id="prod_name" placeholder="Enter product name" name="prod_name">
  </div>
  <div class="mb-3 mt-3">
  <label for="cat_id" class="form-label">choose category:</label>
  <select name="cat_id" id="">
    <?php
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {?>
        <option value="<?php echo $row["cat_id"]?>">
        <?php echo $row ["cat_name"] ?></option>

        <?php }
    } ?>
  </select>
  </div>
  <div class="mb-3">
    <label for="prod_price">product price:</label>
    <input type="number" class="form-control" id="prod_price" placeholder="Enter product price" name="prod_price">
  </div>
  <div class=" mb-3 mt-3">
    <label for="prod_image">product image:</label>
      <input type="file" class="form-control" id="prod_image" name= "prod_image">
    </label>
  </div>
  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
</form>   
  </div>
  </div>
  </div> 
   <?php
   $conn->close();
   include("footer.php") ?>
