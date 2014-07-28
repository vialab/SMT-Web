<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Tutorial]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
	<?php 
		include_once(
			$_SERVER['DOCUMENT_ROOT'].'/smt/include/tracking.php')
	?>
</head>
<body>
	<?php
		$thisPage = "Tutorial";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>
			Basics
		</h2>
		<div>
			<h3>
				<a href="tutorial/one.php">
					Basics 1 - Getting Started
				</a>
			</h3>
			<h3>
				<a href="tutorial/two.php">
					Basics 2 - TouchDown, TouchUp and Press
				</a>
			</h3>
			<h3>
				<a href="tutorial/three.php">
					Basics 3 - Parent and Child Zones
				</a>
			</h3>
			<h3>
				<a href="tutorial/four.php">
					Basics 4 - Touch Functions
				</a>
			</h3>
		</div>
		<br/>
		<h2>
			Additional Topics
		</h2>
		<div>
			<h3>
				<a href="tutorial/touchdraw.php">
					Customizing SMT's Touch Visualizations
				</a>
			</h3>
			<h3>
				<a href="tutorial/tsbounds.php">
					Defining Touch Source Bounds
				</a>
			</h3>
			<h3>
				<a href="tutorial/swipekeyboard.php">
					Introducing the Swipe Keyboard Zone [ In Progress ]
				</a>
			</h3>
		</div>
		<br/>
		<h2>
			Advanced Tutorials
		</h2>
		<div>
			<h3>
				<a href="tutorial/java.php">
					Object-Oriented SMT ( Working with SMT in Java )
				</a>
			</h3>
			<h3>
				<a href="tutorial/viewports.php">
					Introducing Viewports [ In Progress ]
				</a>
			</h3>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>