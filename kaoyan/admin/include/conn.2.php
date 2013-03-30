<?
	$hostname="localhost";
	$username="root";
	$password="";
	$database="kaoyan";

	$conn=mysql_connect($hostname,$username,$password) or die("mysql_connect error:".mysql_error());
	mysql_select_db($database,$conn) or die("mysql_select_db error: ".mysql_error());

	// why gb2312
	//$sql_set="SET NAMES gb2312";
	$sql_set="SET NAMES utf8";
	mysql_query($sql_set);
?>
