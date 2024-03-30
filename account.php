<?php
include("header.php");
if(!isset($_SESSION["loginuser"])){
    header("Location: login.php");
}?>
<section style="padding-top: 100px;;">
<h1>MY ACCOUNT</h1>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore ex saepe amet pariatur dolore sed quisquam autem doloribus atque, explicabo unde soluta quam debitis culpa doloremque obcaecati voluptate, quos eligendi.</p>
</section>
<?php
include("footer.php")
?>
