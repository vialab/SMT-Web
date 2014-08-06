<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Download]";
		$containsCode = true;
		include 'include/head.php';
	?>
	<?php 
		include_once(
			$_SERVER['DOCUMENT_ROOT'].'/smt/include/tracking.php')
	?>
</head>
<body>
	<?php
		$thisPage = "Download";
		include 'include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Downloads</h2>
		<h3>Stable Releases</h3>
		<p>
			To install from a zip, simply extract the SMT folder from the zip into your processing libraries folder. If you don't know how to do that, we recommend downloading SMT with Processing's IDE instead ( see below ).
		</p>
		<h4>SMT 4.1 [ <a href="https://github.com/vialab/SMT/releases/download/v4.1/SMT.zip">download</a> ] [ <a href="https://github.com/vialab/SMT/releases/tag/v4.1">release notes</a> ] ( Processing v2.1.1+ )</h4>
		<h4 id="SMTv3.8">SMT 3.8 [ <a href="https://github.com/vialab/SMT/releases/download/v3.8/SMT.zip">download</a> ] [ <a href="https://github.com/vialab/SMT/releases/tag/v3.8">release notes</a> ] ( Processing v2.1 )</h4>
		<p>
			Older releases and pre-releases are archived here: <a href="https://github.com/vialab/SMT/releases">SMT Releases</a>
		</p>
		<h3>Recent Pre-Releases</h3>
		<h4>
			Beta: <a href="https://github.com/vialab/SMT/releases/tag/v4.1b3">v4.1b3</a>
			Alpha: <a href="https://github.com/vialab/SMT/releases/tag/v4.1a4">v4.1a4</a>
			Auto-Build: <a href="https://drone.io/github.com/vialab/SMT/latest">
				<img src="https://drone.io/github.com/vialab/SMT/status.png" alt="Auto-Build Status"/>
			</a>
		</h4>
		<h3>Downloading SMT with the Processing IDE</h3>
		<p>
			The recommended way of using SMT with Processing is to use the IDE to install and update it. To do so, open the Library Manager in Processing. Change the Category to I/O and look for <strong>Simple Multi-Touch (SMT)</strong>.  Once you find it, click the install button.
		</p>
		<p>
			Warning: SMT currently only works with Processing 2.1.1+. For older versions of processing, download <a href="https://github.com/vialab/SMT/releases/tag/v3.8">SMT 3.8.</a>
		</p>
		<br>
		<div class="row-fluid">
			<div class="span12">
				<a href="img/add_lib.png">
					<img class="imgDownload" src="img/add_lib.png">
				</a>
				<a href="img/install_smt.png">
					<img class="imgDownload" src="img/install_smt.png">
				</a>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
</body>
</html>