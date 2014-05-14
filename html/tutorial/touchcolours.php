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
			Setting Touch and Trail Colours
		</h2>
		<h4>Introduction</h4>
		<p>
			This is a more advanced tutorial. It assumes that the reader knows basic processing and has read the introductory tutorials.
		</p>
		<p>
			The default touch drawer, as of SMT 4.0, is the textured touch drawer. This tutorial is only about the textured touch drawer. If you're encountering performance issues, there are a number of things that can be done to help that will be discussed later. However it should also be known that there are other options for touch drawing, namely the smooth and debug methods, as well as disabled touch drawing and using a custom touch drawer class. These options can be enabled by calling <code>SMT.setTouchDraw( TouchDraw.SMOOTH);</code>, <code>SMT.setTouchDraw( TouchDraw.DEBUG);</code>, <code>SMT.setTouchDraw( TouchDraw.NONE);</code>, and <code>SMT.setTouchDraw( TouchDraw.CUSTOM, TouchDrawer drawer);</code>, respectively. None of the touch drawing customization functions discussed in the rest of this tutorial apply to any of those touch drawing methods. These functions only work when using the textured touch drawer. If you change the touch drawing method, and for some reason want to change back to the textured touch drawer, call <code>SMT.setTouchDraw( TouchDraw.TEXTURED);</code>.
		</p>
		<p>
			With all that said, the textured touch drawer will most likely suit your needs. You can customize touch colours, radius, death animation duration, trail colours, trail width, trail length, trail tightness, and trail smoothness. You can also set the number of triangles used to draw touches, the number of rectangles used to draw the trail, the maximum number of sample points used to interpolate the trail, and the length in time of the trail. Additionally, you can set individual touch's colours and trail colours, which will override the globally set colours. Finally, trails can be disabled.
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
			<a href="/smt/dl.php?file=/smt/examples/Demos/TouchColours/TouchColours.pde">
				Download
			</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Demos/TouchColours/TouchColours.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>