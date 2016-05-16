<html>
<head>
<link href="stylesheet/signin.css" rel="stylesheet">
<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
<script src="javascript/jquery.js"></script>
<script src="jscript.js"></script>
</head>
<body>
<div class="container">
	<form class="form-signin" method="post" action="form.php">
		    <h2 class="form-signin-heading">Please sign in</h2>
		    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
		    <input type="password" name="password" class="form-control" placeholder="Password" required>
		    <input type="text" name="test" class="form-control" placeholder="you must fill this form" data-container="body" data-toggle="popover" data-placement="top" data-content="please fill out this form.">
		    <label class="checkbox">
		      <input type="checkbox" name="checkbox" value="remember-me"> Remember me
		    </label>
		    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
  </div>
</body>
