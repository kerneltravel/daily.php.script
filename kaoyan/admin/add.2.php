<html>
<head>
<title>2014���ϵͳ</title>
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
		����:
		<div id="content" contenteditable="true">
			<p>add content here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('content');
		</script>
		��:
		<div id="answer" contenteditable="true">
			<p>add answer here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('answer');
		</script>
		����:
		<div id="analyze" contenteditable="true">
			<p>add analyze here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('analyze');
		</script>
		ע��:
		<div id="remark" contenteditable="true">
			<p>add remark here</p>
		</div>
		<script>
			CKEDITOR.disableAutoInline=true;
			CKEDITOR.inline('remark');
		</script>
		<div id="source">
			��Դ1(����):<input type="text" name="source1" />&nbsp;
			��Դ2(�鱾):<input type="text" name="source2" />
		</div>
		<div id="tag">
			��ǩ1:<input type="text" name="tag1" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			��ǩ2:<input type="text" name="tag2" /><br />
		</div>
		<div id="submit">
			<input type="submit" name="submit" value="�ύ" />
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
					echo "<script language=\"javascript\">alert('�ɹ�������Ŀ');</script>";
				}
				else{
					echo "<script language=\"javascript\">alert('δ֪����...@".$__FILE__.$__LINE__."');</script>";
				}
			}
			else{
				echo "<script language=\"javascript\">alert('���ݻ��Ϊ��');</script>";
			}
		}
	*/?>
</body>
</html>
