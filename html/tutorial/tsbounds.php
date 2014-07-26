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
			Customizing Touch Source Bounds
		</h2>
		<h4>Introduction</h4>
		<p>
			This is a more advanced tutorial. It assumes that the reader knows basic processing and has read the introductory tutorials.
		</p>
		<p>
			The vast majority of touch input devices are attached to a display. Some, however span multiple displays, or non-displays. These input devices however, generally give decimal values from 0 to 1, not pixel co-ordinates. This makes it impossible to tell where a given touch co-ordinate is on the screen, unless additional information is given. All of these functions dicussed are how one can provide SMT with that additional information.
		</p>
		<p>
			Note: We generally recommend making setting up touch source bounds in the setup function, but after the <code>SMT.init()</code> call.
		</p>
		<p>
			Developer's Note: We're sorry aboud the long function names. We couldn't come up with anything more concise, but just as descriptive. If you have a better suggestion for the function names, feel free to make a <a href="https://github.com/vialab/SMT/issues/new">new issue on our github page</a> about it, and we'll definitely consider it.
		</p>

		<h4>Active Display Mode</h4>
<pre><code class="java">SMT.setTouchSourceBoundsActiveDisplay();</code></pre>
		<p>
			'Active display mode' is the default mode for touch binding. It identifies the display that the sketch window is on and uses the window's relative position to the display to bind touches onto the sketch. It automatically updates when the window is moved, resized, or moved to another display. It also updates when a display is disconnected, or a new display is connected. Exactly how the 'active' display is determined depends on your OS and JVM. The one failing point of this mode is when windows span multiple displays.
		</p>

		<h4>Display Mode</h4>
<pre><code class="java">SMT.setTouchSourceBoundsDisplay( 0);
SMT.setTouchSourceBoundsDisplay( ":0.1");</code></pre>
		<p>
			If you know the exact id or index of the display you want to bind touches onto, you can use these functions to select them. The format of the id string can depend on your OS, JVM, display server, and display card's pci slot. Basically, don't use the id string overload unless you really know what you're doing.
		</p>

		<h4>Screen Mode</h4>
<pre><code class="java">SMT.setTouchSourceBoundsScreen();</code></pre>
		<p>
			This mode is similar to the previous two modes. Instead of binding touches onto just one display, it binds touches onto the entire screen. This effectively means that touches are bound onto all displays.
		</p>

		<h4>Sketch Mode</h4>
<pre><code class="java">SMT.setTouchSourceBoundsSketch();</code></pre>
		<p>
			This mode is the first that we've discussed that doesn't account for the window's location. Instead, it just directly binds the touches into the sketch's co-ordinates. For example, (0,0) would be bound to (0,0), and (1,1) would be bound to (sketchWidth,sketchHeight). It can be hard to understand the difference between this mode and the previous ones without actually trying it. If you've used SMT 4.0 or previous releases, this is how touches were bound then. This mode is generally recommended for full-screen sketches.
		</p>

		<h4>Rectangle Mode</h4>
<pre><code class="java">SMT.setTouchSourceBoundsRect(
	new Rectangle( 100, 100, 1000, 600));</code></pre>
		<p>
			This mode works similarly to the 'sketch' mode. It binds touches directly onto the given rectangle. When you have an unusual setup, this mode may be easier to set up than the alternatives.
		</p>

		<h4>Custom Mode</h4>
<pre><code class="java">//create a custom touch binder
binder_custom = new TouchBinder();
//binder_custom.setDebug( true);
PMatrix2D bind_matrix = new PMatrix2D();
bind_matrix.scale( 1200, 800);
bind_matrix.rotate( HALF_PI);
bind_matrix.translate( 0, - 1);
binder_custom.setBindMatrix( bind_matrix);
binder_custom.setClampMin( new PVector( 0, 0));
binder_custom.setClampMax( new PVector( 1200, 800));
//apply the custom touch binder
SMT.setTouchSourceBoundsCustom( binder_custom);</code></pre>
		<p>
			Here we demonstrate creating and using a custom touch binder. In this case, we created a touch binder that rotates the input clockwise by 90 degrees, then scales it to the sketch. Note how the matrix transformations have to be done in reverse order. The reasons for this are complicated, but this will be familiar to anyone who's previously worked with OpenGL. The default matrix is simply the identity matrix. If you're having issues with getting your matrix set up properly, you can call <code>TouchBinder.setDebug( true)</code> to enable some debug output on the binding process.
		</p>
		<p>
			When using a custom touch binder, always remember to adjust the clamping properly. The default clamp minimum is (0,0), and the default maximum is (1,1). Clamping can be disabled by calling <code>TouchBinder.setClampMin( null)</code> and <code>TouchBinder.setClampMax( null)</code>.
		</p>

		<h4>Extending the TouchBinder Class</h4>
		<p>
			Extending the <code>TouchBinder</code> class gives you a little perk: the ability to update easily. SMT calls <code>.update()</code> on each touch binder once for each draw cycle. This is how the various touch binders above can account for window movement. All of them are optimized to only make changes when they're required to. If you extend the TouchBinder class, we recommend you to keep performance in mind when writing your <code>update()</code> function.
		</p>

		<h4>Different Modes for Different Sources</h4>
		<p>
			There is one final feature to be aware of. Each of the above functions have overloads available that accept one or more <code>TouchSource</code> parameter. Say, for example, you wanted use 'indexed display' mode for windows touch input and SMART devices, but 'screen' mode for all tuio devices. You would want to make the following calls:
		</p>
<pre><code class="java">SMT.setTouchSourceBoundsDisplay( 0, TouchSource.SMART, TouchSource.WM_TOUCH);
SMT.setTouchSourceBoundsScreen( TouchSource.TUIO_DEVICE);</code></pre>
		<p>
			Note: <code>TouchSource.MOUSE</code> is a bit of a special case. Unlike all the other touch sources, its default mode is 'sketch', and its mode is not changed by the unparameterized overloads of the above functions. If, for some reason, you want to change its mode, you must explicitly pass <code>TouchSource.MOUSE</code> as a parameter. (e.g. <code>SMT.setTouchSourceBoundsDisplay( 0, TouchSource.MOUSE);</code>)
		</p>

		<h4>Display Test Sketch</h4>
		<p>
			We've made a little sketch that might help with identifying the correct touch bindings for your touch devices. It comes packaged with the SMT library. You can find it in the processing IDE's examples viewer under <code>Contributed Libraries/Simple Multi-Toch (SMT)/Tests/Display</code>. Alternatively, you can download it directly from our website here: <a href="/smt/examples/Tests/Display.php">vialab.science.uoit.ca/smt/examples/Tests/Display.php</a> or our github repo here: <a href="https://github.com/vialab/SMT/blob/master/examples/Tests/Display/Display.pde">github.com/vialab/SMT/blob/master/examples/Tests/Display/Display</a>.pde. An older version that doesn't depend on the SMT library can be found here: <a href="https://github.com/kiwistrongis/processing-display-info">github.com/kiwistrongis/processing-display-info</a>.
		</p>

		<h4>Entire Source Code for Tutorial: 
			<a href="/smt/dl.php?file=examples/Advanced/TouchSourceBounds/TouchSourceBounds.pde">
				Download
			</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Advanced/TouchSourceBounds/TouchSourceBounds.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>