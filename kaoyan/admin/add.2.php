<html>
<head>
<title>2014题库系统</title>
<link rel="stylesheet" type="text/css" href="../scripts/css/index.css" />
<script src="../scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="ckeditor/ckeditor.js"></script>
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
		<? showTime(); ?>
	</div>
	<div id="navbar">
		<? showAdminSideBar(); ?>
	</div>
	<div id="main">
		内容:
		<div id="content" contenteditable="true">
			<p>add content here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('content');
		</script>
		答案:
		<div id="answer" contenteditable="true">
			<p>add answer here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('answer');
		</script>
		分析:
		<div id="analyze" contenteditable="true">
			<p>add analyze here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('analyze');
		</script>
		注释:
		<div id="remark" contenteditable="true">
			<p>add remark here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('remark');
		</script>
		<div id="source">
			来源1(考题):<input type="text" name="source1" />&nbsp;
			来源2(书本):<input type="text" name="source2" />
		</div>
		<div id="tag">
			标签1:<input type="text" name="tag1" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			标签2:<input type="text" name="tag2" /><br />
		</div>
		<div id="submit">
			<input type="submit" name="submit" value="提交" />
		</div>
	</div>
	<script>
		var content=CKEDITOR.instances.content.getData();
		var answer=CKEDITOR.instances.answer.getData();
		var analyze=CKEDITOR.instances.analyze.getData();
		var remark=CKEDITOR.instances.remark.getData();
	</script>
	<?
		$source1=$_POST['source1'];
		$source2=$_POST['source2'];
		$tag1=$_POST['tag1'];
		$tag2=$_POST['tag2'];
		
		$mysqlAddTime=mysqlAddTime();
	?>
	<?/*
		if($_POST['submit']){
			//$content=$_POST['content'];
			//$answer=$_POST['answer'];
			//$analyze=$_POST['analyze'];
			//$remark=$_POST['remark'];


			if($content&&$answer){
				$sql="INSERT INTO `subject` (`content`,`answer`,`analyze`,`remark`,`source1`,`source2`,`tag1`,`tag2`) VALUES('$content','$answer','$analyze','$remark','$source1','$source2','$tag1','$tag2')";
				$query=mysql_query($sql);
				if($query){
					echo "<script language=\"javascript\">alert('成功加入题目');</script>";
				}
				else{
					echo "<script language=\"javascript\">alert('未知错误...@".$__FILE__.$__LINE__."');</script>";
				}
			}
			else{
				echo "<script language=\"javascript\">alert('内容或答案为空');</script>";
			}
		}
	*/?>
</body>
</html>
