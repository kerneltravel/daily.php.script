<head>
<title></title>
<script language="javascript">
<!--
function check(ModifyForm){
	if(ModifyForm.old_password.value==""){
		alert("���������");
		ModifyForm.old_password.focus();
		return(false);
	}
	if(ModifyForm.new_password.value==""){
		alert("����������");
		ModifyForm.new_password.focus();
		return(false);
	}
	if(ModifyForm.repeat_password.value==""){
		alert("�ظ�����һ������");
		ModifyForm.repeat_password.focus();
		return(false);
	}
	if(ModifyForm.repeat_password.value!=ModifyForm.new_password.value){
		alert("�������벻һ��");
		ModifyForm.repeat_password.focus();
		return(false);
	}
}
//-->
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
	<form action="<?echo $_SERVER['PHP_SELF'];?>" method="post" name="ModifyForm">
		������:<input type="password" name="old_password" /><br />
		������:<input type="password" name="new_password" />6λ����,�ַ�,�»���<br />
		�ظ�����:<input type="password" name="repeat_password" /><br />
		<input type="submit" name="submit" value="�ύ" />
	</form>
	<?
		if($_POST['submit']){
			$old_password=$_POST['old_password'];
			$new_password=$_POST['new_password'];
			$old_md5=md5($old_password);
			$new_md5=md5($new_password);

			$sql1="SELECT id FROM login WHERE password='$old_md5'";
			$query1=mysql_query($sql1);
			$array1=mysql_fetch_array($query1);
			if(mysql_num_rows($query1)){
				$id=$array1['id'];
				$sql2="UPDATE login SET password='$new_md5' WHERE id='$id'";
				$query2=mysql_query($sql2);
				if($query2){
					echo "DONE";
				}
				else{
					echo "δ֪����. Please report this nbug to me. Click <a href='report.php'>here</a>";
				}
			}
			else{
				echo "�������";
			}
		}
	?>
</body>
