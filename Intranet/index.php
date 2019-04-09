<html>
<header>
<title>HEI Login</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel= "stylesheet" href="../HEI_css/StyleSheet.css">
	<link rel="none" href="password.txt">
	<?php require("LoginScript.php");?>

</header>
<body class="">
<br>
<br>
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6">
	
	<div class="card text-center">
	<div class="card-header">
		Login
	</div>
	<div class="card-body">
		<h5 class="card-title">Login to HEI intranet</h5>
		<h6 style="text-size:9px; color:#1f1f1f"></h6>
		<form method="POST" >
			<div class="container form-group row">
				<label for="username" class="col-sm-6">Username:</label><br><div class="col-sm-5"></div><div class="col-sm-2"></div><input class="form-control col-sm-9" type="text" name="username" id="username">
				<label for="password" class="col-sm-6">Password:</label><br><div class="col-sm-5"></div><div class="col-sm-2"></div><input class="form-control col-sm-9" type="password" name="password" id="password">
				<br>
				<br>				
				<br>
				<button type="submit" name="login" value="Login" style="position:absolute; left:35%;top:73%; right:35%;"class="btn-primary btn text-center">Login</button>
			</div>
		</form>
	</div>
	<div class="card-footer text-muted">
    <a href="../index.php">Go Back</a>
  </div>
	</div>
	<div class="col-sm-3">
	</div>
	</div>
	
	<script>
	<?php 
	if(isset($_GET) && $_GET["user"] == "none") 
			{
				?> alert("Password or username is wrong"); <?php
			}
			else 
			{
				?> alert("Registration has been closed due to attempted hacking. Please see a member of staff at one of our offices.");<?php
			} 
	?>
	</script>

</body>
</html>