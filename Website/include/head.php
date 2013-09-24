<title>Simple Multi-Touch (SMT) Toolkit <?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">    
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="css/mainCSS.css" rel="stylesheet" media="screen">
<?php
	if(!isset($containsCode))
		$containsCode = false;
	if($containsCode){?>
		<script src="js/highlight.pack.js"></script>
		<script>
			hljs.tabReplace = '  '; 
			hljs.initHighlightingOnLoad();
		</script>
	<?php }
?>