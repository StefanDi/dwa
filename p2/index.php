<!DOCTYPE html>

<html>

<head>

	<title>Lauren Middleton - DWA Project 2</title>
	<meta charset="UTF-8">
	<meta name="description" content="Harvard Extension School CSCI E-75 Dynamic Web Applications Fall 2012 Project 2 by Lauren Middleton" />
	<meta name="author" content="LKM" />
	<link rel="stylesheet" type="text/css" href="css/lkm-styles.css" />
	<script type="text/javascript" src="js/jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
	<script type="text/javascript" src="js/p2-functions.js"></script>

	<?php

		$logged_in = false;

	?>

</head>

<body>


<div id="header">
	<h1><a href="index.php">MicroBlog</a></h1>
</div>


<div id="main-container">

<!--This page will fill with the login guts if they are logged out, or their main feed if they are logged in.-->

	<? if($logged_in == true) {
			include 'my-feed.php';
		}
		else {
			include 'log-in.php';
		}
	?>

</div>

<div id="footer">
	<span id="version-number">version 1.0</span>
	<span id="copyright">&copy2012 LKM</span>
</footer>

</body>

</html>