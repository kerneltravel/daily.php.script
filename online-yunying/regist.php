<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<title>online ��Ӫƽ̨</title>
<link rel="stylesheet" type="text/css" href="scripts/css/login.css" />
<script language="javascript">
<!--
function InputCheck(RegForm){
	if(RegForm.username.value==""){
		alert("�����û���");
		RegForm.username.focus();
		return(false);
	}
	if(RegForm.password.value==""){
		alert("�����趨��½����");
		RegForm.password.focus();
		return(false);
	}
	if(RegForm.repass.value!=RegForm.password.value){
		alert("�������벻һ��");
		RegForm.repass.focus();
		return(false);
	}
	if(RegForm.email.value==""){
		alert("�����ֻ�");
		RegForm.email.focus();
		return(false);
	}
}
//-->
</script>
</head>

<body>
	<div>
		<fieldset>
			<legend>online ��Ӫƽ̨</legend>
			<form name="RegForm" method="post" action="<?echo $_SERVER['PHP_SELF'];?>" onSubmit="return InputCheck(this)">
				<p>
					<label for="username" class="label">�û���:</label>
					<input id="username" name="username" type="text" class="input" />
					<span>(����,ʵ��.����������ʵ�����Ӣ��)</span>
				</p>
				<p>
					<label for="password" class="label">����:</label>
					<input id="password" name="password" type="password" class="input" />
					<span>(����,��������6λ)</span>
				</p>
				<p>
					<label for="repass" class="label">�ظ�����:</label>
					<input id="repass" name="repass" type="password" class="input" />
				</p>
				<p>
					<label for="email" class="label">�ֻ�:</label>
					<input id="email" name="phone" type="text" class="input" />
					<span>(����)</span>
				</p>
				<p>
					<input type="submit" name="submit" value="�ύע��" class="left" />
				</p>
			</form>
		</fieldset>
	</div>
	<?
		require_once("include/class/function.class.php");
		require_once("include/conn.php");

		if(isset($_POST['submit'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$password_md5=md5($password);
			$phone=$_POST['phone'];
			$date=date('YmdGis');

			if(nameRegist_re($username)){
				if(strlen($password)>5){
					if(mobile_re($phone)){
						$sql1="SELECT username FROM login WHERE username='$username'";
						$query1=mysql_query($sql1);
						if(mysql_num_rows($query1)){
							exit('�û��� '.$username.' �Ѵ���.<a href="regist.php">����</a>');
						}
						else{
							$sql2="INSERT INTO login (username,password,phone,date) VALUES('$username','$password_md5','$phone','$date')";
							$query2=mysql_query($sql2);
?>
							<script language="javascript">
								alert("�ѳɹ��ύע��");
								window.location.href='index.html';
							</script>
<?
						}
					}
					else{
						exit('�ֻ��Ų�����Ҫ��');
					}
				}
				else{
					exit('���벻����Ҫ��');
				}
			}
			else{
				exit('�û���������Ҫ��');
			}
		}
	?>
</body>
</html>
