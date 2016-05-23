<!DOCTYPE html>
<html>
<head>
	<title>profits page</title>
<script src="javascript/jquery.js"></script>
<link href="stylesheet/style.css" rel="stylesheet">
<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheet/signin.css">
<script type="text/javascript" src="javascript/bag.js"></script>
<script type="text/javascript" src="javascript/bootstrap.min.js"></script>

</head>
<body>
 <div class="bs-example">
    <nav id="navbar-example2" class="navbar navbar-default navbar-static" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-scrollspy">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home page</a>
        </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
          <ul class="nav navbar-nav">
            <li><a href="order.php">@Treat An Order</a></li>
            <li><a href="javascript#mdo">@Change Product Selling Price</a></li>
            <li class="dropdown">
              <a href="javascript#" id="navbarDrop1" class="dropdown-toggle" data-toggle="dropdown">profit from sale of <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="navbarDrop1">
                <li><a href="profit.php?category=1" tabindex="-1">electronic</a></li>
                <li><a href="profit.php?category=2" tabindex="-1">jewery</a></li>
                <li><a href="profit.php?category=3" tabindex="-1">food stuff</a></li>
                <li class="divider"></li>
                <li><a href="profit.php?category=4" tabindex="-1">cloth</a></li>
              </ul>
            </li>
            <li><a href="signin.php"><span ><img src="images/hari.JPG" class="img-circle" alt="Cinque Terre" width="30" height="30"></span> sign out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <legend ><h2>RECRUIT SALEPERSON </h2></legend>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
          <marquee>thanks for coming</marquee>
	<fieldset>
	
            
      <form method="POST" action="profit.php" class="navbar-form navbar-left" >
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
      </div>
    </div>
  </div>
  <!-- end of costomer infomation -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
         <legend><h2> ADD PRODUCTS</h2></legend>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <fieldset>
		
            
            <form method="POST" action="profit.php">

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
                
                <input type="submit" name="wareHouseRegister" value="submit" />
                
            </form>
         
            </fieldset>  
      </div>
    </div>
  </div>
  <!--end of supplier infomation -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>



	<?php
        if(isset($_POST["wareHouseRegister"])){
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
        //php code for customer validation 
        else if (isset($_POST['register'])) {
   			

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
		             $Pn = mysqli_real_escape_string(trim($phoneNumber));
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
</body>
</html>