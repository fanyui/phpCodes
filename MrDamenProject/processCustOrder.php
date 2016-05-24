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
                $fn= mysqli_real_escape_string($dbc,$_POST["firstName"]);
            }

           if (empty($_POST["lastName"])) {
                $errors[]="please enter last name "; 
            } 
            else{
                $ln=mysqli_real_escape_string($dbc,$_POST["lastName"]);
            }
            if (empty($_POST["gender"])) {
                $errors[]="please enter gender "; 
            } 
            else{
                $gender=mysqli_real_escape_string($dbc,$_POST["gender"]);
            }


            if (empty($_POST["phoneNumber"])) {
                $errors[]="please enter phoneNumber "; 
            } 
            else{
                $pn=mysqli_real_escape_string($dbc,$_POST["phoneNumber"]);
            }

             if (empty($_POST["email"])) {
                $errors[]="please enter email "; 
            } 
            else{
                $email=mysqli_real_escape_string($dbc,$_POST["email"]);
            }

             if (empty($_POST["region"])) {
                $errors[]="please enter region "; 
            } 
            else{
                $region= mysqli_real_escape_string($dbc,$_POST["region"]);
            }
            //
             if (empty($_POST["town"])) {
                $errors[]="please enter town "; 
            } 
            else{
                $town= mysqli_real_escape_string($dbc,$_POST["town"]);
            }
             if (empty($_POST["commentArea"])) {
                $errors[]="please enter comment "; 
            } 
            else{
                $comment=mysqli_real_escape_string($dbc,$_POST["commentArea"]);
            }
            if (empty($_POST["checkpay"])) {
                $errors[]="please enter checkpay "; 
            } 
            else{
                $checkbox=mysqli_real_escape_string($dbc,$_POST["checkpay"]);
            }
//declaring global to be used in queries
             $ortherId = "";
             $custId = "";
                //all fields have been correctly filled
            if(empty($errors)){
              
                $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR DIE ('COULD NOT CONNECT TO MYSQL:'.mysqliconnect_error());

                    //query to create customer information
                $q1 = "insert into  customer(customerFirstName,customerSecondName,genderId) values('$fn','$ln','$gender')";
                // Run the query.
                $r = @mysqli_query($dbc,$q1);
                $num = @mysqli_num_rows($r);
                if(!$r)
                    echo "could not do it" .mysqli_error($dbc);
                //query to get customer id so that it wil be used to add address and order
                $qs = "select customerId from customer  order by customerId DESC limit 1";
                // Run the query.
                $rs = @mysqli_query ($dbc,$qs);
                if(!$qs)
                    echo "could not select get customer id " .mysqli_error($dbc);
                $num = @mysqli_num_rows($rs);

                if ($num == 1) { // Match was made.
                    // Get the customer id:
                   $custId = mysqli_fetch_array($rs,MYSQLI_NUM);
                }
             
               //query to create customer address
                $q2 = "insert into custaddress(phoneNumber,email,region,town,customerId)  values ('$pn','$email','$region','$town','$custId[0]')";
                // Run the query.
                $r2 = @mysqli_query ($dbc,$q2);
                    if(!$r2)
                        echo "could not insert customer address " .mysqli_error($dbc);
                //query to create and order
                $salesPersonId=1;//this means sales has not been treated by any salesperson  
                $q3 = "insert into orders(orderDate,customerId,sPersonId) values(now(),'$custId[0]',$salesPersonId)";
                // Run the query
                $r3 = @mysqli_query ($dbc,$q3);
                if(!$r3)
                    echo "could not create order " .mysqli_error($dbc);
                //select the order id so that we will use it to fill the order details table 
                $qorder = "select orderId from orders order by orderId DESC limit 1";
                // Run the query.
                $rorder = @mysqli_query ($dbc,$qorder);
                $num = @mysqli_num_rows($rorder);
                if(!$rorder)
                    echo "could not select order id " .mysqli_error($dbc);
                 if ($num == 1) { // Match was made.
                    // Get the order id:
                  $ortherId = mysqli_fetch_array($rorder,MYSQLI_NUM);
                  //echo "fetch array succeeded";

                }

                    //order details 

                foreach ($_SESSION['bag_item'] as $key => $value) {
                    $qty=1;
                	$getpdt = "select quantitySold,quantityBought from product where productId = $key";
                    $rungetpdt = @mysqli_query($dbc,$getpdt);
                    if(!$rungetpdt)
                        echo "could not get quantity sold".mysqli_error($dbc);
                    $qnt= mysqli_fetch_array($rungetpdt);
                        //PRECAUTION ON PRODUCT AVAILABILITY
                        if(($qnt["quantityBought"] - $qnt["quantitySold"])<=10 ){
                            //send a mail to my box
                        }
                        //client demanded more than available stock
                        if(($qnt["quantityBought"] - $qnt["quantitySold"])<$qty){
                            //send a message to my box and to the user telling him of small stock
                            echo "stock available is not up to the quantity you demanded";
                        }
                        else{
                            
                            $setpdt = "update product set quantitySold = ('$qnt[0]'+1) where productId= $key";
                            $runsetpdt= mysqli_query($dbc,$setpdt);
                            if(!$runsetpdt)
                                echo "could not update quantity sold";

                            $query = "insert into orderdetails (orderId,productId,quantity) values ('$ortherId[0]','$key',$qty)";
                            $runquery = @mysqli_query($dbc,$query);
                            if(!$runquery)
                                echo 'Problem updating order details records';
                        }
                }
            }
            else{//one or more fields do not have values
                foreach ($errors as $key) {
                   echo '<b>'.$key.'</b> </br />';
                }
            }
        }
        else
        echo "form was not submitted throught the correct means<br>";
    ?>

