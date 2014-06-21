<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Reference]";
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
		$thisPage = "Reference";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<div class="row-fluid referenceRow">
			<div class="referenceTag">Name</div>
			<div class="referenceDescriptor">
				<span class="referenceName">$Name</span>
			</div>
		</div>
		<div class="row-fluid referenceRow">
			<div class="referenceTag">Description</div>
			<div class="referenceDescriptor">
				<p>
					$Description
				</p>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>