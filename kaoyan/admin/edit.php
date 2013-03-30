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
	<?
		$id=$_GET['id'];
		$sql_in="SELECT * FROM subject WHERE id='$id'";
		$query_in=mysql_query($sql_in);
		$assoc=mysql_fetch_assoc($query_in);
	?>
	<div id="main">
		<form name="add" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			<table width="100%" align="center" border="1" cellspacing="1" cellpadding="4">
				<tr>
					<td><a href="subject.php">[返回]</a></td>
					<td></td>
				</tr>
				<tr>
					<td>标题*</td>
					<td>
						<input type="text" name="title" value="<?echo $assoc['title'];?>" style="width:1000px;"/>
					</td>
				</tr>
				<tr>
					<td>内容*</td>
					<td>
						<textarea class="ckeditor" name="content"><?echo $assoc['content'];?></textarea>
					</td>
				</tr>
				<?
					if($assoc['type']=='选择题'){
						echo "<tr>";
						echo "<td>答案*</td>";
						echo "<td>";
						switch($assoc['answer']){
							case 'A':
								echo "A<input type=\"radio\" name=\"answer\" value=\"A\" checked>";
								echo "B<input type=\"radio\" name=\"answer\" value=\"B\">";
								echo "C<input type=\"radio\" name=\"answer\" value=\"C\">";
								echo "D<input type=\"radio\" name=\"answer\" value=\"D\">";
								break;
							case 'B':
								echo "A<input type=\"radio\" name=\"answer\" value=\"A\">";
								echo "B<input type=\"radio\" name=\"answer\" value=\"B\" checked>";
								echo "C<input type=\"radio\" name=\"answer\" value=\"C\">";
								echo "D<input type=\"radio\" name=\"answer\" value=\"D\">";
								break;
							case 'C':
								echo "A<input type=\"radio\" name=\"answer\" value=\"A\">";
								echo "B<input type=\"radio\" name=\"answer\">";
								echo "C<input type=\"radio\" name=\"answer\" value=\"C\" checked>";
								echo "D<input type=\"radio\" name=\"answer\" value=\"D\">";
								break;
							case 'D':
								echo "A<input type=\"radio\" name=\"answer\" value=\"A\">";
								echo "B<input type=\"radio\" name=\"answer\" value=\"B\">";
								echo "C<input type=\"radio\" name=\"answer\" value=\"C\">";
								echo "D<input type=\"radio\" name=\"answer\" value=\"D\" checked>";
								break;
						}
						echo "</td></tr>";
					}
					else if($assoc['type']=='简答题'){
						echo "<tr><td>答案*</td>";
						echo "<td><textarea class=\"ckeditor\" name=\"answer\">";
						echo $assoc['answer'];
						echo "</textarea></td></tr>";
					}
				?>
				<tr>
					<td>分析</td>
					<td>
						<textarea class="ckeditor" name="analyze"><?echo $assoc['analyze'];?></textarea>
					</td>
				</tr>
				<tr>
					<td>注释</td>
					<td>
						<textarea class="ckeditor" name="remark"><?echo $assoc['remark'];?></textarea>
					</td>
				</tr>
				<tr>
					<td>来源1(考题)</td>
					<td><input type="text" name="source1" value="<?echo $assoc['source1'];?>" style="width:1000px"></td>
				</tr>
				<tr>
					<td>来源2(书本)</td>
					<td><input type="text" name="source2" value="<?echo $assoc['source2'];?>" style="width:1000px"></td>
				</tr>
				<tr>
					<td>标签1</td>
					<td><input type="text" name="tag1" value="<?echo $assoc['tag1'];?>"></td>
				</tr>
				<tr>
					<td>标签2</td>
					<td><input type="text" name="tag2" value="<?echo $assoc['tag2'];?>"></td>
				</tr>
				<tr>
					<td>状态</td>
					<td><input type="text" name="active" value="<?echo $assoc['active'];?>"/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?echo $assoc['id'];?>"></td>
					<td><input type="submit" name="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</div>
	<?
		if($_POST['submit']){
			$id_out=$_POST['id'];
			$title=$_POST['title'];
			$content=$_POST['content'];
			$answer=$_POST['answer'];
			$analyze=$_POST['analyze'];
			$remark=$_POST['remark'];
			$source1=$_POST['source1'];
			$source2=$_POST['source2'];
			$tag1=$_POST['tag1'];
			$tag2=$_POST['tag2'];
			$active=$_POST['active'];

			$mysqlModifyTime=mysqlAddTime();

			if($content&&$answer&&$title){
				//$sql_out="UPDATE `subject` (`id`,`content`,`answer`,`analyze`,`remark`,`source1`,`source2`,`tag1`,`tag2`,`active`) VALUES('$id','$content','$answer','$analyze','$remark','$source1','$source2','$tag1','$tag2','$active')";
				$sql_out="UPDATE `subject` SET `title`='$title',`content`='$content',`answer`='$answer',`analyze`='$analyze',`remark`='$remark',`source1`='$source1',`source2`='$source2',`tag1`='$tag1',`tag2`='$tag2',`modifytime`='$mysqlModifyTime',`active`='$active' WHERE `id`='$id_out'";
				$query_out=mysql_query($sql_out);
				if($query_out){
					echo "<script language=\"javascript\">alert('成功修改题目');</script>";
					header("Location:subject.php");
				}
				else{
					echo "<script language=\"javascript\">alert('未知错误...@".$__FILE__.$__LINE__."');</script>";
				}
			}
			else{
				echo "<script language=\"javascript\">alert('标题或内容或答案为空');</script>";
			}
		}
	?>
</body>
</html>
