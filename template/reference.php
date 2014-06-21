<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Test]";
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
		<h2>Reference</h2>
		<p>
			Check out the Simple Multi-Touch <a href="http://vialab.github.io/SMT">JavaDoc here.</a>
		</p>
		<p>
			Check out the processing API at <a href="http://www.processing.org/reference/">processing.org/reference/</a>.
		</p>
		<h2>Reference</h2>
		<div class="row-fluid">
			<div class="span12" id="referenceColumns">
				$content
			</div><!--/span-->
		</div><!--/row-->
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>
