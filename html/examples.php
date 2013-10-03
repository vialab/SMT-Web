<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Examples]";
		$containsCode = true;
		include 'include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Examples";
		include 'include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Examples</h2>
		<div class="row-fluid">
			<div class="span12" id="exampleColumns">
				<?php
				$examples = 'examples';
				foreach( scandir($examples) as $folder){
					if( $folder[0] == '.') continue;
					echo( '<div class="span4 example"><h4>'.$folder.'</h4>');
					foreach( scandir($examples.'/'.$folder) as $file){
						if( $file[0] != '.')
							echo( '<a href="'.$examples.'/'.$folder.'/'.$file.'">'.
								pathinfo($file)['filename'].'</a><br>');}
					echo( '</div>');}
				?>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>
