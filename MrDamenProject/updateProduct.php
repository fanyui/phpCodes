<?php
    include("include/head.php");
?>
<fieldset>
<legend><h2>UPDATING WAREHOUSE PRODUCTS FORM</h2></legend>
            
            <form method="POST" action="updateProduct.php">

                PRODUCT NAME:
                <input type="text" name="productName" placeholder="enter your product name" maxlength="45"  size="45px" /><br /><br />
                COST PRICE:
                <input type="text" name="costPrice" placeholder="cost price " maxlength="45" size="45px" /><br /><br />
                SELLING PRICE:
                <input type="email" name="sellingPrice" placeholder="your selllingPrice" maxlength="45" size="45px" /><br /><br />
                QUANTITY BOUGHT:
                <input type="text" name="quantityBought" placeholder="your quantity bought"  size="45px" ><br /><br />
                SUPPLIER:
                <select name="supplier" >
                        <option value="electronic">smartpro</option>
                        <option value="food">sql for life</option>
                        <option value="furniture">tarnished furnitures</option>
                    </select><br /><br />
                CATEGORY:
               <select name="category" >
                        <option value="electronic">Electronics</option>
                        <option value="food">Food Stuff</option>
                        <option value="furniture">furniture</option>
                        <option value="makeups">make ups</option>
                        <option value="fashion">fashion</option>
                    </select><br />
                
                <input type="submit"name="register" value="register" />
                
            </form>
         
            </fieldset>  
             </div>

    <?php
        if(isset($_POST["register"])){
            $errors=array();
            if(empty($_POST["productName"])){
               $errors[]="you forgot to enter product name";
            }
            else { 
                $pn= mysqli_real_escape_string($_POST["productName"]);
            }

           if (empty($_POST["costPrice"])) {
                $errors[]="please enter cost price"; 
            } 
            else{
                $costprice=mysqli_real_escape_string($_POST["costPrice"]);
            }
            if (empty($_POST["sellingPrice"])) {
                $errors[]="please enter selling  price"; 
            } 
            else{
                $sellingPrice= mysqli_real_escape_string($_POST["sellingPrice"]);
            }

            if (empty($_POST["quantityBought"])) {
                $errors[]="please enter quantity "; 
            } 
            else{
                $qtybought=mysqli_real_escape_string($_POST["quantityBought"]);
            }

             if (empty($_POST["supplier"])) {
                $errors[]="please select supplier "; 
            } 
            else{
                $suplier=mysqli_real_escape_string($_POST["supplier"]);
            }
             if (empty($_POST["category"])) {
                $errors[]="please select category "; 
            } 
            else{
                $category=mysqli_real_escape_string($_POST["category"]);
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

</body>
</html>
