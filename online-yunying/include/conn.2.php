<?
	$host="";
	$database="yunying";
	$user="";
	$password="";
	$table="";

	$conn=mysql_connect($host,$user,$password) or die("mysql_connect error: ".mysql_errno());
	mysql_select_db($database,$conn) or die("mysql_select_dB error: ".mysql_errno());

	// why gb2312
	//$sql_set="SET NAMES gb2312";
	$sql_set="SET NAMES utf8";
	mysql_query($sql_set);
?>
