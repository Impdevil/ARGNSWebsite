<html>
<?php  session_start(); if(isset($_SESSION["username"]))
	{	
		include"../HEI_includes/SQLConnect.php";
		if(isset($_GET["view"]))
		{
			if($_GET["view"] == "outbox")
			{
				$query = "SELECT * FROM `email` WHERE `username_from` LIKE '".$_SESSION['username']."' AND `sent` IS NOT NULL ORDER BY `sent` DESC";	
			}
			else if($_GET["view"] == "email")
			{
				
				$query = "SELECT * FROM `email` WHERE `idx` = ". $_GET['nmxca'];
				
			}
			else if($_GET['view'] == "drafts")
			{
				$query = "SELECT * FROM `email` WHERE `username_from` LIKE '".$_SESSION['username']."' AND `sent` IS NULL";	
			}
			else if($_GET['view'] == "!exist")
			{
				print "<script>alert('email not found.');</script>";
				header('location:emailaccess.php');
			}
		}
		else
		{
			$query = "SELECT * FROM `email` WHERE `username_too` LIKE '".$_SESSION['username']."' AND `sent` IS NOT NULL ORDER BY `sent` DESC";	
		}
		//echo $query;
		
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	}else {header("location:index.php");}?>
<head>
	<title><?php
	if(isset($_SESSION["username"]))
	{
		echo ($_SESSION["username"]. ":Emails");
	}
	else if(isset($_GET['view']) && $_GET['view'] == "email")	
	{
		$row = mysqli_fetch_array($result);
		echo($row['subject']);
	}
	?></title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--sites css-->
	<link rel= "stylesheet" href="../HEI_css/StyleSheet.css">

</head>
<body class="backgroundbase">
<br>
	<div id="fullPage" class="container-fluid" style="">
		<div class="row">
			<div name="NSleftMenu" class="col-sm-2" style="background:#b7cff4;">
				<div name="leftMenuHeader text-center">
					<div class="row">
						<div class="col-4"></div>
						<div class="col-4"><a class="btn btn-light" href="MemberPage.php">Profile</a></div>
						<div class="col-4"></div>
					</div>
					<ul class="list-group text-center">
						<li class="list-group-item disabled" style="font-size:22px; font-weight:bold;">+</li>
						<li class="list-group-item"><a href="emailaccess.php">Inbox</a></li>
						<li class="list-group-item"><a href="emailaccess.php?view=outbox">Sent</a></li>
						<li class="list-group-item"><a href="emailaccess.php?view=drafts">Drafts</a></li>
						
					</ul>
				</div>
			</div>
			
			<div name="NSemailList" class="col-sm-8" style="background:#448cff;">
				<div class="container">	
					<?php //show emails on list
					if(!isset($_GET['view']) ||  $_GET['view']!="email")
					{
					echo "<table style=\"color:white; width:100%;\" class=\"emailList\">";
						while ($row = mysqli_fetch_array($result))
						{	
							$emailfill = "-".strip_tags((strlen($row['fill']) > 40 ) ? substr($row['fill'],0,39) . "..." : $row['fill']);
							if ($row['sent'] != null) 
							{
							$emailfill .= " (sent: ". substr($row['sent'],0,10) .")";
							}else
							{	$emailfill .="(draft)";}
							$potato = "?view=email&nmxca=".$row['idx'];
							echo "<tr class='emailList'>";
							if(isset($_GET['view']) && $_GET['view'] == "outbox")
							{
								echo ("<th ><a href='".$potato."' class='emailLink'>".$row['username_too'].
								"</a></th><th class='align-text-right'><a href='".$potato."' class='emailLink'>"
								.$row['subject']."</a></th><td class='align-text-right'><a href='".$potato."' class='emailLink fill'>" .$emailfill."</a></td>");
							}
							else if(isset($_GET['view']) && $_GET['view'] == "drafts")
							{
								echo ("<th ><a href='".$potato."' class='emailLink'>".$row['username_too'].
								"</a></th><th class='align-text-right'><a href='".$potato."' class='emailLink'>"
								.$row['subject']."</a></th><td class='align-text-right'><a href='".$potato."' class='emailLink fill'>" .$emailfill."</a></td>");
							}
							else
							{
								echo "<th class='emailList'><a href='".$potato."' class='emailLink'>".$row['username_from'].
								"</a></th><th class='emailList'><a href='".$potato."' class='emailLink'>"
								.$row['subject']."</a></th><td class='fill'><a href='".$potato."' class='emailLink'>" .$emailfill."</a></td>";
							}
							echo"</tr>";
						}
					}
					else if(isset($_GET['view']) && $_GET['view']=="email")
					{
						
						$row = mysqli_fetch_array($result);
						if($_SESSION["username"] != $row['username_from'] && $_SESSION["username"] != $row['username_too'])
						{header('location:emailaccess.php?view=!exist');}
						echo "<br><table class='emaildisplay'>";
Print("<tr><th colspan=\"2\">From: ". $row["username_from"]."</th></tr>
<tr><th colspan=\"2\">Too: " . $row["username_too"]."</th></tr>

<tr><td style=\"border-bottom:2px white solid;\">".$row['subject']."</td><td style=\"text-align:right; font-size:12px;\">".$row['sent']."</td></tr>
<tr><td colspan=\"2\" class=\"\">".$row['fill']."</td></tr>




");
						
					}
					?>
					</table>
				</div>
			</div>
			<div name="NSrightbar" class="col-sm-2">
			</div>
		</div>
	</div>
</body>
<?php include "../HEI_includes/BootStrapJSFooter.php";?>
<script>
//jQuery(document).ready(function($) {
  //  $(".emailList").click(function() {
   //     window.location = $(this).data("url");
   // });
//});
</script>
</html>