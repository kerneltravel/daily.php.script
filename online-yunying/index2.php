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

		if(!isset($_SESSION['userid'])){
			header("Location:index.html");
			exit();
		}
	?>
	<!-- TODO-->
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
		welcome,
		<?
			echo $_SESSION['username'].'<br />';
		?>
		<br />
	</div>

</body>
</html>
