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
			Object-Oriented SMT ( Working with SMT in Java )
		</h2>
		<h4>Introduction</h4>
		<p>
			This is a more advanced tutorial. It assumes that the reader knows basic processing and has read the introductory tutorials. It also assumes the reader knows basic java and object-oriented programming.
		</p>
		<p>
			Some people, especially those used to Java and object-oriented programming, can find SMT's reflection-invoked methods confusing or counter-intuitive. Fortunately, SMT fully supports object-oriented programming. When using the processing library in java, we highly recommend extending the <code>Zone</code> class over the reflection-based approach. Doing so is better for both performance and development.
		</p>
		<p>
			This tutorial show you the basics of extending the <code>Zone</code> class. It will cover best practices, possible mistakes and their solutions or preventative measures, as well a few tips and tricks. Please note that this tutorial is for SMT 4.1. If you need to write a sketch that works on older versions of SMT, look at <a href="#legacy">the section of this tutorial on legacy methods</a>.
		</p>

		<h4>Constructors</h4>
<pre><code class="java">class HappyFaceZone extends Zone {
	boolean happy = true;

	//constructor
	public HappyFaceZone(){
		super( 500, 10, 200, 200);
	}</code></pre>
		<p>
			There is but one requirement of the constructor of a <code>Zone</code> subclass - You must call one of the available super-constructors. In this case, we've called <code>Zone( int x, int y, int width, int height)</code>
		</p>

		<h4>The Draw Method</h4>
<pre><code class="java">	@Override
	public void draw(){
		//draw circle
		fill( 100, 150, 60, 200);
		stroke( 0, 220);
		strokeWeight( 5);
		ellipse( 100, 100, 200, 200);
		fill( 0, 220);
		//draw face
		textAlign( CENTER, CENTER);
		textFont( face_font);
		textMode( SHAPE);
		text(
			happy ? "^_^" : ">_<",
			100, 100 - 10);
	}</code></pre>
		<p>
			Overriding <code>Zone.draw()</code> redefines the draw method for that zone.
		</p>

		<h4>The Other Methods</h4>
		<p>
			Here are the rest of the basic methods that make up the core zone functionality.
		</p>
<pre><code class="java">	//pick draw method
	@Override
	public void pickDraw(){
		ellipse( 100, 100, 200, 200);
	}</code></pre>
		<p>
			Here's how to implement the pick draw method.
		</p>
<pre><code class="java">	//touch method
	@Override
	public void touch(){
		rst();
	}</code></pre>
		<p>
			Here's how to implement the pick draw method.
		</p>
<pre><code class="java">	//touch down method
	@Override
	public void touchDown( Touch touch){
		happy = false;
	}</code></pre>
		<p>
			Here's how to implement the pick draw method.
		</p>
<pre><code class="java">	//touch up method
	@Override
	public void touchUp( Touch touch){
		if( this.getNumTouches() == 0)
			happy = true;
	}</code></pre>
		<p>
			Here's how to implement the pick draw method.
		</p>
<pre><code class="java">	//touch moved method
	@Override
	public void touchMoved( Touch touch){}</code></pre>
		<p>
			Here's how to implement the pick draw method.
		</p>

		<a id="legacy"></a>
		<h4>Legacy Methods</h4>
		<p>
			Before SMT 4.1, the above methods had different names. These old names are still supported, but are deprecated.
		</p>
<pre><code class="java">	//draw method
	@Override
	public void drawImpl(){}
	//pick draw method
	@Override
	public void pickDrawImpl(){}
	//touch method
	@Override
	public void touchImpl(){}
	//touch down method
	@Override
	public void touchDownImpl( Touch touch){}
	//touch up method
	@Override
	public void touchUpImpl( Touch touch){}
	//touch moved method
	@Override
	public void touchMovedImpl( Touch touch){}</code></pre>
		<p>
			text
		</p>

		<h4>Advanced Methods</h4>
		<p>
			text
		</p>
<pre><code class="java">	@Override
	public void assign( Touch... touches){
		super.assign( touches);
	}</code></pre>
		<p>
			text
		</p>
<pre><code class="java">	@Override
	public boolean add( Zone zone){
		return super.add( zone);
	}</code></pre>
		<p>
			text
		</p>
<pre><code class="java">	@Override
	public boolean remove( Zone zone){
		return super.remove( zone);
	}</code></pre>
		<p>
			text
		</p>

		<h4>Anonymous Classes</h4>
<pre><code class="java">	//create an anonymous zone
	Zone anonyzone = new Zone( "AnonyZone", 100, 10, 200, 200){
		//draw method
		@Override
		public void draw(){
			fill( 220, 140, 160, 140);
			stroke( 240, 180);
			strokeWeight( 3);
			rect( 0, 0, this.width, this.height);
		}
		//touch method
		@Override
		public void touch(){
			rst();
		}
	};</code></pre>
		<p>
			text
		</p>

		<h4>Entire Source Code for Tutorial: 
			<a href="/smt/dl.php?file=/smt/examples/Advanced/Java/Java.pde">
				Download
			</a>
		</h4>
		<pre><code class="java"><?php
			include $_SERVER['DOCUMENT_ROOT'].'/smt/examples/Advanced/Java/Java.pde';
		?></code></pre>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>