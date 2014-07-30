<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Tutorial]";
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
		<h2>
			Introducing the Swipe Keyboard Zone
		</h2>
		<h4>Introduction</h4>
		<p>
			This is a more advanced tutorial. It assumes that the reader knows basic processing and has read the introductory tutorials.
		</p>
		<p>
			There are currently two keyboard zones included in SMT - <code>KeyboardZone</code> and <code>SwipeKeyboard</code>. <code>KeyboardZone</code> is older, uncustomizable, and not particularly aesthetically pleasing, but perhaps easier to use. <code>SwipeKeyboard</code> is an experimental, modular, prettier, but relatively complex alternative. This tutorial will walk through the basics of using <code>SwipeKeyboard</code> like a normal keyboard, and attempt to explain how to use the swipe functionality.
		</p>

		<h4>Basics</h4>
<pre><code class="java">code();</code></pre>
		<p>
			asdf
		</p>

		<h4>Entire Source Code for Tutorial: [ 
			<a href="/smt/dl.php?file=examples/Demos/Keyboard/Keyboard.pde">
				Download</a> | 
			<a href="/smt/examples/Demos/Keyboard/Keyboard.pde">
				Direct Link</a> ]
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Demos/Keyboard/Keyboard.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>