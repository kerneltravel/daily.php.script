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

	CKEDITOR.replace('content');
	CKEDITOR.replace('answer');
	CKEDITOR.replace('analyze');
	CKEDITOR.replace('remark');
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
		<form name="add" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			<table width="100%" align="center" border="1" cellspacing="1" cellpadding="4">
				<tr>
					<td>����*</td>
					<td><input type="text" name="title" style="width:1000px;height:25px;"/></td>
				</tr>
				<tr>
					<td>����*</td>
					<td>
						<textarea class="ckeditor" name="content"></textarea>
					</td>
				</tr>
				<tr>
					<td>��*</td>
					<td>
						<textarea class="ckeditor" name="answer"></textarea>
					</td>
				</tr>
				<tr>
					<td>����</td>
					<td>
						<textarea class="ckeditor" name="analyze"></textarea>
					</td>
				</tr>
				<tr>
					<td>ע��</td>
					<td>
						<textarea class="ckeditor" name="remark"></textarea>
					</td>
				</tr>
				<tr>
					<td>��Դ1(����)</td>
					<td><input type="text" name="source1" style="width:1000px;height:25px;"></td>
				</tr>
				<tr>
					<td>��Դ2(�鱾)</td>
					<td><input type="text" name="source2" style="width:1000px;height:25px;"></td>
				</tr>
				<tr>
					<td>��ǩ1</td>
					<td><input type="text" name="tag1"></td>
				</tr>
				<tr>
					<td>��ǩ2</td>
					<td><input type="text" name="tag2"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="�ύ"></td>
				</tr>
			</table>
		</form>
	</div>
	<?
		if($_POST['submit']){
			$title=$_POST['title'];
			$content=$_POST['content'];
			$answer=$_POST['answer'];
			$analyze=$_POST['analyze'];
			$remark=$_POST['remark'];
			$type='�����';
			$source1=$_POST['source1'];
			$source2=$_POST['source2'];
			$tag1=$_POST['tag1'];
			$tag2=$_POST['tag2'];

			$mysqlAddTime=mysqlAddTime();

			if($content&&$answer&&$title){
				$sql="INSERT INTO `subject` (`title`,`content`,`answer`,`analyze`,`remark`,`type`,`source1`,`source2`,`tag1`,`tag2`,`addtime`) VALUES('$title','$content','$answer','$analyze','$remark','$type','$source1','$source2','$tag1','$tag2','$mysqlAddTime')";
				$query=mysql_query($sql);
				if($query){
					echo "<script language=\"javascript\">alert('�ɹ�������Ŀ');</script>";
				}
				else{
					echo "<script language=\"javascript\">alert('δ֪����...@".$__FILE__.$__LINE__."');</script>";
				}
			}
			else{
				echo "<script language=\"javascript\">alert('��������ݻ��Ϊ��');</script>";
			}
		}
	?>
</body>
</html>
