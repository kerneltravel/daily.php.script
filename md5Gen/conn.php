<?
$host="localhost";
$usr="root";
$passwd="";
$db="md5";

$conn=mysql_connect($host,$usr,$passwd) or die("mysql_connect error");
mysql_select_db($db,$conn) or die("mysql_select_db error");
?>
