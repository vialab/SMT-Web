<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Contact]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Contact";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Contact</h2>
		<p>
			Email us at vialab[dot]smt[at]gmail[dot]com
		</p>
		<p>
			If you have problems running SMT, first test the Processing examples (File -> Examples -> Basics). If you have problems with them, have a look at processing's troubleshooting page for solutions: <a href="http://wiki.processing.org/w/Troubleshooting">wiki.processing.org/w/Troubleshooting</a>.
		</p>
		<p>
			Next, try contacting the communities at <a href="http://reddit.com/r/processing">/r/processing</a>, and <a href="http://reddit.com/r/SimpleMultiTouch">/r/SimpleMultiTouch</a>. Other users and the developers hang out there, and would be happy to assist you.
		</p>
		<p>
			If you still have problems with our toolkit, please open an issue (<a href="https://github.com/vialab/SMT/issues">github.com/vialab/SMT/issues</a>) to report the problems you are having, and we will try our best to fix them promptly.
		</p>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
</body>
</html>