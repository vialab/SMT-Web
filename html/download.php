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
		<p>
			To download the Simple Multi-Touch toolkit, open the Library Manager in Processing. Change the Category to I/O and look for <strong>Simple Multi-Touch (SMT)</strong>.  Once found, click the install button.
		</p>
		<p>
			Alternatively, <a href="dl/SMT.zip">you can download a zip here.</a>
		</p>
		<p>
			<b>Warning: SMT does not work with Processing 2.1.1. We are working on resolving the conflict in the next release of SMT (v4.0).</b>
		</p>
			We are actively developing the toolkit, therefore to get the latest version, you can update using the Processing IDE, download the newest version from GitHub, or download the .zip file above.
		</p>
		<p>
			For the source code, you can visit our <a href="https://github.com/vialab/SMT" target="_blank">GitHub page</a>.
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