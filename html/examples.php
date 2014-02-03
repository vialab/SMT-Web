<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Examples]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Examples";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Examples</h2>
		<div class="row-fluid">
			<div class="span12" id="exampleColumns">
				<?php
				//the folder to search for examples
				$examples = 'examples';
				foreach( scandir($examples) as $folder){
					//ignore unix-style hidden files
					if( $folder[0] == '.') continue;
					echo( '<div class="span4 example"><h4>'.$folder.'</h4>');
					foreach( scandir($examples.'/'.$folder) as $file){
						if( $file[0] != '.'){
							//get path info
							$pathinfo = pathinfo($file);
							//only include php files, exclude pde files
							if( $pathinfo['extension'] == 'php')
								echo( '<a href="'.$examples.'/'.$folder.'/'.$file.'">'.
									$pathinfo['filename'].'</a><br>');}}
					echo( '</div>');}
				?>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>
