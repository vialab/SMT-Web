<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Example]";
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
		$thisPage = "Example";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>$Name [ <a href="/smt/dl.php?file=$Rel_codefile">Download</a> | <a href="$Codefile">Direct Link</a> ]</h2>
		<pre><code class="java"><?php
			$content = file_get_contents(
				$_SERVER['DOCUMENT_ROOT'].'$Codefile');
			echo htmlspecialchars( $content);
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>