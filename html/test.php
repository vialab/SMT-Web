<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Test]";
		$containsCode = true;
		include 'include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Tutorial";
		include 'include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>This is a Test</h2>
		<div class="row-fluid">
			<div class="span12" id="referenceColumns">
				<?php
				$reference = 'reference';
				foreach( scandir($reference) as $folder){
					if( $folder[0] == '.') continue;
					echo( '<div class="span4 function"><h4>'.$folder."</h4>\n");
					include $reference.'/'.$folder.'/include.php';
					echo( "</div>\n");}
				?>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>