<html>
<head>
<title>online 运营平台</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
	setInterval(
		function(){
			$("#header").load(location.href+" #header");
	},1000);
</script>
</head>

<body>
	<?
		require_once("include/class/function.class.php");
		require_once("include/conn.php");
		session_start();

		$usertype=$_SESSION['usertype'];
		$department=$_SESSION['department'];
		$type=pageusertype($name);

		/*$username=$_SESSION['username'];
		$sql="SELECT department FROM user WHERE name='$username'";
		$query=mysql_query($sql);
		$assoc=mysql_fetch_assoc($query);*/

		if(!isset($_SESSION['userid'])){
			header("Location:index.html");
			exit;
		}
		else{
			if($usertype<$type){
				header("Location:index2.php");
				exit;
			}
		}
	?>
	<!-- TODO -->
	<div id="header">
		<?
			echo date("Y/m/d H:i:s");
		?>
	</div>
	<!--// TODO -->
	<div id="navbar">
		<?sidebar();?>
	</div>

	<div id="main">
		<form action="do.php" name="query" method="post">
		<?
			switch($type){
				case '9':
				case '8':
				case '7':
				case '6':
				case '5':
				case '4':
				case '3':
					?>
						搜索下载(支持高级搜索,先阅读<a href="searchhelp.html" target="_blank">我</a>):<br />
						<input type="text" name="search" /><input type="submit" value="搜索"><br />
						全局下载:<br />
						<input type="submit" name="do1" value="下载所有在职成员信息" />
						<input type="submit" name="do2" value="下载所有在职成员通讯录" /><br />
					<?
				case '2':
					?>
						职务组下载:<br />
						<input type="submit" name="do3" value="下载<?echo $department;?>组在职所有成员信息" />
						<input type="submit" name="do4" value="下载<?echo $department;?>组在职所有成员信息表" /><br />
					<?

			}
		?>
		</form>
	</div>
</body>
</html>
