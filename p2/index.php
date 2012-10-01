<!DOCTYPE html>

<html>

<head>

	<title>Lauren Middleton - DWA Project 2</title>
	<meta charset="UTF-8">
	<meta name="description" content="Harvard Extension School CSCI E-75 Dynamic Web Applications Fall 2012 Project 2 by Lauren Middleton" />
	<meta name="author" content="LKM" />
	<link rel="stylesheet" type="text/css" href="css/lkm-styles.css" />

	<?php

		$logged_in = false;

	?>

</head>

<body>

<!--This page will fill with the login guts if they are logged out, or their main feed if they are logged in.-->

<div id="header">
	<h1><a href="index.php">MicroBlog</a></h1>
</div>


<div id="main-container">

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