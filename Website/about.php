<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[About]";
		$containsCode = true;
		include 'include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "About";
		include 'include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>About</h2>
		<p>Simple Multi-Touch (SMT) is an open source <a href="http://www.processing.org" target="_blank">Processing</a> toolkit designed to make multi-touch
			computing accessible to non-experts, and to facilitate rapid prototyping of interactive applications.
			<br /> <br />
			SMT currently supports 
			<ul>
				<li>Windows touch</li>
				<li>Leap Motion</li>
				<li>SMART SDK</li>
				<li>hardware that use the <a href="http://www.tuio.org" target="_blank">TUIO</a> protocol, such as multi-touch tables</li>
			</ul>
			It can either be used in the Processing IDE, or in a Java IDE such as eclipse. The only requirement to use SMT within a Java application is the Processing library files, as well as the SMT jar file.
			<br /> <br />
			Check out the lab website for SMT - <a href="http://vialab.science.uoit.ca/portfolio/smt-toolkit">vialab.science.uoit.ca/portfolio/smt-toolkit</a>. 
			The Simple Multi-Touch initiative was started in 2011 through a collaboration of people at the <a href="http://www.uoit.ca" target="_blank">University of Ontario Insitute of 
			Technology</a> and the <a href="http://www.uwaterloo.ca" target="_blank">University of Waterloo</a>. These people include <a href="http://www.erikpaluka.com" target="_blank">Erik Paluka</a>, <a href="http://vialab.science.uoit.ca/portfolio/zachary-cook" target="_blank">Zachary Cook</a>, <a href="http://markhancock.ca/" target="_blank">Dr. Mark Hancock</a>, and <a href="http://vialab.science.uoit.ca" target="_blank">Dr. Christopher Collins</a>.
		</p>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>