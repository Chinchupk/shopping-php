<?php
    include("header-admin.php");
    if(isset($_POST["submit"])){
        $uploadOk=0;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["cat_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["cat_image"]["tmp_name"]);
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
if ($_FILES["cat_image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "webp" ) {
  echo "Sorry, only JPG, JPEG, PNG,  GIF & WEBP
  
   files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["cat_image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
    $uploaded = 1;
  } else {
    echo "Sorry, there was an error uploading your file.";
    $uploaded = 0;
  }
}
if($uploaded==1){

$cat_name = $_POST["cat_name"];
$cat_desc = $_POST["cat_desc"];
$cat_image =$target_file;

$sql = "INSERT INTO category(cat_id, cat_name,cat_image,cat_desc)
VALUES ('', '$cat_name', '$cat_image','$cat_desc')";

if ($conn->query($sql) === TRUE) {
  echo "New product added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
    }

?> 

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-4">

       <h2>add category</h2>
      <form action="addcategory.php" method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="cat_name" class="form-label">catagory name:</label>
    <input type="text" class="form-control" id="cat_name" placeholder="Enter product name" name="cat_name">
  </div>
  <div class="mb-3">
    <label for="cat_image">catagory image:</label>
    <input type="file" class="form-control" id="cat_image" name="cat_image">
  </div>
  <div class=" mb-3 mt-3">
    <label for="cat_desc">descreption:</label>
      <input type="text" class="form-control" id="cat_desc" placeholder="Enter descreption" name= "cat_desc">
    </label>
  </div>
  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
</form>
</div>
</div>
</div>   
    