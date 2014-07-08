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
			Tutorial [ <a href="/smt/tutorial/one.php">1</a> | <a href="/smt/tutorial/two.php">2</a> | 3 | <a href="/smt/tutorial/four.php">4</a> ]
		</h2>
		<h4>Introduction</h4>
		<p>
			This is an introductory tutorial. It assumes that the reader knows basic processing and has read the previous tutorial, but no more.
		</p>
		<p>
			More complicated interfaces require some form of element nesting. Basically, this means that a ui element can be contained by other ui elements. SMT's answer to this is zone nesting. Any zone can have any number of children, which inherit their parent's transformation matrix. This means that if you move the parent around, the child will move with it.
		</p>

		<h4>Setup</h4>
<pre><code class="java">//Make a new Zone
Zone zone = new Zone( "MyZone");
SMT.add( zone);
zone.translate( 100, 100);

//Make a child Zone
Zone child = new Zone( "ChildZone");
zone.add( child);
child.translate( 100, 100);

//Make a grandchild Zone
Zone grandchild = new Zone( "GrandChildZone");
child.add( grandchild);
grandchild.translate( 50, 50);</code></pre>
		<p>
			Here we make a few zones, and add them into each other. "ChildZone" is added to "MyZone", effectively making it a child of "MyZone", and "GrandChildZone" is added to "ChildZone", making it a child of "ChildZone".
		</p>

		<h4>Result</h4>
		<p>
			This is what you could see when running this tutorial's code in processing, after some rotation of the zones.
		</p>
		<p>
			"MyZone" is drawn blue, "ChildZone" is drawn green, and "GrandChildZone" is drawn purple.
		</p>
		<img class="img-thumbnail" style="margin: 0 auto; display:block"
			src="/smt/img/tutorial/three.png" alt="Tutorial 3 Screenshot">

		<h4>Next Tutorial</h4>
		<p>
			<a href="/smt/tutorial/four.php">Tutorial 4 - Touch Functions</a>
		</p>

		<h4>Entire Source Code for Tutorial: 
			<a href="/smt/dl.php?file=/smt/examples/Tutorial/Three/Three.pde">Download</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Tutorial/Three/Three.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>