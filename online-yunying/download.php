<html>
<head>
<title>online ��Ӫƽ̨</title>
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
						��������(֧�ָ߼�����,���Ķ�<a href="searchhelp.html" target="_blank">��</a>):<br />
						<input type="text" name="search" /><input type="submit" value="����"><br />
						ȫ������:<br />
						<input type="submit" name="do1" value="����������ְ��Ա��Ϣ" />
						<input type="submit" name="do2" value="����������ְ��ԱͨѶ¼" /><br />
					<?
				case '2':
					?>
						ְ��������:<br />
						<input type="submit" name="do3" value="����<?echo $department;?>����ְ���г�Ա��Ϣ" />
						<input type="submit" name="do4" value="����<?echo $department;?>����ְ���г�Ա��Ϣ��" /><br />
					<?

			}
		?>
		</form>
	</div>
</body>
</html>
