<?php 
	require("../HEI_includes/SQLConnect.php");
	session_start();
	
	SetDatabase(true);
	if(isset($_SESSION['username']))
	{
		header('location: MemberPage.php');
	}
	if(isset($_POST) & !empty($_POST))	
	{
		
		$username = mysqli_real_escape_string($connection, $_POST["username"]);
		$password = md5($_POST["password"]);
		
		$query = "SELECT * FROM users WHERE username='" . $username. "' AND pwd='".$password."'";

		$results = mysqli_query($connection, $query) or die(mysqli_error($connection));
		
		$count = mysqli_num_rows($results);
		echo "<!-- got database-->\n";
		

		
		if($count == 1)
		{
			$userdata = mysqli_fetch_array($results);
			for ($i =0; $i < 7 ; $i++)
			{
				echo ("| " . $userdata[$i]. " |");
			}
			echo ($userdata[2] . $userdata[6]);
			$_SESSION["permissions"] = $userdata['permissions'];
			echo "sending to members page";
			$_SESSION["username"] = $username;
			header('location: MemberPage.php');
		}
		else
		{
			header("location: index.php?user=none");
			
		}
	}
	
?>