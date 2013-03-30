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
		$type=pageusertype($name);

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
	<!--// TODO-->
	<div id="navbar">
		<?sidebar();?>
	</div>
	<div id="main">
		<form action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			联系方式:<input type="text" name="contact" /><br />
			<textarea rows="10" cols="30" name="content">不要超过150字</textarea><br />
			<input type="submit" name="submit" value="提交" />
		</form>
		<?
			if($_POST['submit']){
				$contact=$_POST['contact'];
				$content=$_POST['content'];
				$name=$_SESSION['username'];

				$sql="INSERT INTO report (`name`,`contact`,`content`) VALUES('$name','$contact','$content')";
				$query=mysql_query($sql);

				if($query){
					echo "DONE";
				}
				else{
					echo "未知错误";
				}
			}
			// TODO
			// 刷新无效

			unset($contact);
			unset($content);
			unset($name);
		?>
	</div>
</body>
</html>
