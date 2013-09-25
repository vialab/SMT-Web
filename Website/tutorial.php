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
							This is an introductory tutorial. It assumes that the reader knows basic processing, but no more.
						</p>
						<p>
							The Simple Multi-Touch toolkit, also known as SMT, makes using multi-touch interactions in sketches easy. In this tutorial, we will walk though the absolute basics of SMT and how to get started with making your own multi-touch applications.
						</p>

						<h4>SMT.init()</h4>
<pre><code class="java">//Setup function for the processing applet
void setup(){
	//SMT and Processing setup
	size(displayWidth, displayHeight, P3D);
	SMT.init( this, TouchSource.MULTIPLE);</code></pre>
						<p>
							Whenever using SMT, <code>SMT.init()</code> must be called. It must be called after <code>size()</code>.
						</p>
						<p>
							SMT only supports OpenGL 3D renderers, so the third parameter in <code>size()</code> must be <code>OPENGL</code> or <code>P3D</code>. There are multiple possible values for the second parameter of <code>SMT.init()</code>, but for now, we'll just use <code>MULTIPLE</code> to automatically detect the source.
						</p>

						<h4>Making a Zone</h4>
<pre><code class="java">	//Make a new Zone
	Zone zone = new Zone( "MyZone");
	SMT.add( zone);</code></pre>
						<p>
							The Zone could be considered the central concept of SMT. A Zone is a drawable area that can be interacted with through touch. The name of the Zone is very important. In this case, We've named the Zone <code>"MyZone"</code>.
						</p>

						<h4>Drawing a Zone</h4>
<pre><code class="java">//Draw function for "MyZone"
void drawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}</code></pre>
						<p>
							This function defines how any Zone with the name <code>"MyZone"</code> is drawn. If the Zone was named <code>"SpecialZone"</code>, this function would have to be defined as <code class="java">void drawSpecialZone( Zone zone){}</code>. In other words, to draw a zone, make a function named <code>draw[Zone name]</code>.
						</p>

						<h4>Detecting Touches</h4>
<pre><code class="java">//Pick function for "MyZone"
void pickDrawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}</code></pre>
						<p>
							This function works in the same way as the <code>drawMyZone()</code> function. Instead of drawing to the screen, however, it draws to something called a "pick buffer". Think of this as defining the touchable area for a Zone. Generally, one can use the same code as the draw function. Similarly to the draw function, the function must be named <code>pickDraw[Zone name]</code>. If you're curious about how SMT uses this function, read <a href="http://wiki.processing.org/w/Picking_with_a_color_buffer">this processing tutorial</a>.
						</p>

						<h4>Handling Touches</h4>
<pre><code class="java">//Touch function for "MyZone"
void touchMyZone(Zone zone){
	zone.drag();
}</code></pre>
						<p>
							This function defines what to do when a Zone is being touched. There are a number of built-in functions available, such as <code>.drag()</code>, which is used in this example, <code>.rotate()</code>, <code>.scale()</code>, <code>.rst()</code>, <code>.rnt()</code>, <code>.rs()</code>, and more. Each of these have many parameters avaiable, to customize the behavior. If none of the build-in functions are suitable, it is possible to code custom behavior, but this is outside the scope of this tutorial. The function must be named <code>touch[Zone name]</code>.
						</p>

						<h4>Entire Source Code for Tutorial:</h4>
<pre><code class="java">import vialab.SMT.*;
//Setup function for the processing applet
void setup(){
	//SMT and Processing setup
	size(displayWidth, displayHeight, P3D);
	SMT.init(this, TouchSource.MULTIPLE);

	//Make a new Zone
	Zone zone = new Zone( "MyZone", 0, 0, 50, 50);
	SMT.add( zone);
}

//Draw function for the sketch
void draw(){
	background( 51);
}

//Draw function for "MyZone"
void drawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}

//Pick function for "MyZone"
void pickDrawMyZone(Zone zone){
	rect(0, 0, 100, 100);
}

//Touch function for "MyZone"
void touchMyZone(Zone zone){
	zone.drag();
}</code></pre>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>