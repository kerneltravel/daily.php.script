<html>
<head>
<title>online 运营平台</title>
<link rel="stylesheet" type="text/css" href="scripts/css/index.css" />
<script src="scripts/js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
	setInterval(
		function(){
			$("#header").load(location.href+" #header");
	},1000);

	$(document).ready(function(){
		$('#s2').hide();
		$.get("getcontent1.php",{type:"0"},function(data){
				$('#s1').html(data);
			}
		);
		$('#s1').change(function(){
			$('#s2').hide();
			var pid=$('#s1').val();
			if(pid=='0'){
				$('#s2').fadeOut('slow');
				return false;
			}
			$.get("getcontent1.php",{type:"1",p:pid},function(data){
					$('#s2').html(data);
				}
			);
			$('#s2').fadeIn('slow');
		});
	});

	$(document).ready(function(){
		$('#w2').hide();
		$('#w3').hide();
		$('#w4').hide();
		$.get("getcontent2.php",{type:"0"},function(data){
				$('#w1').html(data);
			}
		);
		$('#w1').change(function(){
			$('#w2').hide();
			var pid=$('#w1').val();
			if(pid=='0'){
				$('#w2').fadeOut('slow');
				return false;
			}
			$.get("getcontent2.php",{type:"1",p1:pid},function(data){
					$('#w2').html(data);
			});
			$('#w2').fadeIn('slow');
		});
		$('#w2').change(function(){
			$('#w3').hide();
			var pid=$('#w2').val();
			if(pid=='0'){
				$('#w3').fadeOut('slow');
				return false;
			}
			$.get("getcontent2.php",{type:"2",p2:pid},function(data){
				$('#w3').html(data);
			});
			$('#w3').fadeIn('slow');
		});
		$('#w3').change(function(){
			$('#w4').hide();
			var pid=$('#w3').val();
			if(pid=='0'){
				$('#w4').fadeOut('slow');
				return false;
			}
			$.get("getcontent2.php",{type:"3",p3:pid},function(data){
				$('#w4').html(data);
			});
			$('#w4').fadeIn('slow');
		});
	});
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
	<!--// TODO-->
	<div id="navbar">
		<?sidebar();?>
	</div>
	
	<div id="main">
		<form action="<?echo $_SERVER['PHP_SELF'];?>" name="info" method="post">
			姓名:<input type="text" name="name" />*&nbsp;一至四中文<br />
			年龄:<input type="text" name="age" /><br />
			生日:<input type="text" name="birthday" />格式:20121108<br />
			性别:<input type="radio" name="sex" value="0" checked/>male<input type="radio" name="sex" value="1"/>female*<br />
			邮箱:<input type="text" name="email" /><br />
			QQ:<input type="text" name="qq" /><br />
			手机:<input type="text" name="mobile" />*<br />
			学号:<input type="text" name="class_number" />*<br />

			校区:<select id="s1" name="s1">
				<option selected></option>
			</select>
			学院:<select id="s2" name="s2">
				<option selected></option>
			</select><br />

			单位:<select id="w1" name="w1">
				<option></option>
			</select>
			团队:<select id="w2" name="w2">
				<option></option>
			</select>
			部门:<select id="w3" name="w3">
				<option></option>
			</select>
			职务组:<select id="w4" name="w4">
				<option></option>
			</select><br />
			<input type="submit" name="submit" value="提交"/>
		</form>
	<?
		$name=$_POST['name'];
		$age=$_POST['age'];
		$birthday=$_POST['birthday'];
		$sex=$_POST['sex'];
		$email=$_POST['email'];
		$qq=$_POST['qq'];
		$mobile=$_POST['mobile'];
		$class_number=$_POST['class_number'];

		// return id
		$schoolId=$_POST['s1'];
		$collegeId=$_POST['s2'];
		$unitId=$_POST['w1'];
		$teamId=$_POST['w2'];
		$departmentId=$_POST['w3'];
		$groupId=$_POST['w4'];

		if($_POST['submit']){
			$error="";
			$check_name=name_re($name);

			if(!empty($name)&&$check_name){
				$check_mobile=mobile_re($mobile);

				if(!empty($mobile)&&$check_mobile){
					$check_class_number=class_number_re($class_number);

					if(!empty($class_number)&&$check_class_number){
						if(!empty($age)){
							$check_age=age_re($age);
							if(!$check_age){
								$error.="年龄不合实际<br />";
							}
						}
						if(!empty($birthday)){
							$check_birthday=birthday_re($birthday);
							if(!$check_birthday){
								$error.="生日不合实际<br />";
							}
						}
						if(!empty($email)){
							$check_email=email_re($email);
							if(!$check_email){
								$error.="邮箱不合实际<br />";
							}
						}
						if(!empty($qq)){
							$check_qq=qq_re($qq);
							if(!$check_qq){
								$error.="QQ号不合实际<br />";
							}
						}
						if(empty($error)){
							$flag1=is_same($class_number,1);
							$flag2=is_same($mobile,2);
							if($flag1){
								if($flag2){
									//// TODO
									$school=id2name($schoolId,1);
									$college=id2name($collegeId,2);
									$unit=id2name($unitId,3);
									$team=id2name($teamId,4);
									$department=id2name($departmentId,5);
									$group=id2name($groupId,6);

									$sql="INSERT INTO `user` (`name`,`age`,`birthday`,`sex`,`email`,`qq`,`mobile`,`class_number`,`school`,`college`,`unit`,`team`,`department`,`group`) VALUES('$name','$age','$birthday','$sex','$email','$qq','$mobile','$class_number','$school','$college','$unit','$team','$department','$group')";
									mysql_query($sql);
									echo "DONE<br />";
								}
								else{
									$error="手机号重复了<br />";
								}
							}
							else{
								$error="学号重复了<br />";
							}
						}
					}
					else if(!empty($class_number)&&!$check_class_number){
						$error.="学号不合实际<br />";
					}
					else if(empty($class_number)){
						$error.="学号为空<br />";
					}
				}
				else if(!empty($mobile)&&!$check_mobile){
					$error.="手机号不合实际<br />";
				}
				else if(empty($name)){
					$error.="手机号为空<br />";
				}
			}
			else if(!empty($name)&&!$check_name){
				$error.="姓名不合实际<br />";
			}
			else if(empty($name)){
				$error.="姓名为空<br />";
			}
		}
		if(isset($error)){
			echo $error;
		}

		unset($name);
		unset($age);
		unset($birthday);
		unset($email);
		unset($mobile);
		unset($class_number);
		unset($school);
		unset($college);
		unset($unit);
		unset($team);
		unset($department);
		unset($group);
		unset($error);
		exit;
	?>
	</div>
</body>
</html>
