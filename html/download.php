<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Download]";
		$containsCode = true;
		include 'include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Download";
		include 'include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Download</h2>
		<br>
		<span>The last time SMT was updated on GitHub was </span>
		<span id="lastUpdate"></span><br><br>
		<p>To download the Simple Multi-Touch toolkit, open the Library Manager in Processing. Change the Category to I/O and look for <strong>Simple Multi-Touch (SMT)</strong>.  Once found, click the install button.
			<br>
			Alternatively, <a href="dl/SMT.zip">you can download a .zip file here.</a> <br><br>
			We are actively developing the toolkit, therefore to get the latest version, you can update using the Processing IDE, download the newest version from GitHub, or download the .zip file above.
			<br>
			For the source code, you can visit the <a href="https://github.com/vialab/SMT" target="_blank">GitHub page</a>.
		</p>
		<br>
		<div class="row-fluid">
			<div class="span12">
				<a href="img/addLibProcessing.jpg">
					<img class="imgDownload" src="img/addLibProcessing.jpg">
				</a>
				<a href="img/installSMTProcessing.jpg">
					<img class="imgDownload" src="img/installSMTProcessing.jpg">
				</a>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include 'include/footer.php';
	?>
	<script src="js/SMTUpdate.js"></script>
</body>
</html>