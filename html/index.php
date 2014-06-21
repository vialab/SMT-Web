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
				<h2>Contributors Welcome!</h2>
				<p>
					Simple Multi-Touch is open source and open to new contributors. If you want to help us make multi-touch even easier to use with Processing, check out our <a href="https://github.com/vialab/SMT">Github page</a> and contact us by email!
				</p>
			</div>
			<div class="span6">
				<h2>News</h2>
				<p>
					<b>09/2013</b>
					<br>
					Kalev Kalda Sikes was hired as a SurfNet intern. As part of this new role he has taken over SMT's maintenance and active development.
				</p>
				<p>
					<b>06/2013</b>
					<br>
					Zach and Erik gave a tutorial on Simple Multi-Touch at SurfNet 2013 in Calgary, Alberta, Canada
				</p>
				<p>
					<b>04/2013</b>
					<br>
					Simple Multi-Touch was accepted as an Official Contributed Library to Processing
				</p>
				<p>
					<b>09/2012</b>
					<br>
					Zach and Erik gave a tutorial on Simple Multi-Touch at SurfNet 2012 in Kitchener, Ontario, Canada
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