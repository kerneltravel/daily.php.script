<html>
<head>
<title>2014题库系统</title>
<link rel="stylesheet" type="text/css" href="../scripts/css/index.css" />
<script src="../scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
	setInterval(
		function(){
			$("#header").load(location.href+" #header");
	},1000);
</script>
</head>

<body>
	<?
		require_once('include/conn.php');
		require_once('include/class/function.class.php');
	?>
	<div id="header">
		<?
			showTime();
		?>
	</div>
	<div id="navbar">
		<?
			showAdminSideBar();
		?>
	</div>
	<div id="main">
		<ol>
			<li><s>使用 CKEditor 取代 textarea--201212011949--F</s></li>
			<li><s>新增"添加题目"模块--201212011948--F</s></li>
			<li>add.2.php 不能获取 ajax 的传值--201212012044--<font color="red">U</font></li>
		</ol>
	</div>
</body>
</html>
