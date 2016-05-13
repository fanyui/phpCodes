 <?php
        if(isset($_POST["register"])){
            $errors=array();
            if(empty($_POST["firstName"])){
               $errors[]="you forgot to enter first name";
            }
            else { 
                $fn= mysqli_real_escape_string($_POST["firstName"]);
            }

           if (empty($_POST["lastName"])) {
                $errors[]="please enter last name "; 
            } 
            else{
                $ln=mysqli_real_escape_string($_POST["lastName"]);
            }
            if (empty($_POST["gender"])) {
                $errors[]="please enter gender "; 
            } 
            else{
                $gender=mysqli_real_escape_string($_POST["gender"]);
            }


            if (empty($_POST["phoneNumber"])) {
                $errors[]="please enter phoneNumber "; 
            } 
            else{
                $pn=mysqli_real_escape_string($_POST["phoneNumber"]);
            }

             if (empty($_POST["email"])) {
                $errors[]="please enter email "; 
            } 
            else{
                $email=mysqli_real_escape_string($_POST["email"]);
            }

             if (empty($_POST["region"])) {
                $errors[]="please enter region "; 
            } 
            else{
                $region= mysqli_real_escape_string($_POST["region"]);
            }
            //
             if (empty($_POST["town"])) {
                $errors[]="please enter town "; 
            } 
            else{
                $town= mysqli_real_escape_string($_POST["town"]);
            }
             if (empty($_POST["commentArea"])) {
                $errors[]="please enter comment "; 
            } 
            else{
                $comment=mysqli_real_escape_string($_POST["commentArea"]);
            }
            if (empty($_POST["checkpay"])) {
                $errors[]="please enter checkpay "; 
            } 
            else{
                $checkbox=mysqli_real_escape_string($_POST["checkpay"]);
            }


                //all fields have been correctly filled
            if(empty($errors)){
                //connect to database and issue querry
                require_once('includes/connection.php');
                $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR DIE ('COULD NOT CONNECT TO MYSQL:'.mysqliconnect_error());

                $q1 = "INSERT INTO  procduct(productName,costPrice,sellingPrice,quantityBought) VALUES ('$pn','$costPrice','$sellingPrice','$qtybought' )";
                $r = @mysqli_query ($dbc, $q1); // Run the query.
                
                if ($r) { 
                    echo "done";
                }
            }
            else{//one or more fields do not have values
                foreach ($errors as $key) {
                   echo '<b>$key</b> </br />';
                }
            }
        }
    ?>
