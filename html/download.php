<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Download]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
</head>
<body>
	<?php
		$thisPage = "Download";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<h2>Download</h2>
		<span>The last time SMT was updated on GitHub was </span>
		<span id="lastUpdate"></span><br><br>
		<p>
			To download the Simple Multi-Touch toolkit, open the Library Manager in Processing. Change the Category to I/O and look for <strong>Simple Multi-Touch (SMT)</strong>.  Once found, click the install button.
		</p>
		<p>
			Alternatively, <a href="/smt/dl.php?file=/smt/dl/SMT.zip">you can download a .zip file here.</a>
		</p>
		<p>
			We are actively developing the toolkit, therefore to get the latest version, you can update using the Processing IDE, download the newest version from GitHub, or download the .zip file above.
		</p>
		<p>
			For the source code, you can visit the <a href="https://github.com/vialab/SMT">GitHub page</a>.
		</p>
		<div class="row-fluid">
			<div class="span12">
				<a href="/smt/img/addLibProcessing.jpg">
					<img class="imgDownload" src="/smt/img/addLibProcessing.jpg">
				</a>
				<a href="/smt/img/installSMTProcessing.jpg">
					<img class="imgDownload" src="/smt/img/installSMTProcessing.jpg">
				</a>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
	<script src="/smt/js/SMTUpdate.js"></script>
</body>
</html>