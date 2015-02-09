<!DOCTYPE html>
<html>
<head>
	<?php
		$title = "[Home]";
		$containsCode = true;
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/head.php';
	?>
	<!--Start of this page's head-->
	<style>
		.titleSmall { font-size: 0.5em;}
		#lastUpdate { font-size: 0.8em;}
	</style>
	<?php 
		include_once(
			$_SERVER['DOCUMENT_ROOT'].'/smt/include/tracking.php')
	?>
	<!--End of this page's head-->
</head>
<body onload="updateDate();">
	<?php
		$thisPage = "Home";
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/header.php';
	?>
	<!--Start of this page's content-->
		<div class="hero-unit" style="padding-bottom:20px;">
			<h1>Simple Multi-Touch Toolkit
				<h2 style="float:right;">for
					<a href="http://processing.org/">Processing</a>
					<br>
					<span class="titleSmall">Date of Last Update: </span>
					<span class="titleSmall" id="lastUpdate"></span>
				</h2>
			</h1>
			<p style="margin-top:60px;">
				<a href="about.php" class="btn btn-primary btn-large">Learn more &raquo;</a>
			</p>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<h2>Stable Releases</h2>
				<h4>SMT 4.2 [ <a href="https://github.com/vialab/SMT/releases/download/v4.2/SMT-4.2.zip">download</a> ] [ <a href="https://github.com/vialab/SMT/releases/tag/v4.2">release notes</a> ] ( Processing v2.1.1+ )</h4>
				<h4>SMT 3.8 [ <a href="https://github.com/vialab/SMT/releases/download/v3.8/SMT.zip">download</a> ] [ <a href="https://github.com/vialab/SMT/releases/tag/v3.8">release notes</a> ] ( Processing v2.1 )</h4>
				<h3>Recent Pre-Releases</h3>
				<h4>
					Beta: <a href="https://github.com/vialab/SMT/releases/tag/v4.1b3">v4.1b3</a>
					Alpha: <a href="https://github.com/vialab/SMT/releases/tag/v4.2a1">v4.2a1</a>
					Auto-Build: <a href="https://drone.io/github.com/vialab/SMT/latest">
						<img src="https://drone.io/github.com/vialab/SMT/status.png" alt="Auto-Build Status"/>
					</a>
				</h4>
				<br>
				<h2>Contributions Welcome!</h2>
				<p>
					Simple Multi-Touch is open source and open to new contributions. If you want to help us out, check out our <a href="https://github.com/vialab/SMT">Github page</a> and contact us by email!
				</p>
			</div>
			<div class="span6">
				<h2>News</h2>
				<p>
					<b>2014-10</b>
					<br>
					Kalev Kalda Sikes gave a tutorial on Simple Multi-Touch at SurfNet 2014 in Calgary, Alberta, Canada.
				</p>
				<p>
					<b>2013-09</b>
					<br>
					Kalev Kalda Sikes was hired as a SurfNet intern. As part of this new role he has taken over SMT's maintenance and active development.
				</p>
				<p>
					<b>2013-06</b>
					<br>
					Zach Cook and Erik Paluka gave a tutorial on Simple Multi-Touch at SurfNet 2013 in Calgary, Alberta, Canada.
				</p>
				<p>
					<b>2013-04</b>
					<br>
					Simple Multi-Touch was accepted as an Official Contributed Library to Processing.
				</p>
				<p>
					<b>2012-09</b>
					<br>
					Zach Cook and Erik Paluka gave a tutorial on Simple Multi-Touch at SurfNet 2012 in Kitchener, Ontario, Canada.
				</p>
			</div>
		</div>
	<!--End of this page's content-->
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/smt/include/footer.php';
	?>
	<script src="/smt/js/SMTUpdate.js"></script>
</body>
</html>
