<?php 
$server_name = "localhost";
$username = "Users";
$password = "UserPasswordForDataBase90803111";


$connection = new mysqli($server_name,$username,$password);

$UserDB = mysqli_select_db($connection, "userinfo");

///echo $connection;

if($connection -> connect_error)
{
	die("Connection failed: " . $connection->connect_error);
}
if(!$UserDB)
{
	die("Connection to database failed: " . mysqli_error($connection));
}
echo "<!-- connection complete -->";
//true = userinfo | false = products
function SetDatabase(bool $L_type)
{
	$server_name = "localhost";
	$username = "Users";
	$password = "UserPasswordForDataBase90803111";


	$connection = new mysqli($server_name,$username,$password);
	if($connection -> connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
	}
	
	
	if ($L_type)
	{
		$select_db = mysqli_select_db($connection,"userinfo");
		if(!$select_db)
		{
			die("Connection failed: " . mysqli_error($connection));
		}
	}
	else if(!$L_type)
	{
		$select_db = mysqli_select_db($connection,"products");
		if(!$select_db)
		{
			die("Connection failed: " . mysql_error($connection));
		}
	}
	else echo"connection failed</br>";
}	


 ?>