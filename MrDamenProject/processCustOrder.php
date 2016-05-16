 <?php 
session_start();
require_once('include/connection.php');
include("include/included_functions.php");
?>

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

                    //query to create customer information
                $q1 = "INSERT INTO  customer(customerFirstName,customerLastName,genderId) VALUES ('$fn','$ln','$gender')";
                // Run the query.
                $r = @mysqli_query ($dbc, $q1);

                //query to get customer id so that it wil be used to add address and order
                $qs = "select customerId from customer where customerFirstName=$fn desc limit 1";
                // Run the query.
                $rs = @mysqli_query ($dbc, $qs);
                $num = @mysqli_num_rows($rs);
                 if ($num == 1) { // Match was made.
                    // Get the customer id:
                    $custId = mysqli_fetch_array($rs,MYSQLI_NUM);
                }

               //query to create customer address
                $q2 = "INSERT INTO  custaddress(phoneNumber,email,region,town,customerId)  VALUES ('$pn','$email','$town','$custId')";
                // Run the query.
                $r2 = @mysqli_query ($dbc, $q2);

                //query to create and order
                $salesPersonId=0;//this means sales has not been treated by any salesperson  
                $q3 = "INSERT INTO orders(orderDate,customerId,sPersonId) values(now(),$custId,$salesPersonId)";
                // Run the query
                $r3 = @mysqli_query ($dbc, $q3);
                if ($r && $r2 && $r3 && $rs) { 
                    echo "done";
                }

                //select the order id so that we will use it to fill the order details table 
                $qorder = "select orderId from orders desc limit 1";
                // Run the query.
                $rorder = @mysqli_query ($dbc, $qorder);
                $num = @mysqli_num_rows($rorder);
                 if ($num == 1) { // Match was made.
                    // Get the order id:
                    $ortherId = mysqli_fetch_array($rorder,MYSQLI_NUM);
                }



                foreach ($_SESSION['bag_item'] as $key => $value) {
                    $querry = "insert into orderdetails (ortherId,productId,quantity) values ($ortherId,$key,1)";
                    $runquery = @mysqli_query($dbc,$querry);
                    if(!$runquery)
                        echo 'Problem executing query';
                }
            }
            else{//one or more fields do not have values
                foreach ($errors as $key) {
                   echo '<b>$key</b> </br />';
                }
            }
        }
    ?>

