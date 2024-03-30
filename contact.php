<style>
      .contact{
         background: linear-gradient(#E4BBFA,#CCBBFA);
         min-height: 1000px;
      }
   </style>

<?php include("header.php")?>
<section style="padding-top: 80px;" >
<section class="contact" style="height: 300vh;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="col-sm-6">CONTACT</h1>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quis cumque laudantium cupiditate, vitae quos. Odio repellat fuga iusto, ullam laudantium maiores modi voluptates rem ratione! Officia dolor esse soluta.</p> -->

      <?php 
      if(isset($_POST["contact_name"])){
        $contact_name=$_POST["contact_name"];
        $contact_email=$_POST["contact_email"];
        $contact_comment=$_POST["contact_comment"];
                
      $sql = "INSERT INTO contacts (id, contact_name, contact_email, contact_comment)
      VALUES ('', '$contact_name','$contact_email','$contact_comment')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    }
      ?>
                
                
                


                

   <form action="contact.php" method="POST">
   <div class="mb-3 mt-3">
    <label for="contact_name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="contact_name" placeholder="Enter your name" name="contact_name">
  </div>
  <div class="mb-3">
    <label for="contact_email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="contact_email" placeholder="Enter email" name="contact_email">
  </div>
  <div class="mb-3">
  <label for="comment">Comments:</label>
<textarea class="form-control" rows="5" id="contact_comment" name="contact_comment"></textarea>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
            <div class="col-sm-6 ">
            <iframe  class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4971208369116!2d76.6634524750261!3d10.773185859253553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba86de406a368b9%3A0x93e796d67286dafe!2sICS%20India%20Group%20of%20Institutions!5e0!3m2!1sen!2sin!4v1711781366767!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
            </div>

</section>



<?php include("footer.php")?>