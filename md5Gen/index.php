<?
require_once("conn.php");
?>
<!--<script language=javascript>
function CheckPost(){
	if(form1.form1_val.value==""){
		alert("初始值为空,请重新填写");
		form1.form1_val.focus();
		return false;
	}
}
</script>-->
<html>
<head>
<title>md5Gen</title>
<meta http-equiv="Content-Language" content="zh-CN" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="index.php" method="post" name="form1" onsubmit="return CheckPost();">
	初始值<input type="text" name="form1_val" /><br />
	<input type="submit" value="encrypt it" name="sub_1">
	转换后
	<?
	if($_POST[sub_1]){
		$enc_val=md5($_POST[form1_val]);
		// md5([空密码]/[Empty String])=d41d8cd98f00b204e9800998ecf8427e
		if($enc_val!=d41d8cd98f00b204e9800998ecf8427e){
			echo $enc_val;
			$sql1="insert into `md5` (`id`,`original`,`code`) values('','$_POST[form1_val]','$enc_val')";
			mysql_query($sql1) or die("mysql_query error");
		}
		else echo "";
		$_POST[form1_val]=NULL;		// 释放缓存,貌似没有用
	}
	?>
</form>
<form action="index.php" method="post" name="form2" onsubmit="return CheckPost();">
	md5密码破解<input type="text" name="form2_val" /><br />
	<input type="submit" value="decrypt it" name="sub_2">
	解密后
	<?
	if($_POST[sub_2]){
		$dec_val=$_POST[form2_val];
		$sql2="select `original` from `md5` where `code`='$dec_val'";
		$a=mysql_query($sql2) or die("mysql_query_2 error");
		$a=mysql_fetch_array($a);
		if($a[0])echo $a[0];
		else echo '数据库没有此信息';
		mysql_close($conn);
	}
	?>
</form>
<h>ver 0.3.0 By jason 2012-8-7 14:41:01</h>
<br /><font color="#aaaaaa">1. 数据保存至md5.md5数据库--2012080715**</font>
<br /><font color="#aaaaaa">2. 添加查询功能--201208071615</font>
<br />3. 数据缓存有问题
<br />4. 数据库信息重复问题待解决
<br />
</body>
</html>