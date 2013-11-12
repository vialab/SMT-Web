<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Example]";
		$containsCode = true;
		include '../../include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Example";
		include '../../include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>$Name</h2>
		<pre><code class="java"><?php
			$content = file_get_contents( '$Codefile');
			echo htmlspecialchars( $content);
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include '../../include/footer.php';
	?>
</body>
</html>