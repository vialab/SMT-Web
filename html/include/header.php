<?php
	$_navlist = [
		[ "", "Home"],
		[ "about.php", "About"],
		[ "download.php", "Download"],
		[ "tutorial.php", "Tutorial"],
		[ "examples.php", "Examples"],
		[ "reference.php", "Reference"],
		[ "javadoc/", "Javadoc"],
		[ "contact.php", "Contact"]];
	function navlist( $thisPage){
		global $thisPage, $_navlist;
		foreach( $_navlist as $node){
			$href = $node[0];
			$text = $node[1];
			$active = $text == $thisPage ? " class=\"active\"" : "";
			print( "<li".$active."><a href=\"/smt/".$href."\">".$text."</a></li>\n");}}
?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="/smt/">Simple Multi-Touch (SMT)</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<?php navlist()?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header">Pages</li>
						<?php navlist()?>
					</ul>
				</div>
			</div>
			<div class="span7">