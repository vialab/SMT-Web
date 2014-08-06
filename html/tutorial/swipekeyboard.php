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
			There are currently two keyboard zones included in SMT - <code>KeyboardZone</code> and <code>SwipeKeyboard</code>. <code>KeyboardZone</code> is older, uncustomizable, and not particularly aesthetically pleasing, but perhaps easier to use. <code>SwipeKeyboard</code> is an experimental, modular, prettier, but more complicated alternative. This tutorial will walk through the basics of using <code>SwipeKeyboard</code> like a normal keyboard, and make a cursory attempt to explain how to use the swipe functionality.
		</p>

		<h4>Basics</h4>
<pre><code class="java">	SwipeKeyboard keyboard = new SwipeKeyboard();
	keyboard.setLocation( 45, 300);
	keyboard.addKeyListener( this);</code></pre>
		<p>
			This code block should be pretty straightforward. You might also want to call <code>keyboard.scale( float)</code> to resize the keyboard to fit your sketch.
		</p>

		<h4>Receiving Normal Input</h4>
<pre><code class="java">//keyboard handle
void keyPressed(){
	if( username_selected)
		switch( key){
			case '\b': //backspace
				if( ! username.isEmpty())
					username = username.substring(
						0, username.length() - 1);
				break;
			case '\n': //enter
				if( username.isEmpty()) break;
				keyboard.setVisible( false);
				keyboard.setPickable( false);
				username_selected = false;
				username = ":: Access Granted ::";
				break;
			case (char) 65535: //unknown keys
				break;
			default: //any other keys
				username += key;
		}
}</code></pre>
		<p>
			Once you've connected the keyboard to the running sketch, the rest should work almost identically to a normal hardware keyboard. The majority of this code block is rather particular to the sketch. The one bit that might not be clear is <code>(char) 65535</code>, which catches any keys that don't have a defined character. You could also use <code>java.awt.KeyEvent.CHAR_UNDEFINED</code> instead.
		</p>

		<h4>Toggling Visibility</h4>
<pre><code class="java">	keyboard.setVisible( false);
	keyboard.setPickable( false);</code></pre>
		<p>
			A nice little feature of the zone class is the ability to toggle visibility, pickability ( whether touches can be assigned the zone ), and touchability ( whether the touch methods are invoked for the zone ). Generally users like to be able to hide their soft keyboards while they're not in use. <code>Zone.setVisible( boolean)</code> will toggle the draw method of the zone and its children. Similarly, <code>Zone.setPickable( boolean)</code> will toggle the pick draw method of the zone and its children. Using these two together will disable the zone entirely.
		</p>

		<h4>Alternative Layouts</h4>
		<p>
			The default keyboard layout is called the condensed layout. There's one other keyboard layout currently available: the arrow keys layout. You can use it like this: <code>SwipeKeyboard arrow_keys = new SwipeKeyboard( SwipeKeyboard.arrowKeysLayout)</code>. It provides the up, down, left, and right arrow keys.
		</p>
		<p>
			Note: You can write a class that extends <code>vialab.SMT.swipekeyboard.SwipeKeyboardLayout</code> to create your own layouts!
		</p>

		<h4>Receiving Swipe Input</h4>
		<p>
			Use of the swipe functionality could be a whole tutorial by itself. See <a href="/smt/examples/Demos/Keyboard.php">examples/Demos/Keyboard</a> for an example. The important thing is to implement the <code>vialab.SMT.swipekeyboard.SwipeKeyboardListener</code> interface and call <code>SwipeKeyboard.addSwipeKeyboardListener( SwipeKeyboardListener)</code>. For more information, have a look SMT's javadoc page for <a href="/smt/javadoc/vialab/SMT/swipekeyboard/SwipeKeyboardListener.html">SwipeKeyboardListener</a> and <a href="/smt/javadoc/vialab/SMT/swipekeyboard/SwipeKeyboardEvent.html">SwipeKeyboardEvent</a>.
		</p>

		<h4>Other Notes</h4>
		<p>
			The little black rectangles at the corners of the swipe keyboard are called anchors, and can be toggled with <code>SwipeKeyboard.setAnchorsEnabled( boolean)</code>. They can be used be the user to move the keyboard around on the screen.
		</p>
		<p>
			Once again, <code>SwipeKeyboard</code> is experimental and absolutely not complete. If you encounter problems or have any suggestions, feel free to <a href="https://github.com/vialab/SMT/issues/new">submit a new issue on our github page</a>.
		</p>


		<h4>Entire Source Code for Tutorial: [ 
			<a href="/smt/dl.php?file=examples/Demos/Login/Login.pde">
				Download</a> | 
			<a href="/smt/examples/Demos/Login/Login.pde">
				Direct Link</a> ]
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Demos/Login/Login.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>