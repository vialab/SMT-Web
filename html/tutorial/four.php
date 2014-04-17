<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Tutorial]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Tutorial";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>
			Tutorial [ <a href="/smt/tutorial/one.php">1</a> | <a href="/smt/tutorial/two.php">2</a> | <a href="/smt/tutorial/three.php">3</a> | 4 ]
		</h2>
		<h4>Introduction</h4>
		<p>
			This is an introductory tutorial. It assumes that the reader knows basic processing and has read the previous tutorial, but no more.
		</p>
		<p>
			asdf
		</p>

		<h4>Setup</h4>
<pre><code class="java">code();</code></pre>
		<p>
			asdf
		</p>

		<h4>Entire Source Code for Tutorial: 
			<a href="/smt/dl.php?file=/smt/examples/Tutorial/Four/Four.pde">Download</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Tutorial/Four/Four.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>