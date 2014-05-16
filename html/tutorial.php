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
			Introductory Tutorials
		</h2>
		<div>
			<h3>
				<a href="tutorial/one.php">
					Tutorial 1 - Getting Started
				</a>
			</h3>
			<h3>
				<a href="tutorial/two.php">
					Tutorial 2 - TouchDown, TouchUp and Press
				</a>
			</h3>
			<h3>
				<a href="tutorial/three.php">
					Tutorial 3 - Parent and Child Zones
				</a>
			</h3>
			<h3>
				<a href="tutorial/four.php">
					Tutorial 4 - Touch Functions
				</a>
			</h3>
		</div>
		<br/>
		<h2>
			Other Tutorials
		</h2>
		<div>
			<h3>
				<a href="tutorial/touchdraw.php">
					Customizing Touch Drawing Options
				</a>
			</h3>
			<h3>
				<a href="tutorial/swipekeyboard.php">
					Introducing the Swipe Keyboard Zone
				</a>
			</h3>
		</div>
		<br/>
		<h2>
			Advanced Tutorials
		</h2>
		<div>
			<h3>
				<a href="tutorial/touchsourcebounds.php">
					Customizing Touch Source Bounds
				</a>
			</h3>
			<h3>
				<a href="tutorial/java.php">
					Working with SMT in Java
				</a>
			</h3>
			<h3>
				<a href="tutorial/viewports.php">
					Working with Viewports
				</a>
			</h3>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>