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
			In the first tutorial you were introduced to the <code>Zone.drag()</code> function. In this tutorial, we'll go over a number of other nice little functions that serve the same purpose.
		</p>

		<h4>Setup</h4>
<pre><code class="java">	//SMT and Processing setup
	size( 1200, 800, SMT.RENDERER);
	SMT.init( this, TouchSource.AUTOMATIC);</code></pre>
		<p>
			Here we make a new window that's not fullscreen. As of SMT 4.1, you can now use non-fullscreen sketches, and the touches will still map properly onto the screen. If the default touch source bindings aren't working, have a look at the <a href="/smt/tutorial/touchsourcebounds.php">Customizing Touch Source Bounds</a> tutorial for details on how to adjust them.
		</p>

		<h4>Initializing the Zones</h4>
<pre><code class="java">	//Single transformation zones
	Zone spinny = new Zone( "SpinnyZone", 110, 110, 100, 100);
	Zone draggy = new Zone( "DraggyZone", 220, 110, 100, 100);
	Zone scaley = new Zone( "ScaleyZone", 330, 110, 100, 100);</code></pre>
		<p>
			These zones will only do one transformation at a time. Try to guess what transformations we'll have them do! They're the first row of zones in the sketch.
		</p>

<pre><code class="java">	//Double transformations
	Zone spinnydrag = new Zone( "SpinnyDragZone", 110, 310, 100, 100);
	Zone draggyscale = new Zone( "DraggyScaleZone", 220, 310, 100, 100);
	Zone scaleyspin = new Zone( "ScaleySpinZone", 330, 310, 100, 100);</code></pre>
		<p>
			These zones will do two types of transformations at a time. They're the second row of zones in the sketch
		</p>

<pre><code class="java">	//Rst Zones
	Zone rst_a = new Zone( "RstZoneA", 110, 510, 100, 100);
	Zone rst_b = new Zone( "RstZoneB", 220, 510, 100, 100);
	Zone rst_c = new Zone( "RstZoneC", 330, 510, 100, 100);
	Zone rst_d = new Zone( "RstZoneD", 440, 510, 100, 100);
	Zone rst_e = new Zone( "RstZoneE", 550, 510, 100, 100);
	Zone rst_f = new Zone( "RstZoneF", 660, 510, 100, 100);</code></pre>
		<p>
			These zones will be used to demonstrate all the overloads available for <code>rst()</code>. They're the last row of zones in the sketch. There are a number of overloads available for almost all the touch functions that you can use to customize behavior. Check them out on the <a href="/smt/javadoc/index.html?vialab/SMT/Zone.html">javadoc for Zone</a>, or the Zone section on the <a href="/smt/reference.php">reference page</a>.
		</p>

		<h4>Single Transformations</h4>
<pre><code class="java">void touchSpinnyZone( Zone zone){
	//this zone only spins
	zone.rotate();
}
void touchDraggyZone( Zone zone){
	//this zone only drags
	zone.drag();
}
void touchScaleyZone( Zone zone){
	//this zone only scales
	zone.scale();
}</code></pre>
		<p>
			So perhaps predicably, "SpinnyZone" will only spin. It is using the <code>rotate()</code> function. "DraggyZone" is using the previously covered <code>drag()</code> function. "ScaleyZone" is using the <code>scale()</code> function, and will only scale (resize).
		</p>

		<h4>Double Transformations</h4>
<pre><code class="java">void touchSpinnyDragZone( Zone zone){
	//this zone spins and drags
	zone.rnt();
}
void touchDraggyScaleZone( Zone zone){
	//this zone drags and scales
	zone.pinch();
}
void touchScaleySpinZone( Zone zone){
	//this zone spins and scales
	zone.rs();
}</code></pre>
		<p>
			"SpinnyDragZone" is using the <code>rnt()</code> function ( short for rotate and translate ), and will spin and drag. "DraggyScaleZone" is using the <code>pinch();</code> function. It will drag and scale. "ScaleySpinZone" is using the <code>rs()</code> function ( short for rotate and scale ), and will spin and scale.
		</p>

		<h4>The Rst function</h4>
<pre><code class="java">void touchRstZoneA( Zone zone){
	zone.rst();
}
void touchRstZoneB( Zone zone){
	zone.rst( false, true, true);
}
void touchRstZoneC( Zone zone){
	zone.rst( true, false, true);
}
void touchRstZoneD( Zone zone){
	zone.rst( true, true, false);
}
void touchRstZoneE( Zone zone){
	zone.rst( true, true, true, false);
}
void touchRstZoneF( Zone zone){
	zone.rst( true, true, false, true);
}</code></pre>
		<p>
			The <code>rst()</code> function is a combination of all the others. There are two overloads for <code>rst()</code>: <code>rst( boolean rotate, boolean scale, boolean translate)</code> and <code>rst( boolean rotate, boolean scale, boolean translate_x, boolean translate_y)</code>. 
		</p>

		<h4>Other touch functions</h4>
		<p>
			There are a few other built-in functions available. These are: <code>rotateAbout(float angle, int mode)</code>, <code>hSwipe()</code>, <code>hSwipe(int leftLimit, int rightLimit)</code>, <code>vSwipe()</code>, <code>vSwipe(int upLimit, int downLimit)</code>, <code>swipeLeft()</code>, <code>swipeRight()</code>, <code>swipeUp()</code>, <code>swipeDown()</code>, <code>toss()</code>, and <code>dragWithinParent()</code>. Once again, more information is available on the <a href="/smt/javadoc/index.html?vialab/SMT/Zone.html">javadoc for Zone</a>, and the Zone section on the <a href="/smt/reference.php">reference page</a>.
		</p>

		<h4>Writing a custom touch function</h4>
		<p>
			So you may not be satisfied with what you've seen here. Maybe you've got this great idea for how touches should be handles by zones, or some special case or something. You want to write your own touch function from scratch. Here I'll briefly go over the functions that you'll probably need to use, or want to know about when doing so.
		</p>
		<p>
			<code>Zone.getTouches()</code> is the first step. It returns an array containing all the touches that are currently assigned to that zone. <code>Touch.getX()</code> and <code>Touch.getY()</code> can be used to get the current position of a touch. <code>Touch.xSpeed</code> and <code>Touch.ySpeed</code> give you the distance that the touch moved from its last position. <code>Touch.getLocalX( Zone)</code> and <code>Touch.getLocalY( Zone)</code> can be used to get the current position of a touch, relative to the zone passed to it. <code>Touch.getPathPoints()</code> returns an array containing the recorded points of the touch's path. If timepoints are also needed, <code>Touch.getPath()</code> returns an array of <a href="http://tuio.org/api/java/TUIO/TuioPoint.html">TuioPoint</a>s. The TuioPoint class has the function <code>getTuioTime()</code> for getting the time of the point. Comparing that time to <code>TuioTime.getSessionTime()</code> can tell you how long ago that point is in time.
		</p>
		<p>
			Once you have the touch information, you probably want to move the zone around. All matrix transformations are available with functions in the Zone class. The basic ones are: <code>Zone.rotate( float angle)</code>, <code>Zone.scale( float ratio)</code>, and <code>Zone.translate( float x, float y)</code>. Once again, check the javadoc or reference for more details.
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