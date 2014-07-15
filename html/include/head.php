<title>Simple Multi-Touch (SMT) Toolkit for Processing<?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/smt/css/bootstrap.min.css" rel="stylesheet" media="screen">    
<link href="/smt/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="/smt/css/mainCSS.css" rel="stylesheet" media="screen">
<?php
	$tracking_enabled = true;

	if( ! isset( $containsCode))
		$containsCode = false;
	if( $containsCode){?>
		<script src="/smt/js/highlight.pack.js"></script>
		<script>
			hljs.tabReplace = '  '; 
			hljs.initHighlightingOnLoad();
		</script>
	<?php }
?>