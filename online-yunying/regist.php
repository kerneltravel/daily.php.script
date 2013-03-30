<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<title>online 运营平台</title>
<link rel="stylesheet" type="text/css" href="scripts/css/login.css" />
<script language="javascript">
<!--
function InputCheck(RegForm){
	if(RegForm.username.value==""){
		alert("输入用户名");
		RegForm.username.focus();
		return(false);
	}
	if(RegForm.password.value==""){
		alert("必须设定登陆密码");
		RegForm.password.focus();
		return(false);
	}
	if(RegForm.repass.value!=RegForm.password.value){
		alert("两次密码不一致");
		RegForm.repass.focus();
		return(false);
	}
	if(RegForm.email.value==""){
		alert("输入手机");
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
			<legend>online 运营平台</legend>
			<form name="RegForm" method="post" action="<?echo $_SERVER['PHP_SELF'];?>" onSubmit="return InputCheck(this)">
				<p>
					<label for="username" class="label">用户名:</label>
					<input id="username" name="username" type="text" class="input" />
					<span>(必填,实名.如重名请在实名后加英文)</span>
				</p>
				<p>
					<label for="password" class="label">密码:</label>
					<input id="password" name="password" type="password" class="input" />
					<span>(必填,不得少于6位)</span>
				</p>
				<p>
					<label for="repass" class="label">重复密码:</label>
					<input id="repass" name="repass" type="password" class="input" />
				</p>
				<p>
					<label for="email" class="label">手机:</label>
					<input id="email" name="phone" type="text" class="input" />
					<span>(必填)</span>
				</p>
				<p>
					<input type="submit" name="submit" value="提交注册" class="left" />
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
							exit('用户名 '.$username.' 已存在.<a href="regist.php">返回</a>');
						}
						else{
							$sql2="INSERT INTO login (username,password,phone,date) VALUES('$username','$password_md5','$phone','$date')";
							$query2=mysql_query($sql2);
?>
							<script language="javascript">
								alert("已成功提交注册");
								window.location.href='index.html';
							</script>
<?
						}
					}
					else{
						exit('手机号不符合要求');
					}
				}
				else{
					exit('密码不符合要求');
				}
			}
			else{
				exit('用户名不符合要求');
			}
		}
	?>
</body>
</html>
