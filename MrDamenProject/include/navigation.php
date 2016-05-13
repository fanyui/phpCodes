<marquee> Happy shopping</marquee>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Best shopping site</a>
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
        <li><a href="#">Top sales</a></li>
        <li><a href="index.php?category=1">products</a></li>
       <!-- form for searching of product on the site -->
	        <form class="navbar-form navbar-left" role="search">
	  			<div class="form-group">
	   				 <input type="text" class="form-control" placeholder="Product Search">
	  			</div>
	  			<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">How to use shop on this site</a></li>
            <li><a href="#">Send feedback</a></li>
            <li><a href="#">Contact an Agent</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Buy shares</a></li>
        <li><a href="signin.php"><span ><img src="images/hari.JPG" class="img-circle" alt="Cinque Terre" width="30" height="30"></span> Login</a></li>
        <li><a href="bag.php" > View Bag Content <?php $item_count=count($_SESSION['bag_item']);?>
          <span class="badge" id="comparison-count"><?php echo $item_count; ?></span>  </a></li>

      </ul>
    </div>
  </div>
</nav>
