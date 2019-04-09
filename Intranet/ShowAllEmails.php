<?php
session_start();
require("../HEI_includes/SQLConnect.php");
if(isset($_SESSION['permissions']) && $_SESSION["permissions"] == "System_Admin")
{
	$query = "SELECT * FROM email";
	$results = mysqli_query($connection, $query) or die(mysqli_error($connection));

?>
<html>
<body>
	<table style="text-align:left;" border="1">
		<tr><th>Too</th><th>from</th><th>subject</th><th>fill</th></tr>
		<?php
			while ($row = mysqli_fetch_array($results))
			{
				echo ("<tr><th>".$row['username_too'] . "</th><th>" . $row['username_from'] . "</th><th>" .$row['subject'] . "</th><th>". $row['fill'] ."</th></tr>" );
			}
		?>
	</table>
</body>
</html>

<?php
}
else if(!isset($_SESSION) || $_SESSION["permissions"] != "System_Admin") {echo("header");header("location: / ");}

?>