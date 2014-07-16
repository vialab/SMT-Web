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
			Customizing Touch Drawing Options
		</h2>
		<h4>Introduction</h4>
		<p>
			This is a more advanced tutorial. It assumes that the reader knows basic processing and has read the introductory tutorials.
		</p>
		<p>
			The default touch drawer, as of SMT 4.0, is the textured touch drawer. This tutorial is about customizing it.
		</p>

		<h4>Choosing a touch draw method</h4>
		<p>
			There are a few touch drawing options other than the textured touch drawer: the "smooth" and "debug" methods. Alternatively, touch drawing can be simply disabled, or, if you want, you could write and use your own custom touch drawer. None of the rest of functions discussed in the rest of this tutorial work with any of these options.
		</p>
<pre><code class="java">	//if you want to, you can try one of the other touch drawing methods
	//SMT.setTouchDraw( TouchDraw.SMOOTH);
	//SMT.setTouchDraw( TouchDraw.DEBUG);
	//SMT.setTouchDraw( TouchDraw.NONE);</code></pre>
		<p>
			Uncomment any of these 3 lines to try one of the other touch drawing methods. To write your own touch drawer, write a class that extends <a href="http://vialab.science.uoit.ca/smt/javadoc/vialab/SMT/TouchDrawer.html">TouchDrawer</a> and call <code>SMT.setTouchDraw( TouchDraw.CUSTOM, TouchDrawer customTouchDrawer);</code>.
		</p>
		<p>
			If you change the touch drawing method, and for some reason want to change back to the textured touch drawer, call <code>SMT.setTouchDraw( TouchDraw.TEXTURED);</code>.
		</p>

		<h4>Touch Drawing Options</h4>
		<p>
			When using the textured touch drawer, you can customize the following properties of touches:
		</p>
		<ul>
			<li>Touch colour - <code>SMT.setTouchColor( float red, float green, float blue, float alpha)</code></li>
			<li>Touch radius - <code>SMT.setTouchRadius( float radius)</code></li>
			<li>Touch fade duration - <code>SMT.setTouchFadeDuration( long duration_milliseconds)</code></li>
			<li>Number of triangles used to draw touches - <code>SMT.setTouchSections( int sections)</code></li>
		</ul>
		<p>
			Additionally, you can set individual touch's colours with <code>Touch.setTint(  float red, float green, float blue, float alpha)</code>, which will override the globally set colours.
		</p>

		<h4>Trail Drawing Options</h4>
		<p>
			When using the textured touch drawer, you can customize the following properties of touch trails:
		</p>
		<ul>
			<li>Trail colour - <code>SMT.setTrailColor( float red, float green, float blue, float alpha)</code></li>
			<li>Trail tightness - <code>SMT.setTrailC( float c)</code></li>
			<li>Maximum number of sample points - <code>SMT.setTrailPointThreshold( int threshold)</code></li>
			<li>Maximum time threshold of sample points - <code>SMT.setTrailTimeThreshold( int threshold)</code></li>
			<li>Base number of interpolated points - <code>SMT.setTrailT_N( int t_n)</code></li>
		</ul>
		<p>
			Additionally, you can set individual touch's colours with <code>Touch.setTrailTint(  float red, float green, float blue, float alpha)</code>, which will override the globally set trail colours. Finally, trails can be disabled with <code>SMT.setTrailEnabled( boolean enabled)</code>.
		</p>

		<h4>Explanation of Tutorial Code</h4>
		<p>
			Here we just set some of the options as an example. All touches' radius is decreased to 10, their colour and their trail colour is set to a light green, and their fade duration is doubled.
		</p>
<pre><code class="java">	//customize some of touch drawing options
	// make the touch a bit smaller (default: 15)
	SMT.setTouchRadius( 10);
	// set the global colours to light green
	SMT.setTouchColour( 140, 180, 140, 220);
	SMT.setTrailColour( 140, 180, 140, 220);
	// make touches fade away for twice as long (default: 250 ms)
	SMT.setTouchFadeDuration( 500);</code></pre>

		<p>
			Here we create a number of custom zones in a number of colours, for a number of purposes. The first row sets the colour of only the touches that touch it. The second row sets the global colour of touches. The third row sets the colour of the trail of the touches that touch it. The fourth row sets the global colour of all touch trails.
		</p>
<pre><code class="java">	//create zones
	//touch colour setters
	ColourSetter touch_blue = new TouchColourSetter( 50, 40, 80, 80,
		100, 100, 150, 200);
	...
	//global touch colour setters
	ColourSetter touch_blue_global = new GlobalTouchColourSetter( 50, 165, 80, 80,
		100, 100, 150, 200);
	...
	//trail colour setters
	ColourSetter trail_blue = new TrailColourSetter( 50, 560, 80, 80,
		100, 100, 150, 200);
	...
	//global trail colour setters
	ColourSetter trail_blue_global = new GlobalTrailColourSetter( 50, 700, 80, 80,
		100, 100, 150, 200);
	...</code></pre>
		<p>
			The rest of the tutorial code is not particularly relevant to the main purpose, and thus will not be explained. A large portion of the code uses classes and object oriented programming. To learn how to use SMT effectively with object oriented programming, have a look at the <a href="/smt/tutorial/java.php">Working with SMT in Java</a> tutorial.
		</p>

		<h4>Screenshot</h4>
		<img class="img-thumbnail" style="margin: 0 auto; display:block"
			src="/smt/img/tutorial/touchcolours.png" alt="Touch Drawing Options Tutorial Screenshot">

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