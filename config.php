<?php
/* set database detail here */
$database_host = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'blogdemo';

/*set your base url*/
define('BASEURL','http://localhost/blogdemo/');

$link = mysql_connect($database_host, $database_username, $database_password);

if (!$link)
    die('Could not connect: ' . mysql_error());
else
  mysql_select_db($database_name);

/*create one common function to print data so you don't have to right all 3 line again and again */
function _k($data)
{
	echo '<pre>';
	print_r($data);
	echo '<pre>';	
}


?>
