<?php
	//get filename
	$filename = $_GET['file'];

	die( basename( $filename));

	$fullpath = $_SERVER['DOCUMENT_ROOT'].$filename;

	//double check that file exists
	if( ! file_exists( $filename))
		die( "File doesn't exist :(");

	/*
	//set headers
	header( 'Pragma: public');
	header( 'Cache-Control: no-cache, must-revalidate');
	header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT');
	header( 'Content-Description: File Transfer');
	header( 'Content-Disposition: attachment; filename="'. basename($filename). '";');
	header( 'Content-Type: application/force-download');
	header( 'Content-Type: application/download');
	header( 'Content-Transfer-Encoding: binary');
	header( 'Content-Length: '. filesize($filename));

	//send file
	readfile( $filename);
	*/
	//done
	exit;
?>