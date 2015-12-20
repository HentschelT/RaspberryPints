<?php
session_start();
if(!isset( $_SESSION['myusername'] )){
header("location:index.php");
}

require 'includes/conn.php';
if (isset ( $_POST ['reboot'] )) {
	$output = '';
	$return_var = 0;
	echo ("rebooting system: ");
	exec("/usr/bin/sudo /sbin/reboot 2>&1", $output, $return_var);
	echo (", return var: ");
	var_dump ($return_var);
	echo (", output: ");
	var_dump ($output);
	header("location:index.php");
	}
if (isset ( $_POST ['shutdown'] )) {
	$output = '';
	$return_var = 0;
	echo ("shutting down system");
	exec("/usr/bin/sudo /sbin/shutdown now 2>&1", $output, $return_var);
	echo (", return var: ");
	var_dump ($return_var);
	echo (", output: ");
	var_dump ($output);
	header("location:index.php");
	}
if (isset ( $_POST ['restartservice'] )) {
	$output = '';
	$return_var = 0;
	echo ("restarting flowmon service: ");
	exec("/usr/bin/sudo /usr/sbin/service flowmon restart 2>&1", $output, $return_var);
	echo (", return var: ");
	var_dump ($return_var);
	echo (", output: ");
	var_dump ($output);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RaspberryPints</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link href="styles/wysiwyg.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->
<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
</head>
<body id="homepage">
	<!-- Start Header  -->
<?php
include 'header.php';
?>
	<!-- End Header -->
		
	<!-- Top Breadcrumb Start -->
	<div id="breadcrumb">
		<ul>	
			<li><img src="img/icons/icon_breadcrumb.png" alt="Location" /></li>
			<li><strong>Location:</strong></li>
			<li class="current">Control Panel</li>
		</ul>
	</div>
	<!-- Top Breadcrumb End -->
	
	<!-- Right Side/Main Content Start -->
	<div id="rightside">
	<p><h1>Welcome To The RaspberryPints Management Portal</h1></p>
	<p> Feel free to explore around and see what all we provide through your admin. Here in the admin you will be able <br/>to do a list of useful things, which include
	Adding and the removal of beer along with checking the stats on the<br/> activity of your tap.</p>
		
				<br/>
				<br/>
			<form method="POST">
				<table width="300" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th colspan="99"><b>Reboot / Shutdown:</b></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="submit" name="reboot" class="btn"
								value="Reboot System" /></td>
							<td><input type="submit" name="shutdown" class="btn"
								value="Shut System Down" /></td>
							<td><input type="submit" name="restartservice" class="btn"
								value="Restart Flowmeter Service" /></td>
								</tr>
					</tbody>
				</table>
			</form>
				
	<!-- Start Footer -->   
<?php 
include 'footer.php';
?>

	<!-- End Footer -->
		</div>
<!-- Right Side/Main Content End -->
	
	
	<!-- Start Left Bar Menu -->   
<?php
include 'left_bar.php';
?>
	<!-- End Left Bar Menu -->  
	<!-- Start Js  -->
<?php
include 'scripts.php';
?>
	<!-- End Js -->
	<!--[if IE 6]>
	<script type='text/javascript' src='scripts/png_fix.js'></script>
	<script type='text/javascript'>
	DD_belatedPNG.fix('img, .notifycount, .selected');
	</script>
	<![endif]--> 
</body>
</html>
