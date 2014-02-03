<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[About]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "About";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>About</h2>
		<p>
			Simple Multi-Touch (SMT) is an open source <a href="http://www.processing.org">Processing</a> toolkit designed to make multi-touch
			computing accessible to non-experts, and to facilitate rapid prototyping of interactive applications.
		</p>
		<p>
			SMT currently supports 
			<ul>
				<li>Windows Touch,</li>
				<li>Leap Motion (on Windows),</li>
				<li>SMART SDK, and</li>
				<li>Hardware that use the <a href="http://www.tuio.org">TUIO</a> protocol, which includes most multi-touch tables</li>
			</ul>
		</p>
		<p>
			It can either be used in the Processing IDE, or in a Java IDE such as eclipse. The only requirement to use SMT within a Java application is the Processing library files, as well as the SMT jar file.
		</p>
		<p>
			Check out the lab website for SMT - <a href="http://vialab.science.uoit.ca/portfolio/smt-toolkit">vialab.science.uoit.ca/portfolio/smt-toolkit</a>. 
			The Simple Multi-Touch initiative was started in 2011 through a collaboration of people at the <a href="http://www.uoit.ca">University of Ontario Insitute of Technology</a> and the <a href="http://www.uwaterloo.ca">University of Waterloo</a>. These people include <a href="http://www.erikpaluka.com">Erik Paluka</a>, <a href="http://vialab.science.uoit.ca/portfolio/zachary-cook">Zachary Cook</a>, <a href="http://markhancock.ca/">Dr. Mark Hancock</a>, and <a href="http://vialab.science.uoit.ca">Dr. Christopher Collins</a>.
		</p>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>