
<html>
<body>

<?php 
session_start();
if(isset($_SESSION["permissions"]) && $_SESSION["permissions"] == "System_Admin")
{	
	echo $_SESSION["permissions"] ." ". $_SESSION["username"] . "<br><br><br><br>";
	require("../HEI_includes/SQLConnect.php");
	SetDatabase(true);
	
	$query = "SELECT * FROM users";
	$user_results = mysqli_query($connection, $query) or die(mysqli_error($connection));
	echo "<table><tr><th>ID</th><th>name </th><th>username</th><th>UserEmail</th><th>permission</th></tr>";
	while ($row = mysqli_fetch_array($user_results))
	{
		echo ("<tr><th>".$row['ID'] . "</th><th>" . $row['firstname'] . " " .$row['lastname'] . "</th><th>". $row['Username'] ."</th><th>" .$row['UserSet']."</th><th>".$row['permissions']."</th></tr>" );
	}
	echo "</table><br><br><br>";
	
	if(sodium_crypto_aead_aes256gcm_is_available())
	{
		 echo"Sodium is running";
		$Cryptstring = "Sodium is running";
		$key = random_bytes(32);
		$nonce = random_bytes(24);
		$cypherText = sodium_crypto_secretbox($Cryptstring,$nonce,$key);
		print "<br>". $cypherText ." ". $key . " " .$nonce . "<br> ";
		$DecryptString = sodium_crypto_secretbox_open($Cryptstring, $nonce,$key);
		
		if(!$DecryptString)
		{echo "failed";}
		else
		{Print $DecryptString;}
	}
	else echo"no salt>";
	

?>

	<form method="POST">
		to<input type="text" name="to" value="<?php if(isset($_POST['to']))echo($_POST["to"]);?>"></input><br>
		from<input type="text" name="from" value="<?php if(isset($_POST['from']))echo($_POST["from"]);?>"></input><br>
		subject<input type="text" name="subject" value="<?php if(isset($_POST['subject']))echo($_POST["subject"]);?>"></input><br>
		<br>
		<textarea name="fill" style="width:75%;height:400px;"><?php if(isset($_POST['fill']))echo($_POST["fill"]);?></textarea>
		<br>
		<button type="submit" value="submit">submit</button>
	</form>
	<br>
	<?php 		echo $query;?>
	<a href="ShowAllEmails.php"> show all emails</a>
</body>
</html>
<?php
	if(isset($_POST) && !empty($_POST['fill']))
	{
		$query = "INSERT INTO `email` (`idx`, `username_from`, `fill`, `username_too`, `subject`) VALUES (NULL, '".$_POST['from']."', '".
		
		
		
				$_POST['fill']
		
		
		
		."', '".$_POST['to']."', '".$_POST['subject']."')";

		
		$results = mysqli_query($connection, $query) or die(mysqli_error($connection));
		
		
	}
	}
 
 else
 {
	 ?><script>alert("permission denied");</script><?php
	 header("location: /");
 }
?>