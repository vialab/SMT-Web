<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Reference]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
	<style>
		:first-child{margin-left:0}
	</style>
</head>
<body>
	<?php
		$thisPage = "Reference";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Reference</h2>
		<p>
			Check out the Simple Multi-Touch <a href="/smt/javadoc">JavaDoc.</a>
		</p>
		<p>
			Check out the processing API at <a href="http://processing.org/reference/">processing.org/reference/</a>.
		</p>
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
			</div><!--/span-->
		</div><!--/row-->
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>
