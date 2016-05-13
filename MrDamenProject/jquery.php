<!DOCTYPE html>
<?php
require_once('include/connection.php');
include("/include/included_functions.php");
	$categoryValue="";
	$category_name=NULL;
	if(isset($_GET["category"])){
		$categoryValue=$_GET['category'];
		$category_name=get_category_by_id($categoryValue);
		//use categoryValue to select the product in that category so that it will be used to display it in the content page
		//similar to the line above by creating a funtion that does the work

	}
?>
<html>
<head>
<script src="javascript/jquery.js"></script>
<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheet/signin.css">
<script type="text/javascript" src="javascript/bag.js"></script>
</head>
<body><!-- navigation menu bar -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Best shopping site</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
       <!-- form for searching of product on the site -->
	        <form class="navbar-form navbar-left" role="search">
	  			<div class="form-group">
	   				 <input type="text" class="form-control" placeholder="Product Search">
	  			</div>
	  			<button type="submit" class="btn btn-default">Submit</button>
			</form>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Buy shares</a></li>
        <li><a href="#"><span ><img src="hari.JPG" class="img-circle" alt="Cinque Terre" width="30" height="30"></span> Login</a></li>
               <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"><img src="hari.JPG" class="img-circle" alt="Cinque Terre" width="30" height="30"></span> Login</a></li> -->

        <button id="btn1" class="btn btn-lg btn-success">Bag Content</button>
      </ul>
    </div>
  </div>
</nav>
		<!-- end of navigation bar -->
		<br/>
		<div id="bagform" class="container" style="max-height: 400px;max-width: 400px;">
			<form method="POST" action="" class="form-signin">
					<div id="panel1">
						<button id="btn2" type="button" class="btn btn-sm btn-success">place order</button>
						<button id="hidepanel1" type="button" class="btn btn-sm btn-warning">Back</button>
					</div>
					<div id="panel2">
						<h2>Please fill the form below</h2>
						First Name:
							<input type="text" placeholder="your name"  class="form-control" required></input><br/>
						Last Name:
							<input type="text" placeholder="your Last Name" class="form-control" required></input><br/>
						Address:
							<input type="text" placeholder="your address" class="form-control"></input><br/>
						Phone Numbr
							<input type="text" placeholder="phone numb" class="form-control"></input> <br />
						Email: 
							<input type="email" placeholder="email" class="form-control"></input><br />

							<button id="btn3" type="button" class="btn btn-sm btn-primary">Continue</button>
							<button id="cancelpanel2" type="button" class="btn btn-sm btn-warning">Cancel</button>
					</div><br />
					<div id="panel3">
					<label> other worries</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
					check this box to pay by mobile money:<br />
					<input type="checkbox" checked="checked" class="form-control"></input><br/>
					Amount:
					<input type="text" placeholder="amount" class="form-control"></input>
						<button id="btn4" type="button" class="btn btn-sm btn-success">pay</button>
						<button id="cancelpanel3" type="button" class="btn btn-sm btn-warning">Cancel</button>
					</div>
					<div id="panel4">
					click the button down to accept payment
					<button type="button" class="btn btn-sm btn-default" id="btn5">fifth</button>
					<button id="cancelpanel4" type="button" class="btn btn-sm btn-warning">Cancel</button>
					</div>
					<div id="panel5">
						<input type="text" placeholder="use mobile money" class="form-control"></input>
						<input type="submit" value="send"></input>
						<button id="cancelpanel5" type="button" class="btn btn-sm btn-warning">Cancel</button>
					</div>	       
			</form>
		</div>
<div id="mainContent">
<!--left side for the display of the links -->
	
		<div class="col-sm-3 col-md-2 sidebar" >
	          <ul class="nav nav-sidebar">

	          <?php					
		                $q1 ="select * from category";
		                $r = @mysqli_query ($dbc, $q1); // Run the query.                
		                if (!$r) { 
		                 	die("data base query failed"). mysqli_error();
		                 
		                }
		                while($category=mysqli_fetch_array($r)){	                	
		                	//if a category is selected apply selected class to it which will make it bold
								echo "<li";
								if($categoryValue==$category["categoryId"]){
									echo " class=\"selected\" ";
								}
								echo "> <a href =\"index.php?category=".urlencode($category["categoryId"]) ."\"> {$category["categoryName"]} </a> </li>";
						}
				?> 
	          </ul>
        </div>
        <!--right side for the display of the result -->
		<div class="col-sm-6" id="content">
				
		     <h1 class="page-header">
		     		<?php 
						if(!is_null($category_name))//prevent printing gabage the first time the page is loaded
							echo $category_name['categoryName'];
						?>
				</h1>
		  		 <div class="row placeholder">
		  		<?php  
					echo $categoryValue; 
					product_by_category($categoryValue);//display the product chosen by the client based on the category
				?>
		      
	    </div>


</div>
</body>
<?php mysqli_close($dbc); ?>
<!-- Mirrored from www.w3schools.com/jquery/tryit.asp?filename=tryjquery_slide_down by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jan 2015 07:26:15 GMT -->
</html>
