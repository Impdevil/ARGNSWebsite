<html>
	<head>
		<script> var pagenum = 1; </script>
		<?php 
			include "../HEI_includes/BrandNavBar.php";
		?>
		<link rel="stylesheet" href="../HEI_css/StyleSheet.css">
		<?php
			echo "<meta name=\"products\"content=\"" .(string)$_GET["show"]." \">";
			if ($_GET["show"] == "augments")
			{
				include "augments.php";
			}
			else if($_GET["show"] == "IoT")
			{
				include"IoT.php";
			}
			else if($_GET["show"] == "androids")
			{
				include "android.php";
			}
			else if($_GET("show") == "software")
			{
				include"software.php";
			}
			else{
				echo "404 error";
			}

		?>
	

	
<?php include "../HEI_includes/BootStrapJSFooter.php";?>
