<html>
<head>
<title>online ��Ӫƽ̨</title>
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
					<td colspan="2" align="center"><strong>�û���Ϣ</strong></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>������Ϣ</strong></td>
				</tr>

				<tr>
					<td>�û���</td>
					<td><?echo $array2['name'];?></td>
				</tr>
				<tr>
					<td>����</td>
					<td><input type="submit" name="password" value="�޸�����" onclick="window.open('password.php','','width=400,height=600');"></td>
				</tr>
				<tr>
					<td>ע��ʱ��</td>
					<td><?echo $array1['date'];?></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>��ϵ��ʽ</strong></td>
				</tr>
				<tr>
					<td>email</td>
					<td><input type="text" name="email" value="<?echo $array2['email'];?>"></td>
				</tr>
				<tr>
					<td>�ֻ�����</td>
					<td><input type="text" name="phone" value="<?echo $array2['mobile'];?>"></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>������Ϣ</strong></td>
				</tr>
				<tr>
					<td>�û�����</td>
					<?
						$usertype=$array1['usertype'];
						$sql3="SELECT `name` FROM usertype WHERE number='$usertype'";
						$query3=mysql_query($sql3);
						if(mysql_num_rows($query3)){
							$array3=mysql_fetch_array($query3);
							echo "<td>".$array3['name']."</td>";
						}
						else{
							echo "<td>δ֪�û�����</td>";
						}
					?>
				</tr>
				<tr>
					<td>�Ŷ�</td>
					<td><?echo $array2['team'];?></td>
				</tr>
				<tr>
					<td>����</td>
					<td><?echo $array2['department'];?></td>
				</tr>
				<tr>
					<td>ְ����</td>
					<td><?echo $array2['group'];?></td>
				</tr>

				<tr bgcolor="#899999">
					<td colspan="2"><strong>ѧϰ��Ϣ</strong></td>
				</tr>
				<tr>
					<td>ѧ��</td>
					<td><?echo $array2['class_number'];?></td>
				</tr>
				<tr>
					<td>У��</td>
					<td><?echo $array2['school'];?></td>
				</tr>
				<tr>
					<td>ѧԺ</td>
					<td><?echo $array2['college'];?></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
						<!--<input type="hidden" name="action" value="edit">-->
						<input type="submit" name="submit" value="�ύ�޸�">
					</td>
				</tr>
			</table>
		</form>
		<?
			if($_POST['submit']=="�ύ�޸�"){
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
							echo "δ֪����. Please report it to me. Click <a href='report.php'>here</a>";
						}
					}
					else{
						echo "�ֻ����ϸ�ʽ";
					}
				}
				else{
					echo "���䲻�ϸ�ʽ";
				}
			}
		?>
	</div>
</body>
</html>
