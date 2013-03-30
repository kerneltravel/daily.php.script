<html>
<head>
<title>online 运营平台</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" lang="javascript"></script>
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
	<!--// TODO -->

	<div id="navbar">
		<?sidebar();?>
	</div>

	<div id="main">
		<?
			$sql1="SELECT `username`,`date`,`usertype` FROM login WHERE id='$_SESSION[userid]'";
			$query1=mysql_query($sql1);
			$array1=mysql_fetch_array($query1);
			$name=$array1['username'];

			$sql2="SELECT `name`,`email`,`mobile`,`team`,`department`,`group`,`class_number`,`school`,`college` FROM user WHERE name='$name'";
			$query2=mysql_query($sql2);
			$array2=mysql_fetch_array($query2);
		?>
		<form name="form1" action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
			<table cellpadding="2" cellspacing="1" border="0" align="center" width="90%">
				<tr bgcolor="#999999">
					<td colspan="2" align="center"><strong>用户信息</strong></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>基本信息</strong></td>
				</tr>

				<tr>
					<td>用户名</td>
					<td><?echo $array2['name'];?></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="submit" name="password" value="修改密码" onclick="window.open('password.php','','width=400,height=600');"></td>
				</tr>
				<tr>
					<td>注册时间</td>
					<td><?echo $array1['date'];?></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>联系方式</strong></td>
				</tr>
				<tr>
					<td>email</td>
					<td><input type="text" name="email" value="<?echo $array2['email'];?>"></td>
				</tr>
				<tr>
					<td>手机号码</td>
					<td><input type="text" name="phone" value="<?echo $array2['mobile'];?>"></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>工作信息</strong></td>
				</tr>
				<tr>
					<td>用户类型</td>
					<?
						$usertype=$array1['usertype'];
						$sql3="SELECT `name` FROM usertype WHERE number='$usertype'";
						$query3=mysql_query($sql3);
						if(mysql_num_rows($query3)){
							$array3=mysql_fetch_array($query3);
							echo "<td>".$array3['name']."</td>";
						}
						else{
							echo "<td>未知用户类型</td>";
						}
					?>
				</tr>
				<tr>
					<td>团队</td>
					<td><?echo $array2['team'];?></td>
				</tr>
				<tr>
					<td>部门</td>
					<td><?echo $array2['department'];?></td>
				</tr>
				<tr>
					<td>职务组</td>
					<td><?echo $array2['group'];?></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>学习信息</strong></td>
				</tr>
				<tr>
					<td>学号</td>
					<td><?echo $array2['class_number'];?></td>
				</tr>
				<tr>
					<td>校区</td>
					<td><?echo $array2['school'];?></td>
				</tr>
				<tr>
					<td>学院</td>
					<td><?echo $array2['college'];?></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
						<!--<input type="hidden" name="action" value="edit">-->
						<input type="submit" name="submit" value="提交修改">
					</td>
				</tr>
			</table>
		</form>
		<?
			if($_POST['submit']=="提交修改"){
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				if(email_re($email)){
					if(mobile_re($phone)){
						$sql4="UPDATE user SET email='$email',mobile='$phone' WHERE name='$name'";
						$query4=mysql_query($sql4);
						if($query4){
							header("Location:userinfo.php");
						}
						else{
							echo "未知错误. Please report it to me. Click <a href='report.php'>here</a>";
						}
					}
					else{
						echo "手机不合格式";
					}
				}
				else{
					echo "邮箱不合格式";
				}
			}
		?>
	</div>
</body>
</html>
