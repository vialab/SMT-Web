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
			This tutorial show you the basics of extending the <code>Zone</code> class. It will cover implementing core zone functionality, best practices, as well a few tips and tricks. Please note that this tutorial is for SMT 4.1. If you need to write a sketch that works with older versions of SMT, look at <a href="#legacy">the section of this tutorial on legacy methods</a>.
		</p>

		<h4>Constructors</h4>
<pre><code class="java">class HappyFaceZone extends Zone {
	private boolean happy;

	//constructor
	public HappyFaceZone(){
		super( 500, 10, 200, 200);
		happy = true;
	}</code></pre>
		<p>
			There is but one requirement of the constructor of a <code>Zone</code> subclass: the first line must call one of the available super-constructors. In this case, we've called <code>Zone( int x, int y, int width, int height)</code>. The simplest available super-constructor is <code>Zone()</code>, which can be invoked with <code>super();</code>. You can find a list of the rest on <a href="http://localhost/smt/javadoc/vialab/SMT/Zone.html">Zone's javadoc page</a>. Feel free to do whatever else in the rest of the constructor, but a super-constructor call must be made for the class to work with SMT.
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
			Overriding <code>Zone.draw()</code> defines the draw method for that class. In this method, you have direct access to all methods of the underlying renderer of the sketch. Be aware that there are few protections on what you can do with those methods.
		</p>
		<p>
			<strong>Note:</strong> A few functions change during the draw ( and pick draw ) method. All matrix transformation functions, which would normally be directed to the zone's stored transformation matrix, will be directed to the renderer instead. To make transformations to the zone's matrix during the draw method, make the transformation calls on <code>this.matrix</code> instead ( eg: <code>this.matrix.rotate( 0.1);</code> ). The only other function that changes during drawing is the <code>background()</code> function. Instead of drawing a background covering the entire screen, it draws a rectangle of the given colour and of the width and height of the zone.
		</p>

		<h4>The Other Methods</h4>
		<p>
			Here are the rest of the basic methods that make up the core zone functionality. Note the <code>@Override</code> directive being used to guarantee that the super method exists and can be overriden. The <code>@Override</code> directive is not mandatory, but is considered good practice.
		</p>
		<p>
			Here's how to define the pick draw method. In this example, we simply draw a circle the size of the zone. This overrides the default pick draw method, which simply draws a rectangle the size of the zone.
		</p>
		<p>
			<strong>Note:</strong> The following functions are blocked while the pickDraw method is called. These functions include: <code>background()</code>, <code>fill()</code>, <code>stroke()</code>, and <code>tint()</code>.
		</p>
<pre><code class="java">	//pick draw method
	@Override
	public void pickDraw(){
		ellipse( 100, 100, 200, 200);
	}</code></pre>
		<p>
			Here's how to define the touch method.
		</p>
<pre><code class="java">	//touch method
	@Override
	public void touch(){
		rst();
	}</code></pre>
		<p>
			Here's how to define the touch down method.
		</p>
<pre><code class="java">	//touch down method
	@Override
	public void touchDown( Touch touch){
		happy = false;
	}</code></pre>
		<p>
			Here's how to define the touch up method.
		</p>
<pre><code class="java">	//touch up method
	@Override
	public void touchUp( Touch touch){
		if( this.getNumTouches() == 0)
			happy = true;
	}</code></pre>
		<p>
			Here's how to define the touch moved method.
		</p>
<pre><code class="java">	//touch moved method
	@Override
	public void touchMoved( Touch touch){}</code></pre>

		<a id="legacy"></a>
		<h4>Legacy Methods</h4>
		<p>
			Ignore this section if you don't need to support sketches written for old versions of SMT ( SMT 4.0 and previous ).
		</p>
		<p>
			Before SMT 4.1, the above methods had different names. These old names are still supported, but are deprecated. In order to provide backwards compatibility, SMT automatically detects when these "impl" methods are overriden, and calls them instead of their "non-impl" counterparts.
		</p>
		<p>
			If you wanted to override the "impl" methods, this is how you would do it.
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

		<h4>Advanced Methods</h4>
		<p>
			Here are a few extra methods that might be useful to override.
		</p>
<pre><code class="java">	@Override
	public void assign( Touch... touches){
		super.assign( touches);
	}</code></pre>
		<p>
			Overriding the assign method can be useful for two specific things. For one, it is an easy way to prevent touches from being assigned to a zone, but still allow the zone to block touches from being assigned to other zones that are drawn beneath it. To achieve that, simply comment out the <code>super.assign(...</code> call. Another thing overriding assign can be used for is redirecting touches to another zone. To do so, replace the <code>super.assign(...</code> call with something to the effect of <code>other_zone.assign( touches);</code>.
		</p>
<pre><code class="java">	@Override
	public boolean add( Zone zone){
		return super.add( zone);
	}</code></pre>
		<p>
			Overriding the <code>add( Zone)</code> method allows you to make any desired changes to the given zone before actually adding it. Alternatively, you could make changes to the the zone doing the adding. Imagine, for example, a "Wrapper" zone that automatically resized to encapsulate any zones added to it.
		</p>
<pre><code class="java">	@Override
	public boolean remove( Zone zone){
		return super.remove( zone);
	}</code></pre>
		<p>
			Similarly, overriding the remove method allows you to make changes to the remover or removee before the removal is finished.
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
			Anonymous classes are a relatively popular feature of Java. They are often used for UI development. SMT supports anonymous zone objects as of v3.8. Here we create a new anonymous zone object just to demonstrate the possibility. Note that the anonymous zone is given the name of "AnonyZone".
		</p>

		<h4>Applet Methods</h4>
		<p>
			There is one final feature to be aware of when extending the <code>Zone</code> class. Methods defined in the PApplet ( or sketch ) can override zone methods.
			Here we demonstrate with the touch method for the previously covered anonymous zone.
		</p>
<pre><code class="java">//touch method for anonymous zone
void touchAnonyZone( Zone zone){
	zone.pinch();
}</code></pre>
		<p>
			SMT will actually automatically detect and call this function instead of the touch method defined in the (anonymous) class for <code>anonyzone</code>. When running this example, notice that the zone on the left will not rotate, only scale and translate. This is because the <code>pinch()</code> method is being called instead of the <code>rst()</code> method. If you commented out, renamed, or simply deleted this method, the touch method defined in the anonymous class for <code>anonyzone</code> would be called.
		</p>
		<p>
			It's important to keep this functionality in mind when writing zones for other people. Users should ideally be able to use the zones you've written with normal processing sketches in the manner that they use SMT's zones.
		</p>
		<p>
			As a final note, it's possible to disable this functionality by overriding certain methods. Don't try this if you don't know what you're doing, however. There are a number of functions in the <code>Zone</code> class called <code>public void invokeSomethingMethod()</code>, <code>invokeDrawMethod</code> or <code>invokeTouchMethod</code> for example. Overriding these functions to just call the corresponding function ( <code>draw()</code>, for example ) will bypass the PApplet method. If you're going to attempt this, you might want to look at the source code for the methods you're overriding, just as a reference.
		</p>

		<h4>Screenshot</h4>
		<p>
			This is what you should see when running this tutorial's code in processing.
		</p>
		<img class="img-thumbnail" style="margin: 0 auto; display:block"
			src="/smt/img/tutorial/java.png" alt="Java Tutorial Screenshot">

		<h4>Entire Source Code for Tutorial: [ 
			<a href="/smt/dl.php?file=examples/Advanced/Java/Java.pde">
				Download
			</a> | 
			<a href="/smt/examples/Advanced/Java/Java.pde">
				Direct Link
			</a> ]
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