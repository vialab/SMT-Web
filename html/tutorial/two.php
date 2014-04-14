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
			Tutorial [ <a href="/smt/tutorial/one.php">1</a> | 2 | <a href="/smt/tutorial/three.php">3</a> ]
		</h2>
		<h4>Introduction</h4>
		<p>
			This is an introductory tutorial. It assumes that the reader knows basic processing and has read the previous tutorial, but no more.
		</p>
		<p>
			Sometimes, you may want greater control over what happens when a user touches a zone. The <code class="java">touchUp();</code>, <code class="java">touchDown();</code>, and <code class="java">press();</code> functions allow you to do just that.
		</p>

		<h4>Setup</h4>
<pre><code class="java">color myZone_color = #00dddd;</code></pre>
		<p>
			This tutorial uses a color variable to illustrate each function. It starts off as a light blue.
		</p>

		<h4>Touch Down</h4>
<pre><code class="java">//Touch Down function for "MyZone"
void touchDownMyZone( Zone zone){
	myZone_color = #dd8888;
}</code></pre>
		<p>
			This function defines what happens when a touch 'lands' on a zone. If you're used to GUI programming, it might make sense to think of it as similar to the mouse down event. Note that, however, there can be more than one touch, and the touchDown function is called for every touch that goes down on a zone.
		</p>
		<p>
			In this example, the color variable is set to red when a touch goes down onto "MyZone".
		</p>

		<h4>Touch Up</h4>
<pre><code class="java">//Touch Up function for "MyZone"
void touchUpMyZone( Zone zone){
	myZone_color = #00dddd;
}</code></pre>
		<p>
			This function is the converse to the touchDown function. Similar to what you might expect, it defines what happens when a touch is released from a zone.
		</p>
		<p>
			In this example, the color variable is set back to blue when a touch is released from "MyZone".
		</p>

		<h4>Press</h4>
<pre><code class="java">//Touch Pressed function for "MyOtherZone"
void pressMyOtherZone( Zone zone){
	myZone_color = #88dd88;
}</code></pre>
		<p>
			This function is a little special. It's used to emulate button-like behavior. Normally when a touch leaves a zone, it stays assigned to that zone. If a press method is defined for a zone, like our "MyOtherZone", touches are unassigned from that zone when they leave it. The press method is only called when a touch goes up while its still assigned to the zone.
		</p>
		<p>
			 To really understand how the press method works, try it out in the example - touch inside the second zone, then release outside it. Then try the opposite. The color variable is set to green when "MyOtherZone" is pressed.
		</p>

		<h3>Result</h3>
		<p>
			Here are some screenshots of this tutorial's sketch in action:
		</p>
		<p>
			<h4>When MyZone is dragged, it becomes red.</h4>
			<img class="img-thumbnail" style="margin: 0 auto; display:block"
				src="/smt/img/tutorial2_dragging.png" alt="Tutorial 2 Screenshot">
		</p>
		<p>
			<h4>When MyZone is released, it becomes blue.</h4>
			<img class="img-thumbnail" style="margin: 0 auto; display:block"
				src="/smt/img/tutorial2_released.png" alt="Tutorial 2 Screenshot">
		</p>
		<p>
			<h4>When MyOtherZone is pressed, MyZone becomes green.</h4>
			<img class="img-thumbnail" style="margin: 0 auto; display:block"
				src="/smt/img/tutorial2_other.png" alt="Tutorial 2 Screenshot">
		</p>

		<h4>Next Tutorial</h4>
		<p>
			<a href="/smt/tutorial/three.php">Tutorial 3 - Parent and Child Zones</a>
		</p>

		<h4>Entire Source Code for Tutorial: 
			<a href="/smt/dl.php?file=/smt/examples/Tutorial/Two/Two.pde">Download</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Tutorial/Two/Two.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>