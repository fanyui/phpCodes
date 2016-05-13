  
<?php
    require_once("include/included_functions.php");
    include("include/head.php");
?>
  <marquee>thanks for coming</marquee>
<fieldset>
<legend ><h2>CUSTOMER INFORMATION</h2></legend>
            
            <form method="POST" action="customer.php" class="navbar-form navbar-left" >

              FIRST NAME:
                <input type="text" name="firstName" placeholder="your first Name" maxlength="45"  size="45px" class="form-control" /><br /><br />
                SECOND NAME:
                <input type="text" name="secondName" placeholder="your second name" maxlength="45"  size="45px" class="form-control" /><br /><br />
               PHONE NUMBER:
                 <input type="text" name="phoneNumber" placeholder="contact address" maxlength="45"  size="45px" class="form-control" /><br /><br />
               
               
                  <br /><br />
                
                <button  type="submit" name="register" value="register" class="btn btn-lg btn-success" ></button>
                
            </form>
         
            </fieldset>
           
             </div>
            
</body>

 <?php
 if (isset($_POST['register'])) {
   # code...

      $errors = array(); // Initialize error array.
       // Validate the nick name:
      if (empty($_POST['firstName'])) { 
            $errors[] = 'You forgot to enter your first name.';
       } 
       else {
            $fn = mysqli_real_escape_string(trim($firstName));
       }

     
       if (empty($_POST['secondName'])) {
           $errors[] = 'You forgot to enter your second name.';
       }
       else {
           $sn = mysqli_real_escape_string(trim($secondName));
       }

        if (empty($_POST['phoneNumber'])) {
           $errors[] = 'You forgot to enter your address .';
       }
       else {
             $sn = mysqli_real_escape_string(trim($phoneNumber));
       }


      if (empty($errors)) { 

//redirect the user to continue his work and submit the items chosen
          $url= absolute_url('redirectfromcustomer.html');
          header("Location: $url");
          exit();
      }
      else{
        foreach ($errors as $key) {
          # code...
        echo " - $key<br />\n";

        }  echo '<p>Please try again.</p>';

      }
  }

 ?>
</html>
