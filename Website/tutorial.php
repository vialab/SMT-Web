<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Tutorial]";
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
						<h2>Tutorial</h2>
						<h4>Introduction</h4>
						<p>
							This is a basic tutorial. It assumes that the reader knows basic processing, but no more.
						</p>
						<p>
							The Simple Multi-Touch toolkit, also known as SMT, makes using multi-touch interactions in sketches easy. In this tutorial, we will walk though the absolute basics of SMT and how to get started.
						</p>
						<h4>SMT.init()</h4>
<pre><code class="java">//Setup function for the applet
void setup(){
	//SMT and Processing setup
	size(displayWidth, displayHeight, P3D);
	SMT.init( this, TouchSource.MULTIPLE);</code></pre>
						<p>
							Whenever using SMT, <code>SMT.init()</code> must be called. It must be called after <code>size()</code>.
						</p>
						<p>SMT only supports OpenGL 3d renderers, so the third parameter in <code>size()</code> must be <code>OPENGL</code> or <code>P3D</code>. There are multiple possible values for the second parameter of <code>SMT.init()</code>, but for now, we'll just use <code>MULTIPLE</code> to automatically detect the source.
						</p>
						<h4>Entire Source Code for Tutorial:</h4>
<pre><code class="java">import vialab.SMT.*;
//Setup function for the applet
void setup(){
	//SMT and Processing setup
	size(displayWidth, displayHeight, P3D);
	SMT.init(this, TouchSource.MULTIPLE);

	//Make a new Zone
	Zone zone = new Zone( "myZone");
	SMT.add( zone);
}
//Draw function for the sketch
void draw(){
	background( 51);
}

//Draw function for "myZone"
void drawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}
void pickDrawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}
//Touch function for "myZone"
void touchMyZone(Zone zone){
	zone.drag();
}</code></pre>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>