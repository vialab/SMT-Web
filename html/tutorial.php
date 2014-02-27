<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Tutorial]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Tutorial";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>
			Tutorials
		</h2>
		<h3>
			<a href="tutorial/one.php">
				Tutorial 1 - Getting Started
			</a>
		<h3>
		<h3>
			<a href="tutorial/two.php">
				Coming Soon: Tutorial 2 - TouchDown, TouchUp and Press
			</a>
		<h3>
		<h3>
			<a href="tutorial/three.php">
				Coming Soon: Tutorial 3 - Parent and Child Zones
			</a>
		<h3>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>