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
	<pre><code class="java">	System.out.println("asdf");</code></pre>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>