<?php
if (!isset($_GET['url'])) die();
$url = urldecode($_GET['url']);
$url = 'http://' . str_replace('http://', '', $url); // Avoid accessing the file system
ini_set('max_execution_time', 300);
ini_set('default_socket_timeout', 120); 
echo file_get_contents($url);
?>