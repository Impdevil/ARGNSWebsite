<?php 
session_start();
echo ("username: ".$_SESSION["username"]);
echo ("<br>permission: " . $_SESSION["permissions"]); 

if($_SESSION["permissions"] == "System_Admin")
{
	$fill = "<a href=\"EmailCreationScript.php\">duh</a>";
}
else 
	$fill = "hello and welcome";

?> 

<html>
<body>

	<?php echo $fill;?>
	<br><a href="emailAccess.php">Emails</a>
	<br>
		<br><a href="logout.php">logout</a>
</body>
</html>