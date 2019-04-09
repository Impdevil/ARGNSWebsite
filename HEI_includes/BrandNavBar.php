
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel= "stylesheet" href="HEI_css/NavBar.css">
	
	
</head>
<body class="backgroundbase">

<nav id="NavBar" class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#86d6ff; color:#ffffff;">
	<a class="navbar-brand" >
		<img src="../HEI_Images/HEIInternationalLogoLarge.png" width="30" height="30" class="d-inline-block align-top" alt="">
			HIE International
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link customItemNav" href="../index.php">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Products
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/HEI_products/index.php?show=augments">Augmentations</a>
				<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/HEI_products/index.php?show=IoT">Internet of Things IoT </a>
				<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/HEI_products/index.php?show=androids">Androids</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../About.php">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Intranet/">Intranet Login</a>
			</li>
			</ul>
 			<span class="navbar-text">
				Building a better you for a better world.
			</span>
	</div>
</nav>
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script>
		function SetActive()
		{
			var navItemArr = document.getElementsByClassName("nav-item");
				
			navItemArr[pagenum].classList.add("active");
		}
		SetActive();
	</script>
</body>
<head>



